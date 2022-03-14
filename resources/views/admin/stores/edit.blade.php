@extends('layouts.app')


@section('content')

    <h1>Editar Loja</h1>
    <form action="{{ route('admin.stores.update', ['store' => $store->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome da Loja:</label>
            <input type="text" class="form-control" name="name" value={{$store->name}}>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control" name="description" value={{$store->description}}>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="phone" value={{$store->phone}}>
        </div>

        <div class="mb-3">
            <label class="form-label">Celular/Whatsap:</label>
            <input type="text" class="form-control" name="mobile_phone" value={{$store->mobile_phone}}>
        </div>

        <div class="mb-3">
            <p>
                <img src="{{asset('storage/' . $store->logo)}}" alt="">
            </p>
            <label class="form-label">Fotos da loja</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">

                @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
        </div>
    </form>

@endsection
