@extends('layouts.app')
@section('content')

    <h2 class="text-center mt-3">Modifica il tuo piatto</h2>

    <form action="{{ route('dish.update', $dish->id) }}" method="POST">

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
            <input type="text" class="form-control" name="name" id="name" value="{{ $dish->name }}">
        </div>

        <div class="d-flex mb-2 align-items-start">
            <label for="description">Descrizione delp piatto</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $dish->description }}</textarea>
        </div>

        <div class="d-flex mb-2 align-items-center">
            <label for="price">Prezzo del piatto</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ $dish->price }}">
        </div>

        <!-- <div class="d-flex mb-2 align-items-center">
                                                                                                                <label for="available">Disponibilità</label>
                                                                                                                <input type="text" name="available" id="available" placeholder="Inserisci 1 per SI e 0 per NO"
                                                                                                                    value="{{ $dish->available }}">
                                                                                                            </div> -->
        <div class="d-flex mb-3 align-items-center">
            <label for="available">disponibile</label>
            <select name="available" id="available" class="form-control">
                <option value="1" @if ($dish->available == 1) selected @endif>disponibile</option>
                <option value="0" @if ($dish->available == 0) selected @endif>non disponibile</option>
            </select>
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
@endsection
