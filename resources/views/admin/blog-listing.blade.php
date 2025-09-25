@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs') }} <a href="{{route('blog.new')}}" class="btn btn-sm btn-primary float-right"> Add New</a></div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($blogs as $blog)
                            <li class="list-group-item ">
                                {{$blog->title}}
                                <span class="badge badge-primary badge-pill">
                                    {{$blog->updated_at->diffForHumans()}}
                                </span>
                                <br>
                                <a href="{{ route('blog.edit', ['slug' => $blog->id]) }}" class="text-primary">Edit</a> &nbsp;
                                <a href="#" class="text-danger">{{$blog->status}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
