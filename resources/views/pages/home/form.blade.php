@extends('layouts.default')
@section('content')

    @include('components.alert')
    <h1>Formulário de T-SHIRTS</h1>
    <form class="container" action="{{ url('/admin/tshirts') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($tshirt->id ? 'PUT' : 'POST')

        <div class="row">
            @if ($tshirt->id)
                <div class="col">
                    <img src="{{url('/admin/tshirts/'.$tshirt->image_id)}}" alt="{{ $tshirt->name }}">
                        <p>{{ $tshirt->image_path }}</p>
                </div>
            @endif
        </div>

        <div class="row">
            <input type="hidden" name="id" value="{{ $tshirt->id }}">

            <div class="col-5">
                <div class="form-group">
                    <label class="form-label">Nome</label>
                    <input class="form-control" type="text" name="name" value="{{ $tshirt->name }}">
                </div>
            </div>


            <div class="col-5 d-flex align-items-end">
                <div class="form-group">
                    <label class="form-label">Imagem da T-shirts</label>
                    <input class="form-control" type="file" id="formFile" name="file"
                        value="{{ $tshirt->image_path ? $tshirt->image_path : '' }}">
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label class="form-label">Quantidade</label>
                    <input class="form-control" type="number" name="quantity" min="0"
                        value="{{ $tshirt->quantity }}">
                </div>
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-4">
                <div class="form-group">
                    <label class="form-label">Cor</label>
                    <select class="form-select" name="color_id">
                        <option value="{{ $tshirt->color_id ? $tshirt->color_id : '' }}">
                            {{ $tshirt->color_name ? $tshirt->color_name : 'Selecione a cor' }}</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label class="form-label">Material</label>
                    <select class="form-select" name="material_id">
                        <option value="{{ $tshirt->material_id ? $tshirt->material_id : '' }}">
                            {{ $tshirt->material_name ? $tshirt->material_name : 'Selecione a cor' }}</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label class="form-label">Tipos</label>
                    <select class="form-select" name="type_id">
                        <option value="{{ $tshirt->type_id ? $tshirt->type_id : ''}}">
                            {{ $tshirt->type_name ? $tshirt->type_name : 'Selecione a cor' }}</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <button class="btn btn-primary btn mt-2">Salvar</button>
        <a href="{{ url('/admin/tshirts') }}" class="btn btn-secondary btn mt-2">Voltar</a>
    </form>
@endsection
