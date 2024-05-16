@extends('layouts.default')

@section('content')
    <h1>Lista de Camiseta</h1>
    <div class="page page-tshirt page-index" id="content">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <a class="btn btn-secondary" href=""></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ url('/admin/home/cadastrar') }}">Adicionar T-SHIRT</a>
@endsection
