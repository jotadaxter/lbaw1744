<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;


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

        if(session('cart_number') == 0)
            return view('cart');
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
        
        if(!session()->exists('cart_number')){
            return view('cart');
        }

        if(session('cart_number') == 0) {
            return view('cart');
        }
        
        for($i = 0; $i<session('cart_number'); $i++) {

            $products[$i] = Product::find($cart_array[$i]);
            
        }

        

        return view('cart')->with(['products' => $products]);
    }

    public function buyProduct(Request $request) {
        

        if(!session()->exists('cart_number')){
            return view('cart');
        }

        if(session('cart_number') == 0) {
            return view('cart');
        }

        $cart_array = session('cart');

       

    $user_id = Auth::id();
    $payment_date = date('Y/m/d');
    $payMethod = 'PayPal';
    $paid_amount = 10000;
    $payDetails = 'qualquer';
    
    echo $user_id;
    echo $payment_date;
    echo $payMethod;
    echo $paid_amount;
    echo $payDetails;

    DB::select("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;");
    DB::select('BEGIN TRANSACTION;');
    
    $sendToSQL = '';
    
    for($i = 0; $i<session('cart_number'); $i++)
        $sendToSQL .= '(' . $cart_array[$i] . '),';
    $sendToSQL = rtrim($sendToSQL,",");
    $sendToSQL .= ';';

    DB::select('INSERT INTO "SearchTable"(product_id) VALUES' . $sendToSQL);
    
    //DB::select(DB::raw('SELECT paymentRun'))->where(Auth::id(), date('Y/m/d'),'PayPal', 10000, 'qualquer');
    DB::select('SELECT "paymentRun"(
        :buyer_id::integer,
        :payment_date::date,
        :paymethod::paymentmethod,
        :paid_amount::double precision,
        :paydetails::text);', 
        
        ['buyer_id' => Auth::id(), 
         'payment_date' => date('Y/m/d'),
         'paymethod' => 'PayPal',
         'paid_amount' => 579, 
         'paydetails' =>'qualquer'
     ]);
    //DB::select('DELETE FROM "SearchTable";');
    DB::select('COMMIT;');



    /*$db = DB::connection()->getPdo();
    $db->beginTransaction();
    $db->exec("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;");
    $sendToSQL = '';
    
    for($i = 0; $i<session('cart_number'); $i++)
        $sendToSQL .= '(' . $cart_array[$i] . '),';
    $sendToSQL = rtrim($sendToSQL,",");
    $sendToSQL .= ';';

    $db->exec('INSERT INTO "SearchTable"(product_id) VALUES' . $sendToSQL);
    $db->exec('SELECT paymentRun(' . $user_id .',' . $payment_date .',' . $payMethod .',' . $paid_amount .',' . $payDetails .');');
    $db->exec('DELETE FROM "SearchTable";');
    $db->commit();*/


    //sudo kill -9 $(sudo lsof -t -i:5432)

    /*$sendToSQL = 'BEGIN TRANSACTION;
                SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;

                INSERT INTO "SearchTable"(product_id) VALUES';

    for($i = 0; $i<session('cart_number'); $i++)
        $sendToSQL .= '(' . $cart_array[$i] . '),';
        
    $sendToSQL = rtrim($sendToSQL,",");

    $sendToSQL .= ';
                EXECUTE PROCEDURE paymentRun(' . $user_id . ', ' . $payment_date . ', "' . $payMethod . '", ' . $paid_amount . ', "' . $payDetails . '")
                DELETE FROM "SearchTable";

                COMMIT;';
                
    DB::select($sendToSQL);*/



        //meu
    /*$sendToSQL = '';
    for($i = 0; $i<session('cart_number'); $i++) {
        DB::select('
        BEGIN TRANSACTION;
        SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
        INSERT INTO "SearchTable"(product_id) VALUES (?);
        SELECT paymentRun(?,?,?,?,?);
        
        COMMIT;
        ', [$cart_array[$i], $user_id, $payment_date, $payMethod, $paid_amount, $payDetails]);
    }
    /*$sendToSQL .= '(' . $cart_array[$i] . '),'; 
    $sendToSQL = rtrim($sendToSQL,","); 
    $sendToSQL .= ';';*/

    



        

        echo 'compra efetuada';
        
        return view('cart');
    }
}
