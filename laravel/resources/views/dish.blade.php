@extends('layouts.app')
@section('content')
<h1>Dishes</h1>

@auth
<a href="{{route('dish.create')}}"><button>Create</button></a>
@endauth
<ul>
    @foreach ($dishes as $dish)
    @if (Auth::check() && Auth::id() === $dish->user_id)
    <li>

        <div>{{ $dish->name }}</div>
        <div>{{ $dish->description }}</div>
        <div>{{ $dish->price }}</div>
        <div>
            @if($dish->available)
            SI
            @else
            NO
            @endif
        </div>

        @auth
        <a href="{{ route('dish.edit', $dish->id)}}"><button>EDIT</button></a>
        @endauth

        @auth
        <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

            @csrf
            @method('DELETE')

            <input type="submit" value="DELETE">
        </form>
        @endauth
    </li>
    @endif
    @endforeach
</ul>


@endsection