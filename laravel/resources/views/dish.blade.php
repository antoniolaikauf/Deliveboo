@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-img">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @auth
                        <div class="text-center m-4">
                            <h2 class="text-white auth m-4">
                                Ciao, {{ Auth::user()->name }}. Ecco tutti i piatti disponibili nel tuo account.
                            </h2>
                            <a href="{{ route('dish.create') }}" class="btn-boo buttons bg-black text-white p-2">Crea il
                                piatto</a>
                            <a href="{{ route('order.index') }}" class="btn-boo buttons bg-black text-white p-2">Visualizza
                                ordini</a>
                            <a href="{{ route('order.graph') }}" class="btn-boo buttons bg-black text-white p-2">Visualizza
                                grafico</a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mask-custom">
                        <table class="table table-striped table-borderless text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Immagini</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrizione</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Disponibilità</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- reverse, inverte l'ordine dell'array --}}
                                @foreach ($dishes->reverse() as $dish)
                                    @if (Auth::check() && Auth::id() === $dish->user_id)
                                        <tr>
                                            <td>
                                                <div class="img-cont">
                                                    @if ($dish->img == null)
                                                        <div class="text-danger">
                                                            <b>immagine non selezionata</b>
                                                        </div>
                                                    @else
                                                        <div>
                                                            {{-- Condizione di verifica, se è presente l'img dello storage inserisci quella, altrimenti le img del db(già stabilite) --}}
                                                            @if ($dish->img && Storage::disk('public')->exists($dish->img))
                                                                <img class="img-fluid"
                                                                    src="{{ asset('storage/' . $dish->img) }}"
                                                                    alt="Immagine del piatto {{ $dish->name }}">
                                                            @else
                                                                <img class="img-fluid" src="{{ asset($dish->img) }}"
                                                                    alt="Immagine del piatto {{ $dish->name }}">
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $dish->name }}</td>
                                            <td>{{ $dish->description }}</td>
                                            <td>{{ $dish->price }} €</td>
                                            <td>
                                                @if ($dish->available)
                                                    <span class="badge bg-success">Disponibile</span>
                                                @else
                                                    <span class="badge bg-danger">Non disponibile</span>
                                                @endif
                                            </td>

                                            <td>
                                                @auth
                                                    <a href="{{ route('dish.edit', $dish->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit" style="color: white";></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger ms-2"
                                                        onclick="showConfirmationModal('{{ $dish->id }}')">
                                                        <i class="fas fa-trash-alt" style="color: white";></i>
                                                    </button>
                                                    <form id="deleteForm_{{ $dish->id }}"
                                                        action="{{ route('dish.delete', $dish->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @foreach ($dishes as $dish)
        @if (Auth::check() && Auth::id() === $dish->user_id)
            <div class="modal fade" id="confirmationModal_{{ $dish->id }}" tabindex="-1"
                aria-labelledby="confirmationModalLabel_{{ $dish->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel_{{ $dish->id }}">Attenzione</h5>
                            <i class="fas fa-exclamation-triangle"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Sei sicuro di voler eliminare "{{ $dish->name }}"?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                onclick="submitDeleteForm('{{ $dish->id }}')">Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    {{-- JavaScript --}}
    <script>
        function showConfirmationModal(dishId) {
            $('#confirmationModal_' + dishId).modal('show');
        }

        function submitDeleteForm(dishId) {
            document.getElementById('deleteForm_' + dishId).submit();
        }
    </script>

    {{-- CSS --}}
    <style>
        .table> :not(caption)>*>* {
            color: rgb(255, 255, 255);
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-border-color: gray;
        }

        .mask-custom {
            background: rgba(24, 24, 16, .2);
            border-radius: 2em;
            backdrop-filter: blur(25px);
            border: 2px solid rgba(255, 255, 255, 0.05);
            background-clip: padding-box;
            box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
            margin: 50px 0;
        }

        .img-cont .img-fluid {
            width: 50px;
            height: 50px;

            object-fit: cover;
        }

        .bg-img {
            background-image: url(/imgs/8afbf530-609f-4e88-99f1-628c2a9faa63.png);
            background-size: cover;
            height: 100%;
            width: 100%;
        }
    </style>
@endsection
