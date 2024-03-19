@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-img">
        <div class="row">
            <div class="col-12">
                @auth
                    <div class="text-center m-4">
                        <h2 class="text-white auth m-4">
                            Ciao, {{ Auth::user()->name }}. Ecco tutti i piatti disponibili nel tuo account.
                        </h2>
                        <a href="{{ route('dish.create') }}" class="btn-boo buttons p-2">Crea il piatto</a>
                    </div>
                @endauth
            </div>
            <div class="col-12 d-flex flex-wrap">
                @foreach ($dishes as $dish)
                    @if (Auth::check() && Auth::id() === $dish->user_id)
                        <div class="col-12 col-lg-6 p-4">
                            <div class="card p-5 card-restaurant">


                                <div class="button-dish mt-2">
                                    <div>
                                        @auth
                                            <a href="{{ route('dish.edit', $dish->id) }}" class=" mx-2"><button class="btn-boo buttons"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                        @endauth
                                    </div>

                                    <div class="py-2">
                                        @auth
                                            <form id="deleteForm_{{ $dish->id }}"
                                                action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="showConfirmationModal('{{ $dish->id }}')"><i class="fa-solid fa-trash" style="color: white"></i></i></button>
                                            </form>
                                        @endauth
                                    </div>
                                </div>

                                <div class="card-body text-center ">
                                    <h5 class="card-title">Nome del piatto: <strong>{{ $dish->name }}</strong></h5>
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

                                    <div class="img_container ">
                                        @if($dish->img)
                                            <img class="img-fluid" src="{{asset('storage/'.$dish->img)}}" alt="Immagine del piatto {{ $dish->name }}">
                                        @endif


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

        /* stile disponibilità */
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

        /* stile titolo */
        .auth {
            letter-spacing: 3px;
        }

        /* stile bg */
        .bg-img {
            background-image: url(/imgs/8afbf530-609f-4e88-99f1-628c2a9faa63.png);
            background-size: cover;
            height: 100%;
            width: 100%;
        }

        /* stile card */
        .card-restaurant {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 500px;
            position: relative;
        }

        .card-restaurant:hover {
            transform: scale(1.05);
        }

        .img_container img {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            margin-top: 35px;
            height: 300px;
        }

        .button-dish{
            position: absolute;
            top: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
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
