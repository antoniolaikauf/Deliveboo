@extends('layouts.app')
@section('content')
<form action="{{ route('dish.store') }}" method="POST">

    @csrf
    @method('POST')

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
        <input type="text" name="name" id="name">
    </div>

    <div>
        <label for="description">Descrizione delp piatto</label>
        <input type="text" name="description" id="description">
    </div>

    <div>
        <label for="price">Prezzo del piatto</label>
        <input type="number" name="price" id="price">
    </div>

    <!-- <div>
        <label for="available">Disponibilità</label>
        <input type="text" name="available" id="available" placeholder="Inserisci 1 per SI e 0 per NO">
    </div> -->
    <div>
        <select name="available" id="available">
            <option value="1">disponibile</option>
            <option value="0">non disponibile</option>
        </select>
    </div>

    <input type="submit" value="CREA">

</form>
@endsection