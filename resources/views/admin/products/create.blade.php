@extends('layouts.app')


@section('content')

    <h1>Criar Produto</h1>
    <form action="{{ route('admin.products.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome do produto:</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div class="mb-3">
            <label class="form-label">Conteúdo:</label>
            <textarea class="form-control" name="body" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço:</label>
            <input type="text" class="form-control" name="price">
        </div>

        <div class="mb-3">
            <label class="form-label">Slug:</label>
            <input type="text" class="form-control" name="slug">
        </div>

        <div class="mb-3">
            <label class="form-label">Lojas:</label>
            <select name="store" class="form-control">
                @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
        </div>
    </form>

@endsection
