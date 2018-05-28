<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        return view('cart');
    }

    public function addToCart($product_id)
    {
        echo 'adding to cart';
        if(!session()->exists('cart_number')) {
        	print_r(session('cart'));
			echo session('cart_number');
		   $cart_number = 0;
		   $cart_array[$cart_number] = $product_id;
		   echo '<br> ola<br>';
		}	else {
			print_r(session('cart'));
			echo session('cart_number');
			$cart_array = session('cart');
        	$cart_number = session('cart_number');
        	
        	$cart_array[$cart_number] = $product_id;
        	
 		}

 		
		// put the array in a session variable
		$cart_number++;
		session(['cart' => $cart_array]);
		session(['cart_number' => $cart_number]);


		print_r(session('cart'));
		echo session('cart_number');

        return view('cart');
    }
}
