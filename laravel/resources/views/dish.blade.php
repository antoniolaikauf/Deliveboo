@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-12">
                @auth
                    <div class="text-center">
                        <h2>
                            tutti i suoi piatti che dispone sulla piattaforma
                            {{ Auth::user()->name }}
                        </h2>
                        <a href="{{ route('dish.create') }}" class="btn btn-primary my-3">Create</a>
                    </div>
                @endauth
            </div>
            <div class="col-12 d-flex flex-wrap">
                @foreach ($dishes as $dish)
                    @if (Auth::check() && Auth::id() === $dish->user_id)
                        <div class="col-6 p-4">
                            <div class="card card-restaurant">
                                <div class="card-body text-center ">
                                    <h5 class="card-title">Nome piatto: <strong>{{ $dish->name }}</strong></h5>
                                    <p class="card-text">{{ $dish->description }}</p>
                                    <div class="my-2">Prezzo: <strong>{{ $dish->price }}&#128;</strong></div>
                                    <div>
                                        <div>
                                            @if ($dish->available)
                                                <div>
                                                    <span class="bg-success p-2 rounded">Piatto disponibile</span>
                                                </div>
                                            @else
                                                <div>
                                                    <span class="bg-danger p-2 rounded">Piatto non disponibile</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="img">
                                        @if($dish->img)
                                            <img src="{{asset('storage/'.$dish ->img) }}" alt="img dish">
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            @auth
                                                <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-primary">EDIT</a>
                                            @endauth
                                        </div>

                                        <div>
                                            @auth
                                                <form id="deleteForm_{{ $dish->id }}"
                                                    action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="showConfirmationModal('{{ $dish->id }}')">DELETE</button>
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

            .img img{
                width: 100%;
                max-height: 250px;
                object-fit: cover;
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
