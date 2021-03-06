@extends('layouts.app')


@section('content')
    <h1>Atualizar Produto</h1>

    <form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">Nome Produto</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}">

            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>

            @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">

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
                        <option value="{{$category->id}}"
                            @if($product->categories->contains($category)) selected @endif
                        >{{$category->name}}
                        </option>
                    @endforeach
                </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fotos do produto</label>
            <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>

                @error('photos.*')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>

    <hr>

    <div class="row">

        @foreach ($product->photos as $photo)
                <div class="col-4 text-center">
                    <img src="{{asset('storage/' . $photo->image)}}" class="img-fluid" alt="">
                    <form action="{{route('admin.photo.remove')}}" method="post">
                        @csrf
                        <br>
                        <input type="hidden" name="photoName" value="{{$photo->image}}">
                        <button type="submit" class="btn btn-lg btn-danger">Remover</button>
                    </form>
                </div>
        @endforeach

    </div>

@endsection
