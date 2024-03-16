@extends('layouts.app')
@section('content')
<div class="container-fluid bg-sfondo p-5">
    <div class="row justify-content-center py-5">
        <div class="col-6 p-4 form-create bg-secondary text-white">
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


                <div class="input-group gap-3">
                    <label for="name">Nome del piatto</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome piatto" name="name" required id="name" aria-label="Username" aria-describedby="basic-addon1">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- DESCRIZIONE --}}
                <div class="input-group my-3 gap-3">
                    <label for="description">Inserire descrizione del piatto</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" name="description" required id="description"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group gap-3">
                    <label for="price">Inserire prezzo del piatto creato </label>
                    <input type="number" name="price" required id="price" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group my-3 gap-3">
                    <label for="available">Seleziona la disponibilità del piatto</label>
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

                <div class="input-group my-3 gap-3">
                    <label for="img">Inserisci un immagine:</label>
                    <input type="file" name="img" id="img" class="form-control" accept="image/">
                </div>

                <div class="text-center ">
                    <input type="submit" value="CREA PIATTO" class="btn-boo buttons">
                </div>


            </form>
        </div>
    </div>
</div>

<style>
    .form-create {
        border: 1px solid #00CCBC;
        border-radius: 15px;
    }

    .bg-sfondo {
        height: 700px;
        background-image: url(https://images.pexels.com/photos/784632/pexels-photo-784632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
        background-size: cover;
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
