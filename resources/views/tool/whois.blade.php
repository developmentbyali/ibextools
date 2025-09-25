@extends('layouts.proapp')
@section('title','Domain whois - IBEX Tools')
@section('description','Check Domains whois Information for free. Check domain owner, expiry and nameserver information checker.')
@section('keywords','Domains Whois Check, domain owner registrar, Domain expiration date, Domain nameservers')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            <!-- TOOL-->
            <div class="row">
                <div class="col tool-working shadow-sm p-3 mb-4 bg-white rounded">
                    <h1 class="p-2 text-center" >Domain whois information checker</h1>
                    <p class="text-left">You want to know more about a domain check information releated to domain with our tool for free.</p>
                    <label class="form-label" for="url">Please add valida url/domain</label>
                    @if($errors->any())
                        <ul class="text-danger">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    @endif
                    <form method="post" action="{{route('whois-post')}}" class="form-inline">
                        <div class="form-group">
                            <input type="url" class="form-control" name="url" id="url">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-success mx-2" value="Check">
                        </div>
                    </form>
                </div>
            </div>
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Online JS Beautifier </h5>
                            <p>
                                Meet JS Minify and Beautify, a simple online tool that does exactly what it says; minifies and beautifies JavaScripts quickly and easily. Minify your data in a hassle-free way, or beautify it into human-readable format.
                            </p>
                            <p>
                                Minify (also known as uglify), in computer science is the process of removing all unnecessary characters from source code without changing its functionality. These unnecessary characters usually include white space characters, new line characters, comments, and sometimes block delimiters, which are used to add readability to the code but are not required for it to execute. Minified source code is especially useful for interpreted languages and data interchange formats deployed and transmitted on the internet (such as JavaScript), because it reduces the amount of data that needs to be transferred.
                            </p>
                            <p>
                                A minified source code may be reversed using a beautify (also known as prettify) process, which applies various stylistic formatting conventions to it. These formatting conventions usually adjust positioning, spacing, and similar modifications intended to make the content easier for people to view, read, and understand.
                            </p>
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Easy to use</h5>
                            <p>
                                Begin with the "type (or paste) here..." area to enter your data, then hit the "minify" or "beautify" buttons respectively. After a blink of any eye, the results will be shown below these buttons. Alternatively, use the "click (or tap) here..." area to select JS files from your device, then hit the corresponding button. Once the upload and processing completes, you will be notified to download the resulting minified/beautified JS file. That's all!
                            </p>
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Safe and secure</h5>
                            <p>
                                All communications with our servers are made through secure SSL encrypted connections (https). Uploaded files are deleted from our servers immediately after being processed, and the resulting downloadable JS file is deleted right after the first download attempt, or 15 minutes of inactivity. We do not keep or inspect the contents of the entered data or uploaded files in any way. Read our privacy policy below for more details.
                            </p>
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Completely free</h5>
                            <p>
                                Our tool is free to use. From now you don't have to download any software for such tasks.
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="card mb-2" >
                                <img src="/images/ibextools-logo-gray.png" class="card-img-top img-thumbnail" alt="ibex tools ">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card mb-2" >
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item bg-primary text-light ">Other Tools</li>
                                    <li class="list-group-item">Base64 Decode </li>
                                    <li class="list-group-item">Base64 Encode</li>
                                    <li class="list-group-item">URL Decode</li>
                                    <li class="list-group-item">URL Encode</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



