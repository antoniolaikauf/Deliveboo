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
    <div class="container my-4" style="width: 50%; margin: 0 auto;">
        <video autoplay loop muted playsinline class="background-clip">
            <source src="/imgs/pexels-rodnae-productions-7362582 (1080p).mp4" type="video/mp4" />
        </video>
        <div class="card text-center py-4">
            @foreach ($restaurants as $restaurant)
                @if (Auth::check() && Auth::id() === $restaurant->user_id)
                    <h1 class="mb-4">{{ $restaurant->name }}</h1>
                    <div class="img">
                        <img src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}">
                    </div>
                @endif
            @endforeach
            <div class="mt-5">
                <a href="http://localhost:8000" class="my-4 link-dashboard">Vai al tuo menù</a>
            </div>
        </div>
    </div>
    <style>
        .img img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .link-dashboard {
            padding: 7px;
            border: 1px solid black;
            border-radius: 5px;
            width: 200px;
        }

        .link-dashboard:hover {
            border: 1px solid #22cdd0;
        }

        .background-clip {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            object-fit: cover;
            z-index: -1;
            height: 100vh
        }
    </style>
@endsection
