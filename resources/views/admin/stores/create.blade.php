@extends('layouts.app')


@section('content')

    <h1>Criar Loja</h1>
    <form action="{{ route('admin.stores.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome da Loja:</label>
            <input type="text" class="form-control @error('name') is-invalid" @enderror name="name" value="{{old('name')}}">

                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control   @error('description') is-invalid"  @enderror name="description" value="{{old('description')}}">

                @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" class="form-control @error('phone') is-invalid"  @enderror name="phone" value="{{old('phone')}}">

                 @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Celular/Whatsap:</label>
            <input type="text" class="form-control" name="mobile_phone" value="{{old('mobile_phone')}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Fotos da loja</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">

                @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Enviar</button>
        </div>
    </form>

@endsection
