<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>

<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>



    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

<style>

    canvas {
        border:1px solid #555555;
        width: 500px;
        height:200px;
    }


    body {
        font-family: "Hiragino Sans", "Hiragino Kaku Gothic ProN", Meiryo, "sans-serif";
    }

    .confirmarea {
        margin: 30px 5px;
        border: 3px solid #cccccc;
        border-radius: 20px;
        padding: 20px;
    }

    .templatearea {
        text-align: center;
        margin-bottom: 30px;
    }

    .maintable {
        margin: 0px auto 50px auto ;
        background-color: #eeeeee;
    }

    .maintable td {
        padding: 8px 2px 8px 8px;
    }

    .maintable tr {
        border-bottom: 1px dashed #cccccc;
    }

    .theadarea th {
        font-size: 80%;
        text-align: center;
        color: #ffffff;
        background-color: #036EB8;
        white-space: nowrap;
        padding: 5px 5px;
    }
    .textarea{
        text-align: right;
    }

    .genre-check {
        white-space: nowrap;
        text-align: center;
    }

    .signarea {
        max-width: 690px;
        margin: 0px auto;
    }


    dt {
        float: left;
        clear: left;
        margin-right: 10px;
        width: 180px;
        text-align: right;
        color: #888888;
    }

    dd {
        float: left;
        max-width: 480px;
    }

    .clr {
        clear: both;
    }

    .btnarea {
        text-align: center;
    }

    .wrapper {
        position: relative;
        width: 500px;
        height: 200px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width:500px;
        height:200px;
    }

    #signaturePad canvas{
        width: 100% !important;
        height: auto;
    }

    #signaturePad1 canvas{
        width: 100% !important;
        height: auto;
    }

    @media screen and (max-width: 1000px) {

        dt {
            text-align: left;
            width: 100%;
        }

        dd {
            width: 100%;
            margin-top: 0px;
            margin-bottom: 30px;
        }

        canvas {
            width: 100%;
        }
    }
    </style>


    </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/transaction') }}">
                   WITS クラウド チェックシート
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>


        </main>

    </div>
</body>
</html>
