@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Profile') }}
        </h2>
        <div class="card p-4 mb-4 bg-white shadow rounded-lg">

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card p-4 mb-4 bg-white shadow rounded-lg">


            @include('profile.partials.update-password-form')

        </div>


        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            <h2>Modifica Ristorante</h2>
            @foreach ($restaurants as $restaurant)
                @if (Auth::check() && Auth::id() === $restaurant->user_id)
                    <form action="{{ route('restaurant.update', $restaurant->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label class="my-2" for="nome_ristorante">Nome</label>
                            <input type="text" class="form-control" name="nome_ristorante" required id="nome_ristorante"
                                value="{{ $restaurant->name }}">
                        </div>

                        <div>
                            <label class="my-2" for="city">City</label>
                            <input type="text" class="form-control" name="city" required id="city"
                                value="{{ $restaurant->city }}">
                        </div>

                        <div>
                            <label class="my-2" for="piva">piva</label>
                            <input type="text" class="form-control" name="piva" required id="piva"
                                value="{{ $restaurant->piva }}">
                        </div>
                        <div>
                            <label class="my-2" for="img">Immagine:</label>
                            <input type="file" name="img" id="img" class="form-control"
                                value="{{ $restaurant->img }}">
                        </div>

                        <div class="mb-4">
                            <label for="type"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tipo di cucina:') }}</label>
                            <div>
                                @foreach ($types as $type)
                                    <div>
                                        <input type="checkbox" name="types[]" value="{{ $type->id }}"
                                            id="tag{{ $type->id }}"
                                            @foreach ($restaurant->types as $eventType)
                                            @if ($eventType->id == $type->id)
                                                checked
                                            @endif @endforeach>
                                        <label for="tag{{ $type->id }}">{{ $type->name }}</label>
                                        <br>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>

                            <input type="submit" value="Salva" class="btn btn-primary">

                        </div>
                @endif
            @endforeach

            </form>

        </div>




        <div class="card p-4 mb-4 bg-white shadow rounded-lg">


            @include('profile.partials.delete-user-form')

        </div>
    </div>



    </div>
@endsection
