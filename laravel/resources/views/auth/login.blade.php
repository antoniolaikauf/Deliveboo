{{-- @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid gx-0 bg-login">
    <h4 class="wordCarousel text-center py-5">
        <span>Accedi,  e scopri come raggiungere migliaia di persone tramite il tuo ristorante </span>
        <div>
            <!-- Use classes 2,3,4, or 5 to match the number of words -->
            <ul class="flip6">
                <li>Asiatico</li>
                <li>Pizzeria</li>
                <li>Vegano</li>
                <li>Vegetariano</li>
                <li>Fushion</li>
                <li>Fast Food</li>
            </ul>
        </div>
    </h4>
    <div class="p-5 title">
        <h3 class="text-white"></h3>
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-login form-bg text-white form-create">
                    <div class="card-header">{{ __('Accedi') }}</div>

                    <div class="card-body">
                        <form id="loginForm" method="POST" action="{{ route('login') }}" >
                            @csrf

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ricordami') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" id="loginButton" class="btn-boo buttons" disabled>
                                        {{ __('Accedi') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Hai dimenticato la tua password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
/* STILE LOGIN */
.bg-login {
    background-image: url(imgs/risto-login.jpg);
    background-size: cover;
    height: 100%;
}

/* STILE FORM */

.form-bg {
    background-color: #292929;
    padding: 40px;
    border-radius: 17px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
    transform: translateY(10px);
}

.form-control {
    border: none;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) inset;
    background-color: transparent;
    color: #ffffff;
}


.card-login {
    margin-bottom: 200px;
}


/* ANIMAZIONE TITOLO */
.wordCarousel {
    font-size: 36px;
    font-weight: 100;
    color: #eee;
    background-color:black;
    opacity: 0.5;
}

.wordCarousel div {
    overflow: hidden;
    position: relative;
    height: 65px;
}

.wordCarousel li {
    color: #eee;
    font-weight: 700;
    height: 45px;
    margin-bottom: 45px;
    display: block;
}

.flip2 {
    animation: flip2 6s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}

.flip3 {
    animation: flip3 8s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}

.flip4 {
    animation: flip4 10s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}

.flip5 {
    animation: flip5 10s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}

.flip6 {
    animation: flip5 12s cubic-bezier(0.23, 1, 0.32, 1.2) infinite;
}

@keyframes flip2 {
    0% { margin-top: -180px; }
    5% { margin-top: -90px;  }
    50% { margin-top: -90px; }
    55% { margin-top: 0px; }
    99.99% { margin-top: 0px; }
    100% { margin-top: -180px; }
}

@keyframes flip3 {
    0% { margin-top: -270px; }
    5% { margin-top: -180px; }
    33% { margin-top: -180px; }
    38% { margin-top: -90px; }
    66% { margin-top: -90px; }
    71% { margin-top: 0px; }
    99.99% { margin-top: 0px; }
    100% { margin-top: -270px; }
}

@keyframes flip4 {
    0% { margin-top: -360px; }
    5% { margin-top: -270px; }
    25% { margin-top: -270px; }
    30% { margin-top: -180px; }
    50% { margin-top: -180px; }
    55% { margin-top: -90px; }
    75% { margin-top: -90px; }
    80% { margin-top: 0px; }
    99.99% { margin-top: 0px; }
    100% { margin-top: -360px; }
}

@keyframes flip5 {
    0% { margin-top: -450px; }
    5% { margin-top: -360px; }
    20% { margin-top: -360px; }
    25% { margin-top: -270px; }
    40% { margin-top: -270px; }
    45% { margin-top: -180px; }
    60% { margin-top: -180px; }
    65% { margin-top: -90px; }
    80% { margin-top: -90px; }
    85% { margin-top: 0px; }
    99.99% { margin-top: 0px; }
    100% { margin-top: -450px; }
}

@keyframes flip6 {
    0% { margin-top: -450px; }
    5% { margin-top: -360px; }
    20% { margin-top: -360px; }
    25% { margin-top: -270px; }
    40% { margin-top: -270px; }
    45% { margin-top: -180px; }
    60% { margin-top: -180px; }
    65% { margin-top: -90px; }
    80% { margin-top: -90px; }
    85% { margin-top: 0px; }
    99.99% { margin-top: 0px; }
    100% { margin-top: -450px; }
}


    </style>
    <script>
        // Funzione per controllare lo stato dei campi di input e abilitare/disabilitare il pulsante di login
        function checkInputs() {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const loginButton = document.getElementById('loginButton');

            if (emailInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
                loginButton.disabled = false;
            } else {
                loginButton.disabled = true;
            }
        }

        // Aggiungi event listener per controllare l'input ogni volta che l'utente digita qualcosa
        document.getElementById('email').addEventListener('input', checkInputs);
        document.getElementById('password').addEventListener('input', checkInputs);
    </script>
@endsection
