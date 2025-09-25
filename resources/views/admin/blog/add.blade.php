@extends('layouts.app')
@section('header')
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add New Blog') }}</div>
                    <div class="card-body">
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                            </div>
                        @endif
                        @if($errors->any())
                            <ul class="text-danger">
                                {!! implode('', $errors->all('<li>:message</li>')) !!}
                            </ul>
                        @endif
                        <form method="POST" action="{{route('blog.add')}}">
                            @csrf
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary pull-right">
                            </div>
                            <div class="form-group">
                                <label ref="" class="form-label">Title</label>
                                <input class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label ref="" class="form-label">Slug</label>
                                <input class="form-control" name="slug" value="{{ old('slug') }}">
                            </div>
                            <div class="form-group">
                                <label ref="" class="form-label">Identifier</label>
                                <input class="form-control" name="identifier" value="{{ old('identifier') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Short Description</label>
                                <textarea rows="5" class="form-control" name="short_description">{{ old('short_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tags ( Comma separated )</label>
                                <textarea rows="2" class="form-control" name="tags">{{ old('tags') }}</textarea>
                            </div>
                            @if(Auth::user()->type === 'admin')
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select a option</option>
                                        <option value="published" {{ old("status") == 'published' ? "selected":"" }}>Published</option>
                                        <option value="pending" {{ old("status") == 'pending' ? "selected":"" }}>Pending</option>
                                        <option value="draft" {{ old("status") == 'draft' ? "selected":"" }}>Draft</option>
                                        <option value="rejected" {{ old("status") == 'rejected' ? "selected":"" }}>Rejected</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Type</label>
                                    <select name="type" class="form-control">
                                        <option value="">Select a option</option>
                                        <option value="main-listing" {{ old("type") == 'main-listing' ? "selected":"" }}>main-listing</option>
                                        <option value="tool-details" {{ old("type") == 'tool-details' ? "selected":"" }}>tool-details</option>
                                        <option value="static-page" {{ old("type") == 'static-page' ? "selected":"" }}>static-page</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status"  class="form-control">
                                        <option value="">Select a option</option>
                                        <option value="pending" {{ old("status") == 'pending' ? "selected":"" }}>Pending</option>
                                        <option value="draft" {{ old("status") == 'draft' ? "selected":"" }}>Draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Type</label>
                                    <select name="type" class="form-control">
                                        <option value="">Select a option</option>
                                        <option value="main-listing" {{ old("type") == 'main-listing' ? "selected":"" }}>main-listing</option>
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea rows="5" class="form-control description" id="description" name="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary pull-right">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    CKEDITOR.editorConfig = function( config ) {
            config.language = 'es';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;
    };
    setTimeout(function(){
        CKEDITOR.replace('description')
    },100);
    </script>
@endpush
