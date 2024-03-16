@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-img">
        <div class="row">
            <div class="col-12">
                @auth
                    <div class="text-center">
                        <h2 class="text-white auth mt-4">
                            Ciao, {{ Auth::user()->name }}. Ecco tutti i piatti disponibili nel tuo account.
                        </h2>
                        <a href="{{ route('dish.create') }}" class="btn btn-primary my-3">Crea il piatto</a>
                    </div>
                @endauth
            </div>
            <div class="col-12 d-flex flex-wrap">
                @foreach ($dishes as $dish)
                    @if (Auth::check() && Auth::id() === $dish->user_id)
                        <div class="col-12 col-lg-6 p-4">
                            <div class="card card-restaurant">
                                <div class="card-body text-center ">
                                    <h5 class="card-title">Nome delpiatto: <strong>{{ $dish->name }}</strong></h5>
                                    <p class="card-text">{{ $dish->description }}</p>
                                    <div class="my-2">Prezzo: <strong>{{ $dish->price }}&#128;</strong></div>

                                    <div class="dish-availability">
                                        <div>
                                            @if ($dish->available)
                                                <div>
                                                    <span class="availability-indicator available">Piatto disponibile</span>
                                                </div>
                                            @else
                                                <div>
                                                    <span class="availability-indicator unavailable">Piatto non disponibile</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="img">
                                        @if($dish->img)
                                            <img src="{{asset('storage/'.$dish->img)}}" alt="Immagine del piatto {{ $dish->name }}">
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-center mt-2">
                                        <div>
                                            @auth
                                                <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-primary mx-2">Modifica</a>
                                            @endauth
                                        </div>

                                        <div>
                                            @auth
                                                <form id="deleteForm_{{ $dish->id }}"
                                                    action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="showConfirmationModal('{{ $dish->id }}')">Cancella</button>
                                                </form>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmationModal_{{ $dish->id }}" tabindex="-1"
                            aria-labelledby="confirmationModalLabel_{{ $dish->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel_{{ $dish->id }}">Attenzione <i class="fa-solid fa-bomb"></i></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Sei sicuro di voler eliminare "{{ $dish->name }}" ?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancella</button> --}}
                                        <button type="button" class="btn btn-danger"
                                            onclick="submitDeleteForm('{{ $dish->id }}')">Elimina</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    <style>

        .dish-availability {
            margin-top: 10px;
        }

        .availability-indicator {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .available {
            background-color: #28a745;
            color: #fff;
        }

        .unavailable {
        background-color: #dc3545;
        color: #fff;
    }

        .auth {
            letter-spacing: 3px;
        }

        .bg-img {
            background-image: url(/imgs/8afbf530-609f-4e88-99f1-628c2a9faa63.png);
            background-size: cover;
            height: 100%;
            width: 100%;

        }

        .card-restaurant {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-right: 20px;
            margin-bottom: 20px;
            height: 500px;
        }

        .card-restaurant:hover {
            transform: scale(1.05);
        }

        .img img {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            margin-top: 35px;
        }
    </style>

    {{-- SCRIPT MODALE --}}
    <script>
        function showConfirmationModal(dishId) {
            $('#confirmationModal_' + dishId).modal('show');
        }

        function submitDeleteForm(dishId) {
            document.getElementById('deleteForm_' + dishId).submit();
        }
    </script>
@endsection
