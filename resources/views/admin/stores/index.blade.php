@extends('layouts.app')

@section('content')

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
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
