@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('carros.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-4 p-0">
                        <label for="name">Digite um modelo deveículo para ser importado:</label>
                        <input type="text" class="form-control" id="termo" name="termo">
                    </div>

                    <button type="submit" class="btn btn-success">Pesquisar</button>
                    <a href="{{ route('home') }}" class="btn btn-success">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
