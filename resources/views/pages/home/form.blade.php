@extends('layouts.default')
@section('content')

    <h1>Formulário de T-SHIRTS</h1>
    <form class="container" action="{{ url('/admin/home/tshirts') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            <input type="hidden" name="id">

            <div class="col-5">
                <div class="form-group">
                    <label class="form-label">Nome</label>
                    <input class="form-control" type="text" name="name" value="{{$tshirt->name}}">
                </div>
            </div>

            <div class="col-5  d-flex align-items-end">
                <div class="form-group">
                    <label class="form-label">Imagem da T-shirts</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label class="form-label">Quantidade</label>
                    <input class="form-control" type="number" name="quantity" min="0" value="{{$tshirt->quantity}}">
                </div>
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-4">
                <div class="form-group">
                    <label class="form-label">Cor</label>
                    <select class="form-select" name="color_id">
                        <option>Selecione a opção</option>
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
                        <option>Selecione a opção</option>
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
                        <option>Selecione a opção</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <button class="btn btn-primary btn mt-2">Salvar</button>
        <a href="{{url('/admin/home/tshirts')}}" class="btn btn-secondary btn mt-2">Voltar</a>
    </form>
@endsection
