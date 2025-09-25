@extends('layouts.proapp')
@section('title','CSS Beautifier - IBEX Tools')
@section('description','Beautify your CSS to clean it up. Make your CSS easier to read and validate it.')
@section('keywords','css formatter, format css, css beautifier, beautify css,css parser, css validator')
@section('content')
    <section class="">
        <div class="banner py-5">
            <h1 class="display-3 text-center">BLOG</h1>
            <p class="text-center">Dozen of Technical Tools that helps to save your time enhance your performance with working and help you to easily get things in one plateform.</p>
        </div>
        <div class="container-fluid pl-5 pr-5">
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12">
                            <h5 class="mb-3 px-3 py-2 bg-gradient heading-blue text-light">Online Beautifier and Minifier Tools </h5>
                            <div class="row hometools">
                                @foreach($blogs as $blog)
                                    <div class="col-lg-6 col-md-12">
                                        <a href="{{route('blog.detail',['slug'=>$blog->slug])}}" >
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$blog->title}}</h4>
                                                    <p class="card-text">{{$blog->short_description}}</p>
                                                    <p class="card-text text-underline">Read More</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card my-3">
                                <!-- Card header -->
                                <div class="card-header"><h4>Tags</h4></div>
                                <!--Card content-->
                                <div class="card-body">
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">beautify</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">css</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">html</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">tools</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">js</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">xml</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">encode</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">decode</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">csv</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">JSON</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Binary</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">converter</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Base64</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Tsv</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">codes</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Minify</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Obfuscate</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">fonts</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Octal</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Hex</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Decimal</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Email</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Validator</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Favicon</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Image converter</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Mac</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">MD5 hash</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">Perl</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">PHP</a>
                                    <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">css sprite</a>
                                </div>
                                {{--                                <div class="card-footer">--}}
                                {{--                                    <a class="btn btn-dark-green btn-block waves-effect waves-light" href="#">See more</a>--}}
                                {{--                                </div>--}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



