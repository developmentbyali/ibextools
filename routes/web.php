<?php

use App\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//static pages
//Route::get('/', function () { return view('welcome');});
Route::get('/', function () { return view('landingpage');});
Route::get('/about', 'BlogController@about_view');
Route::get('/privacy', function () { return view('privacy');});

Auth::routes(['verify' => true]);

//Route::get('/{slug}', 'HomeController@tool')->name('tool');
//Tools pages
Route::get('/shortUrl', function () { return view('tool/short-url');})->name('short-url');
Route::post('/shortUrl',  'LinkController@createLink')->name('short-generate');
Route::post('/minify', 'ToolController@minify');
Route::get('/css-beautifier', function () { $blogs = Blog::where('type','tool-details')->where('status','published')->where('identifier','css-beautifier')->latest()->get(); return view('tool/css-beautifier',['blogs' => $blogs]);})->name('css-beautifier');
Route::get('/js-beautifier', function () { return view('tool/js-beautifier');})->name('js-beautifier');
Route::get('/js-minify', function () { return view('tool/js-minify');})->name('js-minify');
Route::get('/css-minify', function () { return view('tool/css-minify');})->name('css-minify');
Route::get('/json-to-xml', function () { return view('tool/json-to-xml');})->name('json-to-xml');
Route::get('/html-beautifier', function () { return view('tool/html-beautifier');})->name('html-beautifier');
Route::get('/html-color-code', function () { return view('tool/html-color-code');})->name('html-color-code');
Route::get('/binary-to-decimal', function () { return view('tool/binary-to-decimal');})->name('binary-to-decimal');
Route::get('/binary-to-octal', function () { return view('tool/binary-to-octal');})->name('binary-to-octal');
Route::get('/binary-to-string', function () { return view('tool/binary-to-string');})->name('binary-to-string');
Route::get('/decimal-to-binary', function () { return view('tool/decimal-to-binary');})->name('decimal-to-binary');
Route::get('/decimal-to-octal', function () { return view('tool/decimal-to-octal');})->name('decimal-to-octal');
Route::get('/decimal-to-hexa', function () { return view('tool/decimal-to-hexadecimal');})->name('decimal-to-hexa');
Route::get('/octal-to-binary', function () { return view('tool/octal-to-binary');})->name('octal-to-binary');
Route::get('/octal-to-decimal', function () { return view('tool/octal-to-decimal');})->name('octal-to-decimal');
Route::get('/octal-to-hexadecimal', function () { return view('tool/octal-to-hexadecimal');})->name('octal-to-hexadecimal');
Route::get('/string-to-binary', function () { return view('tool/string-to-binary');})->name('string-to-binary');
Route::get('/md5-convert', function () { return view('tool/md5');})->name('md5');
Route::get('/word-count', function () { return view('tool/word-count');})->name('word-count');
Route::get('/sha1-convert', function () { return view('tool/sha1');})->name('sha1');
Route::get('/sha256-convert', function () { return view('tool/sha256');})->name('sha256');
Route::get('/sha512-convert', function () { return view('tool/sha512');})->name('sha512');
Route::get('/base64-encode', function () { return view('tool/base64-encode');})->name('base64encode');
Route::get('/base64-decode', function () { return view('tool/base64-decode');})->name('base64decode');
Route::get('/hexadecimal-to-binary', function () { return view('tool/hexadecimal-to-binary');})->name('hexadecimal-to-binary');
Route::get('/hexadecimal-to-decimal', function () { return view('tool/hexadecimal-to-decimal');})->name('hexadecimal-to-decimal');
Route::get('/hexadecimal-to-octal', function () { return view('tool/hexadecimal-to-octal');})->name('hexadecimal-to-octal');
Route::get('/binary-to-hexadecimal', function () { return view('tool/binary-to-hexadecimal');})->name('binary-to-hexadecimal');
Route::get('/sql-formatter', function () { return view('tool/sql-formatter');})->name('sqlformatter');
Route::get('/data-size', function () { return view('tool/data-size');})->name('data-size');
Route::get('/rgb-to-hex', function () { return view('tool/rgb-to-hex');})->name('rgb-hex');
Route::get('/xml-formatter', function () { return view('tool/xml-formatter');})->name('xml-formatter');
Route::get('/json-formatter', function () { return view('tool/json-formatter');})->name('json-formatter');
Route::get('/timestamp-converter', function () { return view('tool/timestamp');})->name('timestamp-converter');
Route::get('/url-encode', function () { return view('tool/url-encode');})->name('url-encode');
Route::get('/url-decode', function () { return view('tool/url-decode');})->name('url-decode');
Route::get('/json-encode', function () { return view('tool/json-encode');})->name('json-encode');
Route::get('/json-decode', function () { return view('tool/json-decode');})->name('json-decode');
Route::get('/back-link', function () { return view('tool/back-link');})->name('back-link');
Route::get('/back-link', function () { return view('tool/back-link');})->name('back-link');
Route::get('/png-converter', function () { return view('tool/png-converter');})->name('png-converter');

Route::post('/file-upload', 'ToolController@fileUpload')->name('file-upload');
Route::get('/debug-imagick', 'ToolController@debugImagick');
Route::post('/backlink', 'BacklinkController@make')->name('backlink-make');
Route::get('/file-download-url/{id}', 'ToolController@fileUrl')->name('file-download-url');
Route::get('/download-png/{hash}', 'ToolController@pngDownload')->name('file-upload');
//Route::get('/domain-whois', function () { return view('tool/whois');})->name('whois');
//Route::post('/domain-whois', 'ToolController@whois')->name('whois-post');
Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blog/{slug}', 'BlogController@view')->name('blog.detail');
//Route::get('/blog/{slug}', function () { return view('blog');})->name('blog');
Route::get('/{uuid}', 'RedirectController@index');
Route::middleware('auth', 'authAdmin')->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/addTool', 'HomeController@addTool')->name('add-tool');
    Route::post('/addTool', 'ToolController@submit');
    Route::get('/blog', 'HomeController@blogs')->name('blog-listing');
    //Route::get('/blogs/{slug}', 'HomeController@blogs')->name('blog.detail');
    Route::get('/blog/add',  function () { return view('admin/blog/add');})->name('blog.new');
    Route::get('/blog/{slug}', 'HomeController@blogEdit')->name('blog.edit');
    Route::post('/blog/add',  'HomeController@blogAdd')->name('blog.add');
    Route::post('/blog', 'HomeController@blogUpdate')->name('blog.save');
    Route::get('/toolListing', 'HomeController@addListing')->name('tool-listing');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/blog', 'HomeController@blogs')->name('blog-listing');
    Route::get('/blog/add',  function () { return view('admin/blog/add');})->name('blog.new');
    Route::get('/blog/{slug}', 'HomeController@blogEdit')->name('blog.edit');
    Route::post('/blog/add',  'HomeController@blogAdd')->name('blog.add');
    Route::post('/blog', 'HomeController@blogUpdate')->name('blog.save');
});

