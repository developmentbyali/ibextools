<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Title-->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="title" content="@yield('title')">
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    <meta name="robots" content="ALL, FOLLOW, INDEX" />
    <meta name="author" content="IBEXTOOLS.COM" />
    <meta name="verifyownership" content="4993a70e39c66bef3e1c7de43351ebef"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Libs CSS-->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174280770-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-174280770-1');
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        !function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","reset","group","track","ready","alias","debug","page","once","off","on","addSourceMiddleware","addIntegrationMiddleware","setAnonymousId","addDestinationMiddleware"];analytics.factory=function(e){return function(){var t=Array.prototype.slice.call(arguments);t.unshift(e);analytics.push(t);return analytics}};for(var e=0;e<analytics.methods.length;e++){var key=analytics.methods[e];analytics[key]=analytics.factory(key)}analytics.load=function(key,e){var t=document.createElement("script");t.type="text/javascript";t.async=!0;t.src="https://cdn.segment.com/analytics.js/v1/" + key + "/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n);analytics._loadOptions=e};analytics.SNIPPET_VERSION="4.13.1";
            analytics.load("aLzHlyJu4FstwDp96v3CC4dp3vzew7Up");
            analytics.page();
        }}();
    </script>
</head>
<body>
<nav class="shadow-sm navbar navbar-expand-lg auto-hiding-navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand py-0" href="/" target="_self" title="ibextools.com"><span><img width="75" alt="ibextools-logo-gray" src="/images/ibextools-logo-gray.png" /> </span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav ml-auto">
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Advance Tools--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                        <a class="dropdown-item" href="#">CSV to HTML converter</a>--}}
{{--                        <a class="dropdown-item" href="#">CSV to JSON</a>--}}
{{--                        <a class="dropdown-item" href="#">CSV to TSV converter</a>--}}
{{--                        <a class="dropdown-item" href="#">CSV to XML converter</a>--}}
{{--                        <a class="dropdown-item" href="#">JSON to CSV converter</a>--}}
{{--                        <a class="dropdown-item" href="#">JSON to HTML converter</a>--}}
{{--                        <a class="dropdown-item" href="#">HTML/CSS/JS playground</a>--}}
{{--                        <a class="dropdown-item" href="html-color-code">HTML Color Codes</a>--}}
{{--                        <a class="dropdown-item" href="#">JSON to TSV converter</a>--}}
{{--                        <a class="dropdown-item" href="#">JSON to XML converter</a>--}}
{{--                        <a class="dropdown-item" href="#">XML to CSV converter</a>--}}
{{--                        <a class="dropdown-item" href="#">XML to HTML converter</a>--}}
{{--                        <a class="dropdown-item" href="#">XML to JSON converter</a>--}}
{{--                        <a class="dropdown-item" href="#">XML to TSV converter</a>--}}
{{--                        <a class="dropdown-item" href="base64-decode">Base64 Decode</a>--}}
{{--                        <a class="dropdown-item" href="base64-encode">Base64 Encode</a>--}}
{{--                        <a class="dropdown-item" href="#">Binary converter</a>--}}
{{--                        <a class="dropdown-item" href="binary-to-decimal">Binary to decimal converter</a>--}}
{{--                        <a class="dropdown-item" href="binary-to-hexadecimal">Binary to HEX converter</a>--}}
{{--                        <a class="dropdown-item" href="binary-to-octal">Binary to Octal converter</a>--}}
{{--                        <a class="dropdown-item" href="binary-to-string">Binary to string converter</a>--}}
{{--                        <a class="dropdown-item" href="#">Unit converter</a>--}}
{{--                        <a class="dropdown-item" href="decimal-to-binary">Decimal to Binary converter</a>--}}
{{--                        <a class="dropdown-item" href="#">Decimal to HEX converter</a>--}}
{{--                        <a class="dropdown-item" href="decimal-to-octal">Decimal to Octal converter</a>--}}
{{--                        <a class="dropdown-item" href="#">online Diff tool</a>--}}
{{--                        <a class="dropdown-item" href="#">Email validator</a>--}}
{{--                        <a class="dropdown-item" href="#">Fav Icon & app Icon</a>--}}
{{--                        <a class="dropdown-item" href="#">Convert Files</a>--}}
{{--                        <a class="dropdown-item" href="#">GO formatter</a>--}}
{{--                        <a class="dropdown-item" href="hexadecimal-to-binary">HEX to Binary</a>--}}
{{--                        <a class="dropdown-item" href="hexadecimal-to-decimal">HEX to Decimal</a>--}}
{{--                        <a class="dropdown-item" href="hexadecimal-to-octal">HEX to Octal</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <li class="nav-item mx-1"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="{{route('css-beautifier')}}">CSS Beautifier</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="{{route('js-beautifier')}}">JS Beautifier</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="{{route('html-beautifier')}}">HTML Beautifier</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="/blog">Blog</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="/privacy">Our Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="app">
    @yield('content')
    <!-- FOOTER-->
</div>
<footer class="bs-footer" >
    <div class="container-fluid text-center">
        <p>©  <?php echo date("Y"); ?> <a href="https://www.ibextools.com" target="_blank">Ibex Tools</a> | <a href="/about">About</a> | <a href="/blog" target="_blank">Blog</a> | <a href="/privacy" target="_blank">Privacy</a></p>
    </div>

</footer>


<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
