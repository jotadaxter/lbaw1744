<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        return view('cart');
    }

    public function addToCart()
    {
        echo 'adding to cart';
        return view('cart');
    }
}
