<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StaticPagesController extends Controller
{
    public function showHome()
    {
        //Promotion Products
        $promo_products = DB::select('
            SELECT * 
            FROM "Products" INNER JOIN "Discounts" on "Products".product_id = "Discounts".product_id 
            WHERE (CURRENT_DATE BETWEEN "Discounts".begin_date AND "Discounts".end_date);        
        ');


        $days = 20;
        $trendTime = '\'20 day\'';
        //Most Popular Products
        $trending_products = DB::select('
            SELECT *
            FROM "Products"
            WHERE "Products".product_id IN (
	          SELECT product_id
	          FROM (
	          SELECT "SerialKeys".product_id, COUNT(*) 
	          FROM (("PurchasedKeys"	
	            INNER JOIN "SerialKeys" ON "PurchasedKeys".sk_id = "SerialKeys".sk_id)
	            INNER JOIN "Purchases" ON "PurchasedKeys".purchase_id = "Purchases".purchase_id)
	          WHERE "SerialKeys".product_id = "Products".product_id AND 
	          "Purchases".paid_date >= NOW() - INTERVAL \'20 day\' 
	          GROUP BY "SerialKeys".product_id
	          ORDER BY 2 DESC) as BLA
)
        
        
        ');

        return view('home')
            ->with(['trending_products' => $trending_products,
                    'promo_products' => $promo_products
                ]);
    }



    public function showAbout()
    {
        return view('about');
    }

    public function showContacts()
    {
        return view('contacts');
    }

    public function showTerms()
    {
        return view('terms');
    }

    public function showPrivacy()
    {
        return view('privacy');
    }

    public function show404()
    {
        return view('404');
    }
}
