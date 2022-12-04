@extends('master')
@extends('content')
<div class="container custom-product">
    <div class="col-sm-10">
        <a href="#">Fliter</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h4>Results</h4>
            <a class="btn btn-success" href="/order">ORDER NOW</a>
            <br><br>
            @foreach ($product as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image" src="{{$item->gallery}}">"
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h2>{{$item->name}}</h2>
                            <h5>{{$item->description}}</h5>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a href="/remove_cart/{{$item->cart_id}} class="btn btn-warning">Remove from cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>