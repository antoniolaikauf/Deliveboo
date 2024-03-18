@extends('layouts.app')
@section('content')
<div class="container-fluid bg-sfondo p-5">
    <div class="row justify-content-center py-5">
        <div class="col-6 p-4 form-create  text-white">

            <div class="container form-bg">

                    <form action="{{ route('dish.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}


                    <div class="d-flex align-items-center flex-column gap-3">
                        <label class="label-style-create" for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome piatto" name="name" required id="name" aria-label="Username" aria-describedby="basic-addon1">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- DESCRIZIONE --}}
                    <div class="d-flex align-items-center flex-column my-3 gap-3">
                        <label class="label-style-create" for="description">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" placeholder="Inserisci la descrizione" name="description" required id="description"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center flex-column gap-3">
                            <label class="label-style-create" for="price">Prezzo in € </label>
                            <input type="number" name="price" required id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il prezzo">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center flex-column my-3 gap-3">
                            <label class="label-style-create" for="available">Disponibilità</label>
                            <select name="available" id="available" class="form-select @error('available') is-invalid @enderror" aria-label="Default select example">
                                <option value="" selected disabled hidden>Scegli disponibilità</option>
                                <option value="1">disponibile</option>
                                <option value="0">non disponibile</option>
                            </select>
                            @error('available')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center flex-column my-3 gap-3">
                            <label class="label-style-create" for="img">Inserisci un immagine:</label>
                            <input type="file" name="img" id="img" required class="form-control" accept="image/">
                        </div>

                        <div class="text-center ">
                            <input type="submit"  value="CREA PIATTO" class="btn-boo buttons">
                        </div>


                    </form>
                </div>
            </div>
        </div>
</div>

<style>
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

    .form-control::placeholder {
        color: #ffffff;
    }

    .form-select{
        border: none;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) inset;
        background-color: transparent;
        color: #ffffff;
    }

    .form-selectl::placeholder{
        color: #ffffff;
    }

    .form-create {
        border-radius: 15px;
    }

    /* END STILE FORM */

    .bg-sfondo {
        height: 700px;
        background-image: url(https://images.pexels.com/photos/784632/pexels-photo-784632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
        background-size: cover;
        height: 100vh;
    }

    .button-create {
        color: black;
        border: none;
        padding: 5px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }




</style>

<script>

    // VALIDATION DESCRIZIONE
    document.addEventListener("DOMContentLoaded", function() {
        let descriptionTextarea = document.getElementById("description");

        // Aggiungi un ascoltatore per l'evento input
        descriptionTextarea.addEventListener("input", function() {
            // Ottieni il valore del campo
            let descriptionValue = descriptionTextarea.value.trim();

            // Verifica la lunghezza minima
            if (descriptionValue.length < 10) {
                descriptionTextarea.setCustomValidity("La lunghezza deve essere di almeno 10 caratteri");
            }
            // Verifica la lunghezza massima
            else if (descriptionValue.length > 200) {
                descriptionTextarea.setCustomValidity("La lunghezza non può essere superiore a 200 caratteri");
            }
            // Se la lunghezza è valida, rimuovi il messaggio di validità personalizzato
            else {
                descriptionTextarea.setCustomValidity("");
            }
        });
    });

    // VALIDATION NOME
    document.addEventListener("DOMContentLoaded", function() {
        let nameInput = document.getElementById("name");

        // Aggiungi un ascoltatore per l'evento input
        nameInput.addEventListener("input", function() {
            // Ottieni il valore del campo
            let nameValue = nameInput.value.trim();

            // Verifica la lunghezza minima
            if (nameValue.length < 5) {
                nameInput.setCustomValidity("Il nome deve essere di almeno 5 caratteri");
            }
            // Verifica la lunghezza massima
            else if (nameValue.length > 50) {
                nameInput.setCustomValidity("Il nome non può essere più lungo di 50 caratteri");
            }
            // Se la lunghezza è valida, rimuovi il messaggio di validità personalizzato
            else {
                nameInput.setCustomValidity("");
            }
        });
    });

    // VALIDATION PREZZO
    document.addEventListener("DOMContentLoaded", function() {
        let priceInput = document.getElementById("price");

        // Aggiungi un ascoltatore per l'evento input
        priceInput.addEventListener("input", function() {
            // Ottieni il valore del campo
            let priceValue = priceInput.value.trim();

            // Verifica se il valore è valido
            if (isNaN(priceValue) || priceValue <= 0) {
                priceInput.setCustomValidity("Il prezzo deve essere un numero maggiore di zero");
            } else {
                priceInput.setCustomValidity("");
            }
        });
    });
</script>
@endsection
