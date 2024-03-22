@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-2">I tuoi ordini</h1>

    @foreach ($orders as $order)
        @if (Auth::check() && Auth::id() === $order->restaurant_id)
            <div class="orders card">
                <div></div>
                <div class="d-flex justify-content-between">
                    <p>Codice ordine: <b>#{{ $order->id }}</b></p>
                    <p>{{ $order->created_at }}</p>

                </div>
                <h4>Piatti</h4>
                @foreach ($order->dishes as $dish)
                    <ul style="list-style-type: none">
                        <li class="d-flex justify-content-between">
                            <div>- {{ $dish->pivot->quantity }}X {{ $dish->name }}</div>
                            <div>{{ $dish->price }}</div>
                        </li>
                    </ul>
                @endforeach
                <br>
                <div class="text-end"><b>tot:</b>{{ $order->price }}&euro;</div>
            </div>
        @endif
    @endforeach

    {{-- <div class="orders">
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
    </div> --}}

    <style>
        .orders {
            border: 1px solid black;
            width: 70%;
            margin: 20px auto;
            padding: 2rem
        }
    </style>
@endsection
