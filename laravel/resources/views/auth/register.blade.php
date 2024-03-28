{{-- @extends('layouts.app')

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Nome') }}</label>

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* E-Mail') }}</label>

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Password') }}</label>

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="nome_ristorante"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Nome Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="nome_ristorante" type="text" class="form-control" name="nome_ristorante">

                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city">

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="piva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Partita IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="piva" type="text" class="form-control" name="piva" id="piva">

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="img"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Immagine') }}</label>

                                <div class="col-md-6">
                                    <input id="img" type="file" class="form-control" name="img">
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Tipo di cucina') }}</label>
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
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container-fluid gx-0 bg-login" id="registrationFormContainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-login form-bg text-white form-create my-5">
                    <div class="card-header">{{ __('Registrati') }}</div>

                    <div class="card-body">
                        <form id="registrationForm" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Nome') }}</label>
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* E-Mail') }}</label>
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Password') }}</label>
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Conferma Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="nome_ristorante"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Nome Ristorante') }}</label>
                                <div class="col-md-6">
                                    <input id="nome_ristorante" type="text"
                                        class="form-control @error('nome_ristorante') is-invalid @enderror"
                                        name="nome_ristorante" value="{{ old('nome_ristorante') }}" required
                                        autocomplete="nome_ristorante">
                                    @error('nome_ristorante')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Città') }}</label>
                                <div class="col-md-6">
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city') }}" required autocomplete="city">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="piva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Partita IVA') }}</label>
                                <div class="col-md-6">
                                    <input id="piva" type="text"
                                        class="form-control @error('piva') is-invalid @enderror" name="piva"
                                        value="{{ old('piva') }}" required autocomplete="piva">
                                    @error('piva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="img"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Immagine') }}</label>
                                <div class="col-md-6">
                                    <input id="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" name="img" required>
                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('* Tipo di cucina') }}</label>
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
        // VALIDAZIONE LUNGHEZZA PASSWORD

        // Otteniamo i riferimenti agli input delle password e al pulsante di registrazione
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password-confirm');
        let registrationButton = document.getElementById('registrationButton');

        // Aggiungiamo un listener agli input delle password per verificare se sono uguali
        passwordField.addEventListener('input', checkPasswords);
        confirmPasswordField.addEventListener('input', checkPasswords);

        function checkPasswords() {
            // Otteniamo i valori dei campi password
            let password = passwordField.value;
            let confirmPassword = confirmPasswordField.value;

            // Verifichiamo se una o entrambe le password sono vuote
            const passwordsEmpty = password === '' || confirmPassword === '';

            // Disabilitiamo il pulsante di registrazione se le lunghezze delle password non sono uguali o sono vuote
            registrationButton.disabled = passwordsEmpty || password.length !== confirmPassword.length;
        }


        // VALIDATION NAME
        document.addEventListener("DOMContentLoaded", function() {
            let validationName = document.getElementById("name");

            // Aggiungi un ascoltatore per l'evento input
            validationName.addEventListener("input", function() {
                // Ottieni il valore del campo
                let nameValue = validationName.value.trim();

                // Verifica la lunghezza minima
                if (nameValue.length < 3) {
                    validationName.setCustomValidity("La lunghezza deve essere di almeno 3 caratteri");
                }
                // Verifica la lunghezza massima
                else if (nameValue.length > 50) {
                    validationName.setCustomValidity(
                        "La lunghezza non può essere superiore a 50 caratteri");
                }
                // Se la lunghezza è valida, rimuovi il messaggio di validità personalizzato
                else {
                    validationName.setCustomValidity("");
                }
            });
        });

        // VALIDATION EMAIL
        document.addEventListener("DOMContentLoaded", function() {
            let validationEmail = document.getElementById("email");

            // Aggiungi un ascoltatore per l'evento input
            validationEmail.addEventListener("input", function() {
                // Ottieni il valore del campo email
                let emailValue = validationEmail.value.trim();

                // Espressione regolare per la validazione dell'email
                let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                // Verifica se l'email è valida utilizzando l'espressione regolare
                if (!emailPattern.test(emailValue)) {
                    validationEmail.setCustomValidity("Inserisci un indirizzo email valido");
                } else {
                    validationEmail.setCustomValidity("");
                }
            });
        });

        // VALIDATION PASSWORD
        document.addEventListener("DOMContentLoaded", function() {
            let passwordField = document.getElementById("password");
            let confirmPasswordField = document.getElementById("password-confirm");

            // Aggiungi un ascoltatore per l'evento input sulla password
            passwordField.addEventListener("input", validatePassword);
            confirmPasswordField.addEventListener("input", validatePassword);

            function validatePassword() {
                let password = passwordField.value.trim();
                let confirmPassword = confirmPasswordField.value.trim();

                // Verifica se le password corrispondono
                if (password !== confirmPassword) {
                    confirmPasswordField.setCustomValidity("Le password non corrispondono");
                } else {
                    confirmPasswordField.setCustomValidity("");
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            let nomeRistoranteField = document.getElementById("nome_ristorante");

            // Aggiungi un ascoltatore per l'evento input
            nomeRistoranteField.addEventListener("input", function() {
                // Ottieni il valore del campo "Nome Ristorante"
                let nomeRistoranteValue = nomeRistoranteField.value.trim();

                // Verifica la lunghezza minima
                if (nomeRistoranteValue.length < 3) {
                    nomeRistoranteField.setCustomValidity(
                        "La lunghezza del nome del ristorante deve essere di almeno 3 caratteri");
                }
                // Verifica la lunghezza massima
                else if (nomeRistoranteValue.length > 50) {
                    nomeRistoranteField.setCustomValidity(
                        "La lunghezza del nome del ristorante non può essere superiore a 50 caratteri");
                }
                // Se la lunghezza è valida, rimuovi il messaggio di validità personalizzato
                else {
                    nomeRistoranteField.setCustomValidity("");
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            let cityField = document.getElementById("city");

            // Aggiungi un ascoltatore per l'evento input
            cityField.addEventListener("input", function() {
                // Ottieni il valore del campo "Città"
                let cityValue = cityField.value.trim();

                // Verifica la lunghezza minima
                if (cityValue.length < 2) {
                    cityField.setCustomValidity("Il nome della città deve contenere almeno 2 caratteri");
                }
                // Verifica la lunghezza massima
                else if (cityValue.length > 50) {
                    cityField.setCustomValidity("Il nome della città non può superare i 50 caratteri");
                }
                // Se la lunghezza è valida, rimuovi il messaggio di validità personalizzato
                else {
                    cityField.setCustomValidity("");
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            let pivaField = document.getElementById("piva");

            // Aggiungi un ascoltatore per l'evento input
            pivaField.addEventListener("input", function() {
                // Ottieni il valore del campo "Partita IVA"
                let pivaValue = pivaField.value.trim();

                // Verifica la lunghezza
                if (pivaValue.length !== 11) {
                    pivaField.setCustomValidity("La Partita IVA deve contenere esattamente 11 caratteri");
                }
                // Verifica se la Partita IVA contiene solo cifre
                else if (!/^\d+$/.test(pivaValue)) {
                    pivaField.setCustomValidity("La Partita IVA deve contenere solo cifre");
                }
                // Se la lunghezza e il formato sono validi, rimuovi il messaggio di validità personalizzato
                else {
                    pivaField.setCustomValidity("");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let imgField = document.getElementById("img");

            // Aggiungi un ascoltatore per l'evento change
            imgField.addEventListener("change", function() {
                // Ottieni il file selezionato
                let file = imgField.files[0];

                // Verifica se è stato selezionato un file
                if (!file) {
                    imgField.setCustomValidity("Seleziona un file immagine");
                    return;
                }

                // Verifica il tipo di file
                if (!file.type.startsWith('image/')) {
                    imgField.setCustomValidity("Il file deve essere un'immagine");
                    return;
                }


                // Se tutto è valido, rimuovi il messaggio di validità personalizzato
                imgField.setCustomValidity("");
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            let typeCheckboxes = document.querySelectorAll('input[name="types[]"]');
            let form = document.querySelector('form'); // Seleziona il modulo genitore

            // Aggiungi un ascoltatore per l'evento submit sul modulo genitore
            form.addEventListener("submit", function(event) {
                // Verifica se almeno uno dei checkbox è selezionato
                let atLeastOneSelected = Array.from(typeCheckboxes).some(function(checkbox) {
                    return checkbox.checked;
                });

                // Se almeno un checkbox è selezionato, restituisci true per inviare il modulo
                // Altrimenti, imposta un messaggio di errore e restituisci false per impedire l'invio del modulo
                if (atLeastOneSelected) {
                    form.querySelector('.invalid-feedback').textContent =
                        ""; // Rimuovi eventuali messaggi di errore precedenti
                    return true;
                } else {
                    form.querySelector('.invalid-feedback').textContent =
                        "Seleziona almeno un tipo di cucina";
                    event.preventDefault(); // Impedisce l'invio del modulo
                    return false;
                }
            });
        });
    </script>
    <style>
        .form-bg {
            background-color: #292929;
            padding: 40px;
            border-radius: 17px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
            transform: translateY(10px);
            max-width: 1000px;
            margin: 0 auto;
        }

        .bg-login {
            background-image: url(imgs/risto-login.jpg);
            background-size: cover;
            height: 100%;
        }

        /* .row {
                        --bs-gutter-x: 0;
                    } */
    </style>
@endsection
