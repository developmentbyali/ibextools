@extends('layouts.proapp')
@section('title','Free Online Tools - IBEX Tools')
@section('description','Ibex Free Online Tools provided online tools to help you in daily life. Following are the some popular tools CSS Beautifier, CSS Uglify, JS Uglify, Beautify JS abd etc.')
@section('keywords','css formatter, format css, js beautifier, beautify js, html parser, html parser, css validator')
@section('content')
    <section class="">
        <div class="banner py-5">
            <h1 class="display-3 text-center mobiledisplay">Ibex Technical Tools</h1>
            <p class="text-center">Dozens of Technical Tools that helps to save your time enhance your performance with working and help you to easily get things in one plateform.</p>
            <search-component></search-component>
        </div>
        <div class="container-fluid pl-5 pr-5">
            <!-- FEATURES-->
            <div class="row">
                <div class="col-mlg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-4 py-4 shadow-sm bg-white rounded">
                            <div class="row float-lg-left">
                                <div class="col-lg-12 col-md-12">
                                    <h5 class="mb-3 px-3 py-2 bg-gradient heading-blue text-light">Online Beautifier and Minifier Tools </h5>
                                    <div class="row hometools">
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('css-beautifier')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">CSS Beautifier</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <a href="{{route('html-beautifier')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">CSS Fonts</h4>
                                                        <p class="card-text">Search for web safe fonts and other web fonts. A complete collection of font families or web safe CSS stacks. </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('css-minify')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">CSS Minify</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('js-beautifier')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">JS Beautifier</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('js-minify')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Javascript Minify</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Javascript Obfuscate</h4>
                                                    <p class="card-text">Encode javascript to make it difficuly to read, making it more secure.  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Javascript Error Logger</h4>
                                                    <p class="card-text">Log javascript errors that your users encounter on your production site.   </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">HTML Entities Escape</h4>
                                                    <p class="card-text">Escape HTML characters so that they can be used in an HTML page </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">HTML Entities Unescape</h4>
                                                    <p class="card-text">Unescape special HTML characters </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('html-beautifier')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">HTML Beautifier</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-12 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">HTML/JS/CSS Playground</h4>
                                                    <p class="card-text">An HTML, CSS, Javascript playground to test and share code snippets. </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('html-color-code')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">HTML Color Codes</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">CSV To HTML Converter</h4>
                                                    <p class="card-text">Convert CSV to HTML </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">CSV To JSON Converter</h4>
                                                    <p class="card-text">Convert CSV to JSON  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">CSV To TSV Converter</h4>
                                                    <p class="card-text">Convert CSV To TSV  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">CSV To XML Converter</h4>
                                                    <p class="card-text">Convert CSV To XML  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON To CSV Converter</h4>
                                                    <p class="card-text">Convert JSON To CSV  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON To HTML Converter</h4>
                                                    <p class="card-text">Convert JSON To HTML</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON To TSV Converter</h4>
                                                    <p class="card-text">Convert JSON To TSV</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON To XML Converter</h4>
                                                    <p class="card-text">Convert JSON To XML</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">XML To CSV Converter</h4>
                                                    <p class="card-text">Convert XML To CSV</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">XML To HTML Converter</h4>
                                                    <p class="card-text">Convert XML To HTML</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">XML To JSON Converter</h4>
                                                    <p class="card-text">Convert XML To JSON</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">XML To TSV Converter</h4>
                                                    <p class="card-text">Convert XML To TSV</p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('base64decode')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Base64 Decode</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('base64encode')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Base64 Encode</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Binary Converter</h4>
                                                    <p class="card-text">Convert between hex, binary, and decimal quickly and easily.  </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('binary-to-decimal')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Binary To Decimal Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('binary-to-hexadecimal')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Binary To Hex Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('binary-to-octal')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Binary To Octal Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('binary-to-string')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Binary To String Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Unit Converter</h4>
                                                    <p class="card-text">Convert between different units of measure. </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('decimal-to-binary')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Decimal To Binary Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('decimal-to-hexa')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Decimal To Hex Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('decimal-to-octal')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Decimal To Octal Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Online Diff Tool</h4>
                                                    <p class="card-text">Compare documents using diff and easilty visualize the differences. Quickly merge the two files into one. </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Email Validator</h4>
                                                    <p class="card-text">Determine whether an email address actually exists, and make sure it is valid. </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Favicon.ico & App Icon Generator</h4>
                                                    <p class="card-text">Upload an image and have it turned into Favicons and App Icons, and get the proper code to use them. </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Convert Files</h4>
                                                    <p class="card-text">Convert your video, audio, image, and document files between all formats.  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">GO Formatter</h4>
                                                    <p class="card-text">Clean up your GO code.</p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('hexadecimal-to-binary')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Hex To Binary Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('hexadecimal-to-decimal')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Hex To Decimal Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('hexadecimal-to-octal')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Hex To Octal Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Hex To String Converter</h4>
                                                    <p class="card-text">Convert hex to string  </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('data-size')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Data Size Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">.htaccess Generator</h4>
                                                    <p class="card-text">Easily create your .htaccess file with all the options you need. </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Is It Up Or Down</h4>
                                                    <p class="card-text">Check whether a website is up or down.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Online Image Editor</h4>
                                                    <p class="card-text">Edit an image in your browser.  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
        --}}{{--                                <a href="{{route('json-formatter')}}">--}}{{--
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON Formatter & Beautifier</h4>
                                                    <p class="card-text">JSON Formatter & Beautifier   </p>

                                                </div>
                                            </div>
        --}}{{--                                </a>--}}{{--
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON Editor</h4>
                                                    <p class="card-text">Online JSON editor to help you maintain your data files.   </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON Minify</h4>
                                                    <p class="card-text">Minify your JSON   </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">JSON Validator</h4>
                                                    <p class="card-text">Make sure your JSON is validly formatted and causing your app to break.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Keyword Tool</h4>
                                                    <p class="card-text">Generate a long-tail keyword list and find search volume and CPC for keyword research. </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">MAC Address Search</h4>
                                                    <p class="card-text">Lookup a device's MAC address to find the manufacturer.  </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('md5')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">MD5 Hash Generator</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('octal-to-binary')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Octal To Binary Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('octal-to-decimal')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Octal To Decimal Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('octal-to-hexadecimal')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Octal To Hex Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Perl Formatter</h4>
                                                    <p class="card-text">Reformat Perl code so that is easier to read. </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">PHP Formatter</h4>
                                                    <p class="card-text">Fix sloppy programming and indentation for PHP. </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Python Formatter</h4>
                                                    <p class="card-text">Python beautifier.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">RegEx Testing</h4>
                                                    <p class="card-text">Test, experiment, and share Regular Expressions.</p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('rgb-hex')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">RGB to HEX Color Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Default Router Settings</h4>
                                                    <p class="card-text">Find the factory default settings for your router. </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Ruby Formatter</h4>
                                                    <p class="card-text">Ruby beautifier.</p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('sha1')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">SHA-1 Hash Generator</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('sha256')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">SHA-256 Hash Generator</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('sha512')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">SHA-512 Hash Generator</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">CSS Sprite Generator</h4>
                                                    <p class="card-text">Create a CSS sprite out of many images to improve your website's load time.</p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('sqlformatter')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">SQL Formatter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('string-to-binary')}}" >
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">String To Binary Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Strip and Remove HTML Tags</h4>
                                                    <p class="card-text">Strip HTML tags to remove them from an HTML document </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">Strip and Remove XML Tags</h4>
                                                    <p class="card-text">Strip XML tags to remove them from an XML document </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('timestamp-converter')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">TimeStamp Converter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('url-encode')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">URL Encode</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('url-decode')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">URL Decode</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('json-encode')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">JSON Encode</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <!-- <div class="col-lg-4 col-md-12">
                                     <a href="{{route('json-decode')}}">
                                        <div class="card mb-2" >
                                        <div class="card-body">
                                            <h4 class="card-title">JSON Decode</h4>
                                            <p class="card-text">Decode Your Encoded Json  </p>
                                        </div>
                                    </div>
                                    </a>
                                </div>-->

                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('back-link')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">BackLink</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('word-count')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Word Counter</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('xml-formatter')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">XML Formatter & Beautifier</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{route('short-url')}}">
                                                <div class="card mb-2" >
                                                    <div class="card-body">
                                                        <h4 class="card-title">Url Shortner</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        {{--<div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">XML Entities Escape</h4>
                                                    <p class="card-text">Escape XML characters so that they can be used in an XML page </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card mb-2" >
                                                <div class="card-body">
                                                    <h4 class="card-title">XML Entities Unescape</h4>
                                                    <p class="card-text">Unescape special XML characters  </p>

                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class=" background-clr p-4">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-4 new-sec-add">
                                <h3 class="text-primary">What is Ibex Tools <i class="fas fa-user-graduate fa-3x"></i></h3>
                                <p class="">Ibex Tools is an online code beautifier that allows you to beautify your source code. Ibex Tools also provides lots of tools that help to save developer's time. Use search to find more tools. </p>
                            </div>

                            <div class="col-lg-4 new-sec-add">
                                <h3 class="text-primary">How to use Ibex Tools <i class=" fas fa-question fa-3x"></i></h3>
                                <p class=""> Choose your Programming language, enter the source code ... and you are ready to go! </p>
                            </div>
                            <div class="col-lg-4 new-sec-add">
                               <h3 class="text-primary ">Contact us on ... <i class=" fas fa-address-book fa-3x"></i></h3>
                                <a target="_blank" href="#" title="Facebook"> <i class="fab fa-facebook-f"></i></a> <br>
                                <a target="_blank" href="#" title="twitter"> <i class="fab fa-twitter"></i></a><br>
                                <a target="_blank" href="#" title="Gmail"> <i class="fas fa-at"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    <div class="bg-light border-bottom py-5" id="content" data-aos="fade">
                                <div class="row two-sectn-align">
                                    <div class="col-lg-12 col-md-12 my-auto pt-8 pb-5">
                                        <div class="mb-3 display-5 text-primary">Free Online Tools Mission</div>
                                        <p class="lead mb-4 mr-8">Ibex Tools is constantly growing and updatable tools, and we have long-term plans to making it better</p>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="w-100 p-4 mb-3 bg-primary shadow-sm rounded">
                                            <span class="text-white font-size-md">Empowering 100+ Free Online Tools</span>
                                            <hr>
                                            <p class="text-light font-size-xs"><i>With Over Online Tools, Ibextools Helping Millions of Students, Teachers, Businessmen &amp; Developers Every Month.</i></p>
                                        </div>
                                        <div class="w-100 py-2 px-3 font-size-sm font-weight-bold rounded"><h3>Our Services</h3></div>
                                        <div class=" card mt-2">
                                            <div class="card-body">
                                                <h5 class="font-weight-bold mt-5"> Website Services</h5>
                                                <hr>
                                                <p class="font-size-xs">Feel free to <a href="Mailto:contact@ibex.com">Contact us</a> for your customized website for your business that helps you to get more customers for your business. We always availble to put your dreams to digital world.</p>
                                                <h5 class="font-weight-bold mt-5"> Buy Customize Tools</h5>
                                                <hr>
                                                <p class="font-size-xs"><a href="Mailto:contact@ibex.com">Contact us</a> for placing custom tools order and run directly from your own website. You can decide the design, interface, and features of calculators when placing the custom order.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="pt-4">
                            <h5 class="mb-3 px-3 py-2 bg-gradient heading-blue text-light">Easy to use</h5>
                            <p>
                                Begin with the "type (or paste) here..." area to enter your data, then hit the "minify" or "beautify" buttons respectively. After a blink of any eye, the results will be shown below these buttons. Alternatively, use the "click (or tap) here..." area to select JS files from your device, then hit the corresponding button. Once the upload and processing completes, you will be notified to download the resulting minified/beautified JS file. That's all!
                            </p>
                            <h5 class="mb-3 px-3 py-2  bg-gradient heading-blue text-light">Safe and secure</h5>
                            <p>
                                All communications with our servers are made through secure SSL encrypted connections (https). Uploaded files are deleted from our servers immediately after being processed, and the resulting downloadable JS file is deleted right after the first download attempt, or 15 minutes of inactivity. We do not keep or inspect the contents of the entered data or uploaded files in any way. Read our privacy policy below for more details.
                            </p>
                            <h5 class="mb-3 px-3 py-2  bg-gradient heading-blue text-light">Completely free</h5>
                            <p>
                                Our tool is free to use. From now you don't have to download any software for such tasks.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT-->
        </div>
    </section>
@endsection



