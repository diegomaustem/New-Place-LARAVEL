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
            <th scope="col">Loja</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>$ {{number_format($product->price, 2, ',', '.')}}</td>
                    <td>{{$product->store->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-sm btn-warning">Editar</a>&nbsp;
                            <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                            </form>
                        </div>
                    </td>
                    </tr>
            @endforeach
        </tbody>
    </table>

    {{$products->links()}}

@endsection
