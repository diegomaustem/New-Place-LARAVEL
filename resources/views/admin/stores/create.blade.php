@extends('layouts.app')


@section('content')

    <h1>Criar Loja</h1>
    <form action="{{ route('admin.stores.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome da Loja:</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="phone">
        </div>

        <div class="mb-3">
            <label class="form-label">Celular/Whatsap:</label>
            <input type="text" class="form-control" name="mobile_phone">
        </div>

        <div class="mb-3">
            <label class="form-label">Slug:</label>
            <input type="text" class="form-control" name="slug">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Enviar</button>
        </div>
    </form>

@endsection
