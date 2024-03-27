@extends('layouts.app')
@section('content')
    <div class="container form-bg my-5">
        <h2 class="fs-4 text-white my-4">
            {{ __('Profilo') }}
        </h2>
        <div class="card p-4 mb-4 form-bg text-white shadow rounded-lg">

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card p-4 mb-4 form-bg shadow rounded-lg">


            @include('profile.partials.update-password-form')

        </div>


        <div class="card p-4 mb-4 text-white shadow rounded-lg form-bg">
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
                            <label class="my-2" for="city">Città</label>
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




        {{-- <div class="card p-4 mb-4 shadow rounded-lg form-bg">


            @include('profile.partials.delete-user-form')

        </div> --}}
    </div>



    </div>

<style>
    /* STILE FORM */
    .form-bg {
        background-color: #292929;
        padding: 40px;
        border-radius: 17px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
        transform: translateY(10px);
    }

    .form-control {
        border: none;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) inset;
        background-color: transparent;
        color: #ffffff;
    }

    .form-control::placeholder {
        color: #ffffff;
    }

    .form-selectl::placeholder {
        color: #ffffff;
    }

    /* END STILE FORM */

</style>
@endsection
