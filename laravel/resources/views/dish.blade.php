@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row m-5 prova">
        <div class="col-12">
            @auth
            <div class="text-center">
                <h2>
                    tutti i suoi piatti che dispone sulla piattaforma
                    {{ Auth::user()->name }}
                </h2>
                <a href="{{route('dish.create')}}" class="btn btn-primary my-3">Create</a>
            </div>
            @endauth
        </div>
        <div class="col-12 d-flex flex-wrap">
            @foreach ($dishes as $dish)

            @if (Auth::check() && Auth::id() === $dish->user_id)
            <div class="col-6 p-4">
                <div class="card card-restaurant">
                    <div class="card-body text-center ">
                        <h5 class="card-title">Nome piatto <strong>{{ $dish->name }}</strong></h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <div class="my-2">presso piatto <strong>{{$dish->price}}&#128;</strong></div>
                        <div>
                            <div>
                                @if($dish->available)
                                <div>
                                    <span class="bg-success p-2 rounded ">

                                        piatto disponibile
                                    </span>
                                </div>
                                @else
                                <div>
                                    <span class="bg-danger p-2 rounded">
                                        piatto non disponibile
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                @auth
                                <a href="{{ route('dish.edit', $dish->id)}}" class="btn btn-primary">EDIT</a>
                                @endauth
                            </div>

                            <div>
                                @auth
                                <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="DELETE" class="btn btn-danger">
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <style>
        .card-restaurant {
            border: #00CCBC 1px solid;
            transition: transform 0.5s ease;
        }

        .card-restaurant:hover {
            transform: scale(1.05);
        }
    </style>
    @endsection