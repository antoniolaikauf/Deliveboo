@extends('layouts.app')
@section('content')
    <h1>Dishes</h1>

    <ul>

        @foreach ($dishes as $dish)
            <li>

                <div>{{ $dish->name }}</div>
                <div>{{ $dish->description }}</div>
                <div>{{ $dish->price }}</div>
                <div>{{ $dish->available }}</div>

                <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <input type="submit" value="DELETE">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
