@extends('layouts.app')


@section('content')

    <h1>Criar Produto</h1>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome do produto:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">

                @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Conteúdo:</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="3">{{old('body')}}</textarea>

                @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
             <label class="form-label">Preço:</label>
             <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">

                @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Categorias:</label>
                <select class="form-select" name="categories[]" id="" multiple>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fotos do produto</label>
            <input type="file" name="photos[]" class="form-control  @error('photos') is-invalid @enderror" multiple>

                @error('photos')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug:</label>
            <input type="text" class="form-control" name="slug">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
        </div>
    </form>

@endsection
