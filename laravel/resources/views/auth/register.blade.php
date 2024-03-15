@extends('layouts.app')

@section('content')
    <div class="container mt-4" id="registrationFormContainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="registrationForm" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="nome_ristorante"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="nome_ristorante" type="text" class="form-control" name="nome_ristorante">

                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city">

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="piva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="piva" type="text" class="form-control" name="piva" id="piva">

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="img"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                                <div class="col-md-6">
                                    <input id="img" type="file" class="form-control" name="img">
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tipo di cucina') }}</label>
                                <div>
                                    @foreach ($types as $type)
                                        <div>
                                            <input type="checkbox"class="form-check-input" name="types[]"
                                                value="{{ $type->id }}" id="type{{ $type->id }}">
                                            <label for="type{{ $type->id }}">{{ $type->name }}</label>
                                            <br>
                                        </div>
                                    @endforeach

                                </div>



                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="registrationButton" type="submit" class="btn btn-primary" disabled>
                                        {{ __('Registrati') }}

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Otteniamo i riferimenti agli input delle password e al pulsante di registrazione
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password-confirm');
        let registrationButton = document.getElementById('registrationButton');

        // Aggiungiamo un listener agli input delle password per verificare se sono uguali
        passwordField.addEventListener('input', checkPasswords);
        confirmPasswordField.addEventListener('input', checkPasswords);

        function checkPasswords() {
            // Otteniamo i valori dei campi password
            const password = passwordField.value;
            const confirmPassword = confirmPasswordField.value;

            // Verifichiamo se una o entrambe le password sono vuote
            const passwordsEmpty = password === '' || confirmPassword === '';

            // Disabilitiamo il pulsante di registrazione se le password non corrispondono o sono vuote
            registrationButton.disabled = passwordsEmpty || password !== confirmPassword;
        }
    </script>
@endsection
