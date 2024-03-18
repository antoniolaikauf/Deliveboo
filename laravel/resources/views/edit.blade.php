@extends('layouts.app')
@section('content')

    <h2 class="text-center mt-3">Modifica il tuo piatto</h2>

    <form action="{{ route('dish.update', $dish->id) }}" method="POST"  enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex mb-2 align-items-center">
            <label for="name">Nome del piatto</label>
            <input type="text" class="form-control" name="name" required id="name" value="{{ $dish->name }}">
        </div>

        <div class="d-flex mb-2 align-items-start">
            <label for="description">Descrizione delp piatto</label>
            <textarea name="description" class="form-control" required id="description" cols="30" rows="10">{{ $dish->description }}</textarea>
        </div>

        <div class="d-flex mb-2 align-items-center">
            <label for="price">Prezzo del piatto</label>
            <input type="number" class="form-control" require id="price" value="{{ $dish->price }}" 
        name="price" min="0" 
        max="1000" step="0.01">
        {{-- prova fix price in float --}}

        
            {{-- <input type="number" class="form-control" name="price" required id="price" value="{{ $dish->price }}"> --}}
        </div>

        <div class="d-flex mb-3 align-items-center">
            <label for="available">disponibile</label>
            <select name="available" id="available" class="form-control">
                <option value="1" @if ($dish->available == 1) selected @endif>disponibile</option>
                <option value="0" @if ($dish->available == 0) selected @endif>non disponibile</option>
            </select>
        </div>

        <div class="d-flex mb-3 align-items-center">
            <label for="img">Modifica l'immagine:</label>
            <input type="file" name="img" id="img" accept="image/" class="form-control" >
        </div>

        <div class="d-flex mb-2 justify-content-center">

            <input type="submit" value="MODIFICA">

        </div>



    </form>
    <style>
        form {
            width: 40%;
            margin: 50px auto;
        }

        label {
            width: 250px;
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
            if (nameValue.length < 3) {
                nameInput.setCustomValidity("Il nome deve essere di almeno 3 caratteri");
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
