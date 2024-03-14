@extends('layouts.app')
@section('content')
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

        <div>
            <label for="name">Nome del piatto</label>
            <input type="text" name="name" id="name" value="{{ $dish->name }}">
        </div>

        <div>
            <label for="description">Descrizione delp piatto</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $dish->description }}</textarea>
        </div>

        <div>
            <label for="price">Prezzo del piatto</label>
            <input type="number" name="price" id="price" value="{{ $dish->price }}">
        </div>

        <div>
            <label for="available">Disponibilità</label>
            <input type="text" name="available" id="available" placeholder="Inserisci 1 per SI e 0 per NO"
                value="{{ $dish->available }}">
        </div>

        <input type="submit" value="MODIFICA">

    </form>
@endsection
