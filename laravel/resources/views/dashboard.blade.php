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
<div class="container my-4" style=" margin: 0 auto;">
    <h1 class="text-center mb-5">Il tuo ristorante {{ Auth::user()->name }}</h1>
    <video autoplay loop muted playsinline class="background-clip">
        <source src="/imgs/pexels-rodnae-productions-7362582 (1080p).mp4" type="video/mp4" />
    </video>
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="card text-center py-4" style="width: 500px">
                @foreach ($restaurants as $restaurant)
                @if (Auth::check() && Auth::id() === $restaurant->user_id)
                <h1 class="mb-4">{{ $restaurant->name }}</h1>
                <div class="img">
                    <!-- stare attenti ai seeder user il numero deve essere in base alla quantita di user gia nel database  -->
                    @if($restaurant->user_id>30)
                    <img src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}">
                    @else
                    <img src="{{ asset($restaurant->img) }}" alt="{{ $restaurant->name }}">
                    @endif
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-4">
            <div>
                <a href="http://localhost:8000" class="my-4 link-dashboard">Entra nel tuo menù</a>
            </div>
        </div>
    </div>
</div>

<style>
    .link-dashboard {
        padding: 16px 45px;
        border: 5px solid black;
        border-radius: 32px 0px;
        background-color: white;
        transition: border 0.3s ease, background-color 0.3s ease;
        color: black;
        font-size: 20px;
        width: 200px;
    }

    .link-dashboard:hover {
        border: 1px solid #22cdd0;
        background-color: #22cdd0;
    }

    .background-clip {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        object-fit: cover;
        z-index: -1;
        height: 100vh;
        opacity: 0.5;
    }

    .img img {
        width: 150px;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection
