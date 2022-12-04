@extends('master')
@extends('content')
<div class="container custom-product">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>${{$total}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>$10</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>${{$total+11}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/placeorder" method="POST">
                @csrf
                <div class="form-group">
                    <textarea type="place" placeholder="Emter your address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pm">Payment Method</label>
                    <input type="pm" value="cash" name="payment"><span>Online Payment</span><br><br>
                    <input type="pm" value="cash" name="payment"><span>Payment on delivery</span><br><br>
                    <input type="pm" value="cash" name="payment"><span>EMI Payment</span><br><br>
                </div>
                <button type="order" class="btn btn-default">Order</button>
            </form>
        </div>
    </div>
</div>