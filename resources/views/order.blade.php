@extends('master')
@extends('content')
<div class="container custom-product">
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h4>My orders</h4>
            @foreach ($order as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image" src="{{$item->gallery}}">"
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h2>{{$item->name}}</h2>
                            <h5>Status: {{$item->status}}</h5>
                            <h5>Address: {{$item->address}}</h5>
                            <h5>Payment: {{$item->payment_status}}</h5>
                            <h5>Payment Method: {{$item->payment_method}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>