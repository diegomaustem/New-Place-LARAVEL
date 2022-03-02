@extends('layouts.app')

@section('content')
    <br>
    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar Produto</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td> <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-sm btn-warning">Editar</a></td>
                    <td> <a href="{{ route('admin.products.destroy', ['product' => $product->id]) }}" class="btn btn-sm btn-danger">Remover</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$products->links()}}

@endsection
