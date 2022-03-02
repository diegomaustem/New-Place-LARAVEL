@extends('layouts.app')


@section('content')
    <br>
    <h1>Atualizar Produto</h1>
    <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome do produto:</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control" name="description" value="{{$product->description}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Conteúdo:</label>
            <textarea class="form-control" name="body" rows="3">{{$product->body}}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço:</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>

@endsection
