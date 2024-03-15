@extends('layouts.app')
@section('content')
<div class="container-fluid bg-sfondo p-5">
    <div class="row justify-content-center py-5">
        <div class="col-6 p-4 form-create bg-secondary text-white">
            <form action="{{ route('dish.store') }}" method="POST">

                @csrf
                @method('POST')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <div class="input-group gap-3">
                    <label for="name">Nome del piatto</label>
                    <input type="text" class="form-control" placeholder="Nome piatto" name="name" id="name" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group my-3 gap-3">

                    <label for="description">Inserire descrizione del piatto</label>
                    <textarea class="form-control" aria-label="With textarea" name="description" id="description" name='description'></textarea>
                </div>
                <div class="input-group gap-3">
                    <label for="price">Inserire prezzo del piatto creato </label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
                <div class="input-group my-3 gap-3">
                    <label for="available">Seleziona la disponibilità del piatto</label>
                    <select name="available" id="available" class="form-select" aria-label="Default select example">
                        <option value="1">disponibile</option>
                        <option value="0">non disponibile</option>
                    </select>
                </div>

                <div class="text-center ">
                    <input type="submit" value="CREA PIATTO" class="btn-boo buttons">
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .form-create {
        border: 1px solid #00CCBC;
        border-radius: 15px;
    }

    .bg-sfondo {
        height: 700px;
        background-image: url(https://images.pexels.com/photos/784632/pexels-photo-784632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
        background-size: cover;
    }
</style>
@endsection