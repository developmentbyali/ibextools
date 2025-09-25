@extends('layouts.proapp')
@section('title',$blog->title.' - IBEX Tools')
@section('description',$blog->short_description)
@section('keywords',$blog->tags)
@section('content')
    <section class="">
        <div class="banner py-5">
            <h4 class="display-3 text-center mb-3 px-3 py-2 bg-gradient heading-blue">
                <a href="{{route('blog.detail',['slug'=>$blog->slug])}}" class="text-white" >{{$blog->title}}</a>
            </h4>
        </div>
        <div class="container-fluid pl-5 pr-5">
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12">
{{--                            <h1 class="mb-3 px-3 py-2 bg-gradient heading-blue"><a href="{{route('blog.detail',['slug'=>$blog->slug])}}" class="text-white" >{{$blog->title}}</a> </h1>--}}
                            <div class="row hometools">
                                <div class="col-md-12">
                                    <div class="mb-2" >
                                        <div class="card-body">
                                            <p class="card-text">{!! $blog->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="w-100 p-4 mb-3 bg-grd-blue shadow-sm rounded">
                        <span class="text-white font-size-md">Empowering 100+ Free Online Tools</span>
                        <hr>
                        <p class="text-light font-size-xs"><i>With Over Online Tools, Ibextools Helping Millions of Students, Teachers, Businessmen &amp; Developers Every Month.</i></p>
                    </div>
                </div>
                <div class="card-header  col-lg-12"><h4>Tags</h4></div>
                <!--Card content-->
                <div class="card-body">
                    @php
                        $buttons = explode(',',$blog->tags);
                    @endphp
                    @foreach($buttons as $key=> $value)
                        <a href="#" class="badge bg-primary text-white mr-2 p-2 mb-2">{{$buttons[$key]}}</a>
                    @endforeach
                </div>
                <div class="blogUser p-4 col-lg-12">
                    <h4 class=" mb-3 px-2 py-2  text-capitalize">
                        {!! $blog->user->type !!} details
                    </h4>

                    <!-- User Information about Adding Blog -->

                    <div class="px-2">
                        <p class="badge  p-2">By:&nbsp;&nbsp;</p>
                        <span><strong>{!! $blog->user->name !!}</strong></span>
                    </div>

                    <div class="px-2 ">
                        <p class="badge  p-2">Email:&nbsp;&nbsp;</p>
                        <span><strong>{!! $blog->user->email !!}</strong></span>
                    </div>

                    <div class="px-2  ">
                        <p class="badge  p-2">User Type:&nbsp;&nbsp;</p>
                        <span><strong>{!! $blog->user->type !!}</strong></span>
                    </div>

                </div>
                </div>

        </div>
    </section>
@endsection



