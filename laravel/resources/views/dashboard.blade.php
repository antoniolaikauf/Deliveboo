@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container my-4" style="width: 50%; margin= 0 auto;">
        <div class="card text-center py-4">
            @foreach ($restaurants as $restaurant)
                @if (Auth::check() && Auth::id() === $restaurant->user_id)
                    <h1 class="mb-4">{{ $restaurant->name }}</h1>
                    <div class="img">
                        <img src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}">
                    </div>
                @endif
            @endforeach
            <div>
                <a href="http://localhost:8000" class="my-4">Vai al tuo menù</a>
            </div>
        </div>
    </div>
    <style>
        .img img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        a {
            padding: 7px;
            border: 1px solid black;
            border-radius: 5px;
            width: 200px;
        }

        a:hover {
            border: 1px solid #22cdd0;
        }
    </style>
@endsection
