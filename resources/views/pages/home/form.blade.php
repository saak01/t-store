@extends('layouts.default')
@section('content')

    <h1>Formulário de T SHIRTs</h1>
    <form class="container" action="{{ url('admin/home/cadastrar') }}">
        @csrf

        <div class="d-flex row">
            <input type="hidden" name="id">

            <div class="col-3">
                <div class="form-group">
                    <label class="form-label">Nome</label>
                    <input class="form-control" type="text" name="name">
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label class="form-label">Cor</label>
                    <select class="form-select" name="color_id">
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label class="form-label">Quantidade</label>
                    <input class="form-control" type="number" name="quantity">
                </div>
            </div>

        </div>
    @endsection
