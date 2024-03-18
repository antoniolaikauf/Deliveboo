<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboo</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('../../imgs/DelivebooNoScrittaNoBG.svg') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light shadow-sm p-0">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center p-0" href="http://localhost:5173/">
                    <div class="logo_laravel">
                        <img src="{{ asset('imgs/DelivebooNoBG.svg') }}" alt="#" class="img-logo" style="width: 100px;">
                    </div>
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link buttons btn-boo mx-3 border-0" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> {{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link button btn-boo border-0" href="{{ route('register') }}"><i class="fa-solid fa-address-card"></i> {{ __('Registrati') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown px-3">
                            <a class="nav-link dropdown-toggle buttons btn-boo border-0 " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Pannello di controllo') }}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Il tuo profilo') }}</a>

                            </div>
                        </li>
                        <a class="buttons btn-boo me-3 border-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"> <i class="fa-solid fa-house color"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
        <footer>
            @include('footer')
        </footer>
    </div>


</body>

<style>

*{
    font-family: 'IBM Plex Sans', Sans-serif;
}

h1{
   font-family: 'PT Sans', sans-serif;
   font-weight: bold;
}
    .navbar{
        background: black;
    }
    /* Button styles */
    .buttons {
        border-radius: 7px;
    }

    .buttons:hover {
        border: 1px;
        -webkit-box-shadow: 0px 0px 6px 0px rgba(45, 255, 196, 1);
        -moz-box-shadow: 0px 0px 6px 0px rgba(45, 255, 196, 1);
        box-shadow: 0px 0px 6px 0px rgba(45, 255, 196, 1);
    }

    a {
        text-decoration: none;
        color: black;
    }

    /* Stile per il primo pulsante */
    .btn-boo {
        padding: 5px 15px;
        border-radius: 7px;
        border: none;
        background-color: white;
    }

    .btn-boo:hover {
        background-color: #f0f0f0;
        color: #333;
    }


    .collapse:not(.show) {
        display: flex;
    }

    i {
        color: #22cdd0;
    }

    .navbar>.container {
        flex-wrap: nowrap;
    }

    @media screen and (max-width: 769px) {
        .navbar-nav {
            flex-direction: row;
        }
    }

    /* // cambio della largezza della barra scorrimento */
    ::-webkit-scrollbar {
        width: 13px;
    }

    /* // cambio contenuto della barra di scorrimento */
    ::-webkit-scrollbar-thumb {
        border: 4px solid rgba(0, 0, 0, 0);
        border-radius: 50px;
        background-color: #00CCBC;
    }
</style>

{{-- SCRIPT JS --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>
