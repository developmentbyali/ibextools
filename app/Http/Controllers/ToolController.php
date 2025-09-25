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


        $file = File::create([
            'filename' => $uploadedFile->getClientOriginalName(),
            'path' => 'uploads/' . $filename,
            'hash' => $hash,
            'original_extension' => $extension,
//            'converted_to' => '',
            'valid_until' => now()->addYear(),
        ]);

        $url = $this->getUrl($file);

        return response([
            'url' => $url,
            'file_id' => $file->id
        ]);
    }
    private function getUrl(File $file)
    {
        $url = $file->getUrl();
        //$url = $this->shortenUrl($url);
        return $url;
    }
    public function pngDownload(Request $request)
    {
        $file = File::whereHash($request->hash)->first();
        $format = 'png';
        $data = Storage::get($file->path);
        $localPath = 'temp/' . $file->hash . '.' . $file->original_extension;
        $localPathOutput = 'temp/output/' . $file->hash . '.' . $format;
        Storage::disk('local')->put($localPath, $data);


        GlideImage::create(storage_path('app/'.$localPath))
            ->modify(['fm' => $format])
            ->save(storage_path('app/'.$localPathOutput));

        return Storage::disk('local')->download($localPathOutput);
    }

}
