@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row m-5 prova">
        <div class="col-12">
            @auth
            <div class="text-center">
                <div>
                    ecco tutti i tuoi piatti
                    {{ Auth::user()->name }}
                </div>
                <a href="{{route('dish.create')}}" class="btn btn-primary my-3">Create</a>
            </div>
            @endauth
        </div>
        <div class="col-12 d-flex flex-wrap">
            @foreach ($dishes as $dish)
            
            @if (Auth::check() && Auth::id() === $dish->user_id)
            <div class="col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <div>{{$dish->price}}</div>
                        <div>
                            <div>
                                @if($dish->available)
                                <div>
                                    disponibile
                                </div>
                                @else
                                <div>
                                    non disponibile
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
    </style>
    @endsection