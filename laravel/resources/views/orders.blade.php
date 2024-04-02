@extends('layouts.app')

@section('content')
    <div class="container-fluid gx-0 p-1 bg-login">
        <h1 class="text-center text-white">I tuoi ordini</h1>

        @foreach ($orders->sortByDesc('created_at') as $order)
            @if (Auth::check() && Auth::id() === $order->restaurant_id)
                <div class="orders card form-bg text-white">
                    <div class="d-flex justify-content-between">
                        <p>Codice ordine: <b>#{{ $order->id }}</b></p>
                        <p>{{ $order->created_at }}</p>

                    </div>
                    <h4>Piatti</h4>
                    @foreach ($order->dishes as $dish)
                        <ul style="list-style-type: none">
                            <li class="d-flex justify-content-between">
                                <div>- {{ $dish->pivot->quantity }}X {{ $dish->name }}</div>
                                <div>{{ $dish->price }}&euro;</div>
                            </li>
                        </ul>
                    @endforeach
                    <hr>
                    <br>
                    <div class="mb-2">Nome: {{ $order->name_customer }}</div>
                    <div class="mb-2">Email: {{ $order->email_customer }}</div>
                    <div class="mb-2">Indirizzo di consegna: {{ $order->address }}</div>
                    <div class="text-end"><b>Totale: </b>{{ $order->price }}&euro;</div>
                </div>
            @endif
        @endforeach



    </div>
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

        .form-bg {
            background-color: #292929;
            padding: 40px;
            border-radius: 17px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
            transform: translateY(10px);
        }

        .bg-login {
            background-image: url(imgs/risto-login.jpg);
            background-size: cover;
            height: 100%;
        }
    </style>
@endsection
