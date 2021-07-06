<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 6 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>

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

.btnarea {
    text-align: center;
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
}


</style>

<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
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
                            <li><a class="nav-link text-white " href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
                            <li><a class="nav-link text-white" href="{{ route('register') }}">{{ __('登録') }}</a></li>
                        @else
                            <li><a class="nav-link text-white" href="{{ route('m_branch.index') }}">Manage Branches</a></li>
                            <li><a class="nav-link text-white" href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link text-white" href="{{ route('roles.index') }}">Manage Role</a></li>
                            <li><a class="nav-link text-white" href="{{ route('m_templates.index') }}">Manage Template </a></li>
                            <li><a class="nav-link text-white" href="{{ route('m_template_details.index') }}">Manage Template Detail</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
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
