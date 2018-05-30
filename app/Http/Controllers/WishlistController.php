<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;


use VAPOR\Product;

class wishlistController extends Controller
{
    public function showwishlist() 
    {

    	$search = session('wishlist');

    	if(session()->exists('wishlist_number') || session('wishlist_number') != 0){
            for($i = 0; $i<session('wishlist_number'); $i++) {

	            $products[$i] = Product::find($search[$i]);

	        }
        } else {
        	return view('wishlist');
        }

        if(session('wishlist_number') == 0)
            return view('wishlist');
        //$products = Product::paginate(4);

        return view('wishlist')
            ->with(['products' => $products]);
    }

    public function addTowishlist($product_id)
    {
        echo 'adding to wishlist';
        if(!session()->exists('wishlist_number')) {
        	print_r(session('wishlist'));
			echo session('wishlist_number');
		   $wishlist_number = 0;
		   $wishlist_array[$wishlist_number] = $product_id;
		   echo '<br> ola<br>';
		}	else {
			print_r(session('wishlist'));
			echo session('wishlist_number');
			$wishlist_array = session('wishlist');
        	$wishlist_number = session('wishlist_number');
        	
        	$wishlist_array[$wishlist_number] = $product_id;
        	
 		}

 		
		// put the array in a session variable
		$wishlist_number++;
		session(['wishlist' => $wishlist_array]);
		session(['wishlist_number' => $wishlist_number]);


		print_r(session('wishlist'));
		echo session('wishlist_number');

		for($i = 0; $i<session('wishlist_number'); $i++) {

            $products[$i] = Product::find($wishlist_array[$i]);
            
        }

        return view('wishlist')->with(['products' => $products]);
    }

    public function removeProduct($product_id) {
        print_r(session('wishlist'));
        echo session('wishlist_number');
        $wishlist_array = session('wishlist');
        $wishlist_number = session('wishlist_number');
        
        //$wishlist_array[$wishlist_number] = $product_id;
        $aux = false;
        for($i = 0; $i<session('wishlist_number'); $i++) {
            
            if($aux == true) {
                $wishlist_array[$i-1] == $wishlist_array[$i];
            }

            if($wishlist_array[$i] == $product_id) {
                $aux = true;
            }
            
        }
        $wishlist_array[$wishlist_number -1] = '';

        $wishlist_number--;
        session(['wishlist' => $wishlist_array]);
        session(['wishlist_number' => $wishlist_number]);
        
        if(!session()->exists('wishlist_number')){
            return view('wishlist');
        }

        if(session('wishlist_number') == 0) {
            return view('wishlist');
        }
        
        for($i = 0; $i<session('wishlist_number'); $i++) {

            $products[$i] = Product::find($wishlist_array[$i]);
            
        }

        

        return view('wishlist')->with(['products' => $products]);
    }

}
