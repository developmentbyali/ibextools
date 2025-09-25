<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function addTool()
    {
        return view('admin/add-tool');
    }
    public function addListing()
    {
        return view('admin/tool-listing');
    }
    public function blogs()
    {
        if(Auth::user()->type === 'admin'){
            $blogs = Blog::latest()->get();
        }else{
            $blogs = Blog::where('user_id', Auth::user()->id)->latest()->get();
        }
        return view('admin/blog-listing', ['blogs'=>$blogs]);
    }
    public function blogAdd(BlogRequest $request)
    {

        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        $blog->identifier = $request->identifier;
        $blog->status = $request->status;
        $blog->tags = $request->tags;
        $blog->type = $request->type;
        if($blog->save())
            return redirect(route('blog.edit',['slug' => $blog->id]))->with('success','Added successfully.');
        else
            return redirect()->back()->withErrors(['error' => 'Something went wrong try again later']);
    }
    public function blogEdit(Request $request)
    {
        $blogs = Blog::find($request->slug);
        return view('admin/blog/edit', ['blog'=>$blogs]);
    }
    public function blogUpdate(BlogEditRequest $request)
    {
        $blog = Blog::findOrFail($request->id);

        if(Auth::user()->type != 'admin'){
            if($blog->user_id != Auth::user()->id){
                return redirect()->back()->withErrors(['error' => 'You have not permission to update this blog']);
            }
        }
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        $blog->identifier = $request->identifier;
        $blog->status = $request->status;
        $blog->tags = $request->tags;
        $blog->type = $request->type;
        if($blog->save())
            return redirect()->back()->with('success','Data Updated successfully.');
        else
            return redirect()->back()->withErrors(['error' => 'Something went wrong try again later']);
        //return Redirect::to(route('blog.edit',['slug' => $blog->id]));
    }
}
