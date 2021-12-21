@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (!isset($carros))
                    <h2 class="mb-5">Nenhum veículo encontrado</h2>
                @endif

                <h2>Listagem de Carros</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Véiculo</th>
                        <th scope="col">Link</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Combustível</th>
                        <th scope="col">Portas</th>
                        <th scope="col">Quilometragem</th>
                        <th scope="col">Câmbio</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carros as $carro)

                        <tr>
                            <th scope="row">{{ $carro->id }}</th>
                            <td>{{ $carro->nome_veiculo }}</td>
                            <td>{{ $carro->link }}</td>
                            <td>{{ $carro->ano }}</td>
                            <td>{{ $carro->combustivel }}</td>
                            <td>{{ $carro->portas }}</td>
                            <td>{{ $carro->quilometragem }}</td>
                            <td>{{ $carro->cambio }}</td>
                            <td>{{ $carro->cor }}</td>

                            <td>
                                <form
                                    style="display: inline;"
                                    action="{{ route('carros.destroy', $carro->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
