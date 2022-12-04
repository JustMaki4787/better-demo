<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Symfony\Component\Process\Process;

class productController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('Product', ['Product' => $data]);
    }
    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        $data = Product::
            where('name', 'like', '%', $req->input('query'), '%')->get();
        return view('search', ['product' => $data]);
    }
    function addToCart(Request $req)
    {
        if ($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
        }
        else {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    function cartList()
    {
        $userId = Session::get('user')['id'];
        $product = DB::table('cart')->join('product', 'cart.product_id')
        ->where('cart.user_id',$userId)->select('product.*','cart.id as cart_id')->get();
        return view('cartList',['product'=>$product]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartList');
    }
    function order()
    {
        $userId = Session::get('user')['id'];
        $total = $product = DB::table('cart')->join('product', 'cart.product_id')
        ->where('cart.user_id',$userId)->sum('product.price');
        return view('order',['total'=>$total]);
    }
    function placeOrder(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach($allCart as $cart)
        {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    function myOrder()
    {
        $userId = Session::get('user')['id'];
        $order = DB::table('order')->join('product', 'order.product_id')
        ->where('order.user_id', $userId)->get();
        return view('myOrder', ['order' => $order]);
    }
}