@extends('layouts.app')

@section('content')
    <h1>I tuoi ordini</h1>

    @foreach ($dishes->reverse() as $dish)
        @if (Auth::check() && Auth::id() === $dish->user_id)
            @foreach ($dish->orders as $order)
                <!-- Qui puoi mostrare le informazioni degli ordini -->
                <p>Ordine ID: {{ $order->id }}</p>
                <p>Data: {{ $order->created_at }}</p>
                <!-- Altre informazioni degli ordini -->
            @endforeach
        @endif
    @endforeach
@endsection
