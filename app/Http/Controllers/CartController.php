<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

use VAPOR\Product;

class CartController extends Controller
{
    public function showCart()
    {

    	$search = session('cart');

    	if(session()->exists('cart_number') || session('cart_number') != 0){
            for($i = 0; $i<session('cart_number'); $i++) {

	            $products[$i] = Product::find($search[$i]);

	        }
        } else {
        	return view('cart');
        }

        //$products = Product::paginate(4);

        return view('cart')
            ->with(['products' => $products]);
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

		for($i = 0; $i<session('cart_number'); $i++) {

            $products[$i] = Product::find($cart_array[$i]);
            
        }

        return view('cart')->with(['products' => $products]);
    }

    public function removeProduct($product_id) {
        print_r(session('cart'));
        echo session('cart_number');
        $cart_array = session('cart');
        $cart_number = session('cart_number');
        
        //$cart_array[$cart_number] = $product_id;
        $aux = false;
        for($i = 0; $i<session('cart_number'); $i++) {
            
            if($aux == true) {
                $cart_array[$i-1] == $cart_array[$i];
            }

            if($cart_array[$i] == $product_id) {
                $aux = true;
            }
            
        }
        $cart_array[$cart_number -1] = '';

        $cart_number--;
        session(['cart' => $cart_array]);
        session(['cart_number' => $cart_number]);
        
        if(session()->exists('cart_number') || $session('cart_number') == 0) {
            return view('cart');
        }
        
        for($i = 0; $i<session('cart_number'); $i++) {

            $products[$i] = Product::find($cart_array[$i]);
            
        }

        

        return view('cart')->with(['products' => $products]);
    }
}
