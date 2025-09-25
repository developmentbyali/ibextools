@extends('layouts.proapp')
@section('title','Binary To String- IBEX Tools')
@section('description','Convert your Binary code into String.')
@section('keywords','binary to string')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            <!-- TOOL-->
            <div class="row">
                <div class="col tool-working shadow-sm p-3 mb-4 bg-white rounded">
                    <h1 class="p-2 text-center" >Convert Binary into String</h1>

                    <binary-to-string-component></binary-to-string-component>
                </div>
            </div>
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                        <h5 class="mb-3 px-3 py-2 bg-primary text-light">Online Converter</h5>
                            <p>Using Online Converter to easily convert your Binary code into
                               String code on one click,Simply write your Binary code and tab the Run
                               Minify button.
                               Binary coded Hexadecimal (BCS) is a system of writing numerals that assigns a
                               four-digit binary code.
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
                            <div class="card mb-2" >
                                <img src="/images/ibextools-logo-gray.png" class="card-img-top img-thumbnail" alt="ibex tools ">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card mb-2" >
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item bg-primary text-light ">Other Relative Tools</li>
                                    <a href="binary-to-octal" class="toolColor"><li class="list-group-item">Binary To Octal </li></a>
                                    <a href="binary-to-hexadecimal" class="toolColor"><li class="list-group-item">Binary To Hexadecimal</li></a>
                                    <a href="binary-to-decimal" class="toolColor"><li class="list-group-item">Binary To Decimal</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



