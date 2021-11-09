@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-danger">Falha ao capturar veículos!</h2>
                <a href="{{ route('carros.create') }}" class="btn btn-success">Voltar</a>
            </div>
        </div>
    </div>
@endsection
