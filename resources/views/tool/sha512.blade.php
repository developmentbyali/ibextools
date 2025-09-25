@extends('layouts.proapp')
@section('title',' SHA512 Hash Genrator- IBEX Tools')
@section('description','Convert your String in SHA512 .')
@section('keywords','sha512 hash genrator')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            <!-- TOOL-->
            <div class="row">
                <div class="col tool-working shadow-sm p-3 mb-4 bg-white rounded">
                    <h1 class="p-2 text-center" > SHA512 Hash Genrator</h1>
                    <sha512-component></sha512-component>
                </div>
            </div>
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                        <h5 class="mb-3 px-3 py-2 bg-primary text-light">Online Converter</h5>
                            <p>A cryptographic hash (sometimes called 'digest') is a kind of 'signature'
                                for a text or a data file. SHA-512 generates an almost-unique 512-bit (32-byte)
                                 signature for a text.

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
                                    <a href="sha1-convert" class="toolColor"><li class="list-group-item">SHA 1 </li></a>
                                    <a href="sha256-convert"class="toolColor"><li class="list-group-item">SHA 256</li></a>
                                    <!-- <a href="#"class="toolColor"><li class="list-group-item">Url Encode</li></a> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



