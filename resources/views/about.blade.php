@extends('layouts.proapp')
@section('title','About - IBEX Tools')
@section('description','The main purpose of this website is to create some simple but useful tools in testing, debugging, and development')
@section('keywords','debugging tools, development tools, beautifier tools, testing tools')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            {!! $about->description!!}
        </div>
    </section>
@endsection
