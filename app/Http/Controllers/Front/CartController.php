<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart(){
        return view('front.cart');
    }
    public function addToCart($productId){

        $product = product::findOrFail($productId);

        $cart = session('cart');


        if (array_key_exists($productId,$cart)){
            $cart[$productId]['quantity'] = $cart[$productId]['quantity'] + 1;
            session()->put('cart',$cart);

        }else{

            $cart[$productId]['name'] = $product->name;
            $cart[$productId]['price'] = $product->price;
            $cart[$productId]['image'] = $product->image;
            $cart[$productId]['quantity'] = 1;
            session()->put('cart',$cart);
        }


        return redirect()->back();
    }

    public function removeFormCart($productId){
        $cart = session('cart');
        unset($cart[$productId]);
        session()->put('cart',$cart);
        return redirect()->back();
    }
}
