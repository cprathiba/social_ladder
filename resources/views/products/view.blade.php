@extends('layouts.app')

@section('content')

    @foreach($products as $product)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset($product->image)}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-title">{{$product->product_name}}</p>
                <p class="card-text">{{$product->description}}</p>
            </div>
        </div>
    @endforeach

@endsection

