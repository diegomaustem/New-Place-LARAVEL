@extends('layouts.app')

@section('content')
    <br>
    <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Criar Loja</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Loja</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td> <a href="{{ route('admin.stores.edit', ['store' => $store->id]) }}" class="btn btn-sm btn-warning">Editar</a></td>
                    <td> <a href="{{ route('admin.stores.destroy', ['store' => $store->id]) }}" class="btn btn-sm btn-danger">Remover</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{$stores->links()}}

@endsection
