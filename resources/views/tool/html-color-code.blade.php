@extends('layouts.proapp')
@section('title','HTMl Color Cdde - IBEX Tools')
@section('description','Beautify your CSS to clean it up. Make your CSS easier to read and validate it.')
@section('keywords','css formatter, format css, css beautifier, beautify css,css parser, css validator')
@section('content')
    <section class="mt-5">
        <div class="container-fluid pl-5 pr-5">
            <!-- TOOL-->
            <div class="row">
                <div class="col tool-working shadow-sm p-3 mb-4 bg-white rounded">
                    <h1 class="p-2 text-center" >Color Picker</h1>
                    <p class="text-left">Online color picker, Covert HEX to RGB, Covert RGB to HEX, Covert RGB to RGBA, Covert RGB to RGBA</p>

                    <html-color-code-component></html-color-code-component>
                </div>
            </div>
            <!-- FEATURES-->
            <div class="row">
                <div class="col mb-4 py-4 shadow-sm bg-white rounded">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Online Color Picker </h5>
                            <p>
                                You can pick color  and drag your cursor inside the picker area to highlight a color on the right.
                            </p>
                            <p>
                                You can also add Hex, RGB with opacity values to search get color in the fields below the color swatch;
                            </p>
                            <p>
                                After selecting a color you can have different color types for online use or you can use thses for websites or mobile apps or even for you college project.
                            </p>
                            <h5 class="mb-3 px-3 py-2 bg-primary text-light">Convert Color coded </h5>
                            <p>
                                Via this color picker you can convert you HEX color to RGB color, or Covert RGB to HEX, or Covert RGB to RGBA, or Covert RGB to RGBA
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



