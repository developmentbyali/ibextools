<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BacklinkController extends Controller
{
    /**
     * Generate a demo backlink URL for the provided URL.
     * This is non-persistent and intended to provide the frontend with
     * a link.full_url value similar to the shortUrl tool.
     */
    public function make(Request $request)
    {
        $data = $request->validate([
            'url' => 'required|url'
        ]);

        $url = $data['url'];

        // create a demo token using base64url of the original URL
        $token = rtrim(strtr(base64_encode($url), '+/', '-_'), '=');

        // build a backlink URL under /b/{token}
        $full = url('/b/'.$token);

        return response()->json([
            'link' => [
                'url' => $url,
                'full_url' => $full
            ]
        ]);
    }
}
