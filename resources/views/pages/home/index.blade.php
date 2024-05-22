@extends('layouts.default')
@section('content')
    <h1>Lista de Camiseta</h1>
    <div class="page page-tshirt page-index" id="content">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Material</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Tipos</th>
                    <th scope="col">Images</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tshirts as $tshirt)
                    <tr>
                        <td>{{ $tshirt->id }}</td>
                        <td>{{ $tshirt->quantity }}</td>
                        <td>{{ $tshirt->name }}</td>
                        <td>{{ $tshirt->material_name }}</td>
                        <td>{{ $tshirt->color_name }}</td>
                        <td>{{ $tshirt->type_name }}</td>
                        <td>
                            <img height="50" width="50" src="{{ url('/admin/tshirts/' . $tshirt->image_id) }}" alt="{{$tshirt->name}}">
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm"
                                href="{{ url('/admin/tshirts/' . $tshirt->id . '/editar') }}">Editar</a>
                            @include('components.delete', [
                                'url' => 'admin/tshirts',
                                'id' => $tshirt->id,
                                'text' => 'Remover',
                            ])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ url('/admin/tshirts/cadastrar') }}">Adicionar T-SHIRT</a>
@endsection
