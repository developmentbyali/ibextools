<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index($link)
    {
        $link = Link::find($link);
        return response($link->visits()->count());
    }
    public function createLink(Request $request)
    {
        $requestData = $request->validate([
            'url' => 'active_url'
        ]);
        $rand = substr(md5(microtime()),rand(0,26),5);
        $link = Link::create(['uuid' => $rand, 'url' => $request->get('url')]);
        return response()->json(['link'=> $link], 200);
    }
}
