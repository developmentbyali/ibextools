<?php

namespace App\Http\Controllers;

use App\Tool;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use NodejsPhpFallback\Uglify;
use Illuminate\Support\Str;
use Spatie\Glide\GlideImage;
use Intervention\Image\ImageManagerStatic as Image;


class ToolController extends Controller
{
    public function tool(Request $request)
    {
        $tool = Tool::with('category','user')->where('slug',$request['slug'])->firstOrFail();
        if($tool->content)
            return view('tool/tool-init',['tool'=>$tool]);
        else
            return view('dynamic-tool/'.$tool->slug,['tool'=>$tool]);
    }
    public function submit(Request $request) {

        $this->validate($request, [
            'title' => 'required|string',
            'des' => 'required',
            'keywords' => 'required',
            'content' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'slug' => 'required',
        ]);


        return response()->json(null, 200);
    }

    function minify(Request $request){
        $uglify = new Uglify(array($request['content']));
        if($request['content_type'] == 'js')
            return response()->json(['uglify'=> $uglify->getMinifiedJs()], 200);
        else
            return response()->json(['uglify'=> $uglify->getMinifiedCss()], 200);
    }
    function whois(Request $request){
       $validate =  $request->validate([
            'url' => 'required|url'
        ]);
        $response = Http::post('https://api.jsonwhois.io/whois/domain/?key=5YpIYQyssBgUo0tVIRa9VbhjMsCfwuEI&domain=ibextools.com');
        print_r($response->json());
    }

    public function fileUpload()
    {
        $hash = Str::uuid()->toString();
        $uploadedFile = request()->file('file');
        $extension = $uploadedFile->getClientOriginalExtension();
        $filename = "{$hash}.{$extension}";
        $uploadedFile->storePubliclyAs("uploads", $filename);

        // We'll attempt to create the DB record after conversion. If the
        // database (PDO/sqlite) is not available the conversion should still
        // succeed and we'll return a usable URL. This prevents a DB error
        // from causing an overall 500 response for uploads.
        $file = null;

        // generate converted PNG immediately and store under temp/output
        try {
            $format = 'png';
            $storagePath = 'uploads/' . $filename;
            $data = Storage::get($storagePath);
            $localPath = 'temp/' . $hash . '.' . $extension;
            $localPathOutput = 'temp/output/' . $hash . '.' . $format;
            Storage::disk('local')->put($localPath, $data);

            // Use Imagick for conversion
            try {
                $imagick = new \Imagick(storage_path('app/' . $localPath));
                $imagick->setImageFormat($format);
                // ensure output directory exists
                $outputDir = storage_path('app/temp/output');
                if (!file_exists($outputDir)) {
                    if (!@mkdir($outputDir, 0755, true)) {
                        \Log::error('Failed to create temp output directory: ' . $outputDir);
                    }
                }
                $imagick->writeImage(storage_path('app/' . $localPathOutput));
                // ensure file was written
                if (!file_exists(storage_path('app/' . $localPathOutput))) {
                    throw new \RuntimeException('Imagick reported success but output file is missing: ' . storage_path('app/' . $localPathOutput));
                }
                $imagick->clear();
                $imagick->destroy();
            } catch (\Exception $e) {
                \Log::warning('Imagick conversion failed, trying GD fallback: ' . $e->getMessage());
                try {
                    // GD/Intervention fallback
                    Image::configure(['driver' => 'gd']);
                    $img = Image::make(storage_path('app/' . $localPath))->encode('png');
                    $outputFull = storage_path('app/' . $localPathOutput);
                    // ensure output directory
                    $outDir = dirname($outputFull);
                    if (!file_exists($outDir)) @mkdir($outDir, 0755, true);
                    $img->save($outputFull);
                    $img->destroy();
                    if (!file_exists($outputFull)) {
                        throw new \RuntimeException('GD fallback did not create output file');
                    }
                } catch (\Exception $e2) {
                    \Log::error('Both Imagick and GD conversion failed: ' . $e2->getMessage());
                    throw $e2;
                }
            }
            $imagick->clear();
            $imagick->destroy();

            // copy converted file to public/converted so browser can download it directly
            $publicDir = public_path('converted');
            if (!file_exists($publicDir)) {
                if (!@mkdir($publicDir, 0755, true)) {
                    \Log::error('Failed to create public/converted directory. Check permissions.');
                }
            }
            $publicPath = $publicDir . DIRECTORY_SEPARATOR . $hash . '.' . $format;
            $copySuccess = @copy(storage_path('app/' . $localPathOutput), $publicPath);
            if ($copySuccess && file_exists($publicPath)) {
                // return the public URL to the converted PNG
                $url = url('converted/' . $hash . '.' . $format);
            } else {
                // log error if copy failed, include more details
                \Log::error('PNG copy to public/converted failed for hash: ' . $hash . ' | Source: ' . storage_path('app/' . $localPathOutput) . ' | Dest: ' . $publicPath . ' | Exists: ' . (file_exists(storage_path('app/' . $localPathOutput)) ? 'yes' : 'no'));
                $url = url('download-png/' . $hash);
            }
        } catch (\Exception $e) {
            \Log::error('PNG conversion failed (Imagick): ' . $e->getMessage());
            // if conversion fails, still return the generic URL (pngDownload will convert on demand)
            $url = url('download-png/' . $hash);
        }

        // Try to persist the file metadata to the DB, but don't fail the
        // request if the DB/PDO driver is missing. This often happens on
        // dev machines where php_pdo_sqlite isn't enabled.
        try {
            $file = File::create([
                'filename' => $uploadedFile->getClientOriginalName(),
                'path' => 'uploads/' . $filename,
                'hash' => $hash,
                'original_extension' => $extension,
                'valid_until' => now()->addYear(),
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to create File DB record: ' . $e->getMessage());
            // Return a successful response with url but no file_id so the
            // frontend can still navigate to the PNG. Frontend should handle
            // null file_id gracefully.
            return response([
                'url' => $url,
                'file_id' => null
            ], 200);
        }

        return response([
            'url' => $url,
            'file_id' => $file->id
        ], 200);
    }

    /**
     * Return the download URL for a given file id. This helps the frontend
     * when the upload response only returns file_id and not the direct url.
     */
    public function fileUrl($id)
    {
        try {
            $file = File::find($id);
        } catch (\Exception $e) {
            // DB driver missing or other DB error; fall back to scanning uploads by id/hash
            \Log::warning('fileUrl: DB lookup failed, falling back to FS lookup: ' . $e->getMessage());
            $file = $this->findUploadedFileByHash($id);
        }
        if (!$file) return response()->json(['error' => 'Not found'], 404);
        // If we already generated a public converted PNG, prefer that URL
        $format = 'png';
        $publicPath = public_path('converted/' . $file->hash . '.' . $format);
        if (file_exists($publicPath)) {
            $url = url('converted/' . $file->hash . '.' . $format);
        } else {
            $url = $this->getUrl($file);
        }
        return response()->json(['url' => $url]);
    }
    private function getUrl(File $file)
    {
        $url = $file->getUrl();
        //$url = $this->shortenUrl($url);
        return $url;
    }
    public function pngDownload(Request $request)
    {
        try {
            $file = File::whereHash($request->hash)->first();
        } catch (\Exception $e) {
            // DB not available — try filesystem fallback
            \Log::warning('pngDownload: DB lookup failed, falling back to FS lookup: ' . $e->getMessage());
            $file = $this->findUploadedFileByHash($request->hash);
        }
        if (!$file) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $format = 'png';
        $data = Storage::get($file->path);
        $localPath = 'temp/' . $file->hash . '.' . $file->original_extension;
        $localPathOutput = 'temp/output/' . $file->hash . '.' . $format;
        Storage::disk('local')->put($localPath, $data);

        try {
            try {
                $imagick = new \Imagick(storage_path('app/' . $localPath));
                $imagick->setImageFormat($format);
                // ensure output directory exists
                $outputDir = storage_path('app/temp/output');
                if (!file_exists($outputDir)) {
                    @mkdir($outputDir, 0755, true);
                }
                $imagick->writeImage(storage_path('app/' . $localPathOutput));
                if (!file_exists(storage_path('app/' . $localPathOutput))) {
                    throw new \RuntimeException('Imagick write produced no file: ' . storage_path('app/' . $localPathOutput));
                }
                $imagick->clear();
                $imagick->destroy();
            } catch (\Exception $e) {
                \Log::warning('Imagick conversion failed in pngDownload, trying GD fallback: ' . $e->getMessage());
                try {
                    Image::configure(['driver' => 'gd']);
                    $img = Image::make(storage_path('app/' . $localPath))->encode('png');
                    $outputFull = storage_path('app/' . $localPathOutput);
                    $outDir = dirname($outputFull);
                    if (!file_exists($outDir)) @mkdir($outDir, 0755, true);
                    $img->save($outputFull);
                    $img->destroy();
                    if (!file_exists($outputFull)) {
                        throw new \RuntimeException('GD fallback did not create output file');
                    }
                } catch (\Exception $e2) {
                    \Log::error('Both Imagick and GD fallback failed in pngDownload: ' . $e2->getMessage());
                    return response()->json(['error' => 'Conversion failed'], 500);
                }
            }
            $imagick->clear();
            $imagick->destroy();

            // copy to public/converted for direct downloads
            $publicDir = public_path('converted');
            if (!file_exists($publicDir)) {
                @mkdir($publicDir, 0755, true);
            }
            $publicPath = $publicDir . DIRECTORY_SEPARATOR . $file->hash . '.' . $format;
            @copy(storage_path('app/' . $localPathOutput), $publicPath);

            if (file_exists($publicPath)) {
                return response()->download($publicPath);
            }

            // Fallback to streaming the generated file directly
            return Storage::disk('local')->download($localPathOutput);
        } catch (\Exception $e) {
            \Log::error('PNG download/conversion failed (Imagick): ' . $e->getMessage());
            return response()->json(['error' => 'Conversion failed'], 500);
        }
    }

    /**
     * When the database/PDO is not available we still want to serve files.
     * Look for an uploaded file in storage/uploads whose filename starts with
     * the given hash and return a lightweight object compatible with what
     * callers expect (filename, path, hash, original_extension).
     */
    private function findUploadedFileByHash($hash)
    {
        try {
            $files = Storage::disk('local')->files('uploads');
        } catch (\Exception $e) {
            \Log::error('findUploadedFileByHash: failed to list uploads: ' . $e->getMessage());
            return null;
        }
        foreach ($files as $f) {
            $base = basename($f);
            if (strpos($base, $hash . '.') === 0) {
                $parts = explode('.', $base);
                $extension = array_pop($parts);
                // Build a simple object with the properties the controller uses
                return (object)[
                    'filename' => $base,
                    'path' => $f,
                    'hash' => $hash,
                    'original_extension' => $extension,
                ];
            }
        }
        return null;
    }

    // Diagnostic endpoint to test Imagick write ability
    public function debugImagick()
    {
        $outputDir = storage_path('app/temp/output');
        if (!file_exists($outputDir)) {
            if (!@mkdir($outputDir, 0755, true)) {
                return response()->json(['ok' => false, 'error' => 'Could not create output dir: ' . $outputDir], 500);
            }
        }
        $testPath = $outputDir . DIRECTORY_SEPARATOR . 'imagick-test-' . uniqid() . '.png';
        try {
            $img = new \Imagick();
            $img->newImage(1, 1, new \ImagickPixel('white'));
            $img->setImageFormat('png');
            $img->writeImage($testPath);
            $img->clear();
            $img->destroy();
            return response()->json([
                'ok' => true,
                'imagick_version' => \Imagick::getVersion(),
                'written' => file_exists($testPath) ? $testPath : null
            ]);
        } catch (\Exception $e) {
            \Log::error('debugImagick failed: ' . $e->getMessage());
            return response()->json(['ok' => false, 'error' => $e->getMessage()], 500);
        }
    }

}
