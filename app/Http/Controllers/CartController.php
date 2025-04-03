<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Cartcontroller extends Controller
{
    public function index()
    {
        $productCarts = Session::get('cart');
        return view('shopping_cart', compact('productCarts'));
    }
    public function reduce($id)
    {
       if(Session::has('cart')){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
       }
    }
    public function increase($id)
    {
       if(Session::has('cart')){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->increase($id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
       }
    }
    public function destroy($id)
    {
       if(Session::has('cart')){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
       }
    }
}
