<?php

namespace App\Http\Controllers;

use App\Blog;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::where('type', 'main-listing')->where('status', 'published')->latest()->get();
        return view('blog', ['blogs' => $blogs]);
    }
    public function view($slug)
    {
        $blogs = Blog::with('user')->where('slug', $slug)->firstOrFail();
        return view('blog-details', ['blog' => $blogs]);
    }
    public function about_view()
    {
        $blog = Blog::where('type', 'static-page')->where('status', 'published')->where('slug', 'about')->latest()->firstOrFail();
        return view('about', ['about' => $blog]);
    }


}
