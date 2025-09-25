@extends('layouts.proapp')
@section('title','Sql Formatter for free - IBEX Tools')
@section('description','free online Sql formatter will male your sql queries beautify and easy to read. Sometime its hard to read queries because of complexity it will help to read.')
@section('keywords','Free Online Sql beautifier, Free Online Sql formatter, sql formatter, beautify sql, beautify queries, beautify query')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            <!-- TOOL-->
            <div class="row">
                <div class="col tool-working shadow-sm p-3 mb-4 bg-white rounded">
                    <h1 class="p-2 text-center" >Online Free Sql Formatter</h1>

                    <sql-component></sql-component>
                </div>
            </div>
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                        <h5 class="mb-3 px-3 py-2 bg-primary text-light">Online Free Sql Formatter Or Online Free Sql Beautifier</h5>
                            <p>The lengthy code becomes difficult to interpret. There is a large amount of unformatted
                                SQL code while reading SQL scripts, which are difficult to reduce and understand.
                                The Formatting options in SQL makes the work easier for us.

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
                                    <a href="#" class="toolColor"><li class="list-group-item">Php formatter </li></a>
                                    <a href="#"class="toolColor"><li class="list-group-item">Ruby formatter </li></a>
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



