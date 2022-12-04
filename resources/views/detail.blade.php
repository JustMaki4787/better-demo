@extends('master')
@extends('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        {{-- <img class="detail-img" src="{{$product['gallery']}}" alt=""> --}}
            {{-- Add them yourself with the stuff --}}
        </div>
        <div class="col-sm-6">
            <a href="/">Back</a>
            <h2>{{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Category: {{$product['category']}}</h4>
            <h5>{{$product['description']}}</h5>
            <button class="btn btn-primary">BUY NOW</button>
            <br><br>
            <button class="btn btn-primary">Add to cart</button>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value{{$product['id']}}>
        </div>
    </div>
</div>