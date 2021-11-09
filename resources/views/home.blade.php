@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Painel de controle') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Seja bem-vindo(a), ".auth()->user()->name) }}
                    <br/><br/>
                    <a class="badge badge-primary" href="{{ route('carros.index') }}">Listar veículos</a>
                    <br/>
                    <a class="badge badge-primary" href="{{ route('carros.create') }}">Capturar veículos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
