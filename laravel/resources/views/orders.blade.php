@extends('layouts.app')

@section('content')
<h1 class="text-center">I tuoi ordini</h1>

@foreach($orders as $order)
@if (Auth::check() && Auth::id() === $order->restaurant_id)
<div>

    <h2>
        {{$order->address}}
    </h2>
    @foreach($order->dishes as $dish )
    <div>
        {{$dish->name}}
    </div>
    @endforeach
    <br>
</div>
@endif
@endforeach

<div class="orders">
    <div class="d-flex justify-content-between">
        <p>Codice ordine: <b>#1</b></p>
        <p>20/03/2024</p>

    </div>

    <ul style="list-style-type: none">
        <h4>Piatti</h4>
        <li class="d-flex justify-content-between">
            <div>- 2X Spaghetti</div>
            <div>20€</div>
        </li>
        <li class="d-flex justify-content-between">
            <div>- 3X Riso</div>
            <div>10€</div>
        </li>
    </ul>
    <div class="text-end"><b>tot:</b>30€</div>
</div>
<div class="orders">
    <div class="d-flex justify-content-between">
        <p>Codice ordine:<b> #34</b></p>
        <p>20/03/2024</p>

    </div>

    <ul style="list-style-type: none">
        <h4>Piatti</h4>
        <li class="d-flex justify-content-between">
            <div>- 2X Spaghetti</div>
            <div>20€</div>
        </li>
        <li class="d-flex justify-content-between">
            <div>- 3X Riso</div>
            <div>10€</div>
        </li>
    </ul>
    <div class="text-end"><b>tot:</b> 30€</div>
</div>
<div class="orders">
    <div class="d-flex justify-content-between">
        <p>Codice ordine: <b>#398</b></p>
        <p>20/03/2024</p>

    </div>

    <ul style="list-style-type: none">
        <h4>Piatti</h4>
        <li class="d-flex justify-content-between">
            <div>- 2X Spaghetti</div>
            <div>20€</div>
        </li>
        <li class="d-flex justify-content-between">
            <div>- 3X Riso</div>
            <div>10€</div>
        </li>
    </ul>
    <div class="text-end"><b>tot:</b> 30€</div>
</div>

<style>
    .orders {
        border: 1px solid black;
        width: 800px;
        margin: 20px auto;
        padding: 2rem
    }
</style>
@endsection