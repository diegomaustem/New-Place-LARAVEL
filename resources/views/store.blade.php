@extends('layouts.front')

@section('content')

    <div class="row front">
        <div class="col-12">
            <h2>{{$store->name}}</h2>
            <p>{{$store->description}}</p>
            <p>
                <strong>Contatos:</strong>
                <span>{{$store->phone}}</span> | <span>{{$store->mobile_phone}}</span>
            </p>
            <hr>
        </div>
        <div class="col-12">
            <h3 style="margin-bottom: 30px;">Produtos desta loja</h3>
            <hr/>
        </div>

        @forelse ($store->products as $key => $product)
            <div class="col-md-4">
                <div class="card" style="width: 98%;">
                    @if($product->photos->count())
                        <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top">
                    @else
                        <img src="{{asset('storage/assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
                    @endif

                    <div class="card-body">
                        <h2 class="card-title">{{$product->name}}</h2>
                        <p class="card-text">{{$product->description}}</p>
                        <h3> $ {{number_format($product->price, '2', ',', '.')}} </h3>
                        <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success">Ver produto</a>
                    </div>
                </div>
            </div>
                @if(($key + 1) % 3 ==0) </div><div class="row front">@endif
        @empty
            <div class="col-12">
                <h3 class="alert alert-warning">Nenhum produto encontrado para esta loja!</h3>
            </div>
        @endforelse
    </div>

@endsection
