@extends('layouts.proapp')
@section('title',' URL Encode - IBEX Tools')
@section('description','Encode Url  .')
@section('keywords','url encoder')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            <!-- TOOL-->
            <div class="row">
                <div class="col tool-working shadow-sm p-3 mb-4 bg-white rounded">
                    <h1 class="p-2 text-center" > Url Encode</h1>

                    <url-encode-component></url-encode-component>
                </div>
            </div>
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Online Converter</h5>
                            <p>
                                You can easily convert timestamp in date and year .
                                just type the timestamp code.
                            </p>
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Easy to use</h5>
                            <p>
                                Begin with the "type (or paste) here..." area to enter your data, then hit the "minify" or "beautify"
                                buttons respectively. After a blink of any eye, the results will be shown below these buttons.
                                Alternatively, use the "click (or tap) here...".
                            </p>
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Safe And Secure</h5>
                            <p>
                                All communications with our servers are made through secure SSL encrypted connections (https).
                                Uploaded files are deleted from our servers immediately after being processed,
                                We do not keep or inspect the contents of the entered data or uploaded files in any
                                way. Read our privacy policy below for more details.
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-12">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



