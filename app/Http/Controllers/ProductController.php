<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use VAPOR\Product;

class ProductController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $product_id
     * @return Response
     */
    public function showProduct($product_id)
    {
        $product = Product::find($product_id);

        //get images
        $images=DB::select('
            SELECT "ProductImages".img_path
              FROM "ProductImages" INNER JOIN "Products" ON "ProductImages".product_id="Products".product_id 
            WHERE "Products".product_id = ?;    
       ', [$product_id]);

        //get reviews
        $reviews=DB::select('
            SELECT "Reviews".sk_id, "Reviews".rating, "Reviews".review_date, "Reviews".comment
            FROM (("Reviews" INNER JOIN "SerialKeys" ON "Reviews".sk_id="SerialKeys".sk_id)
            INNER JOIN "Products" ON "Products".product_id = "SerialKeys".product_id)
            ORDER BY "Reviews".review_date DESC;
                   
       ');

        $avg_rating =0;
        $counter=0;
        //calculate Average Rating
        foreach($reviews as $review){
            $avg_rating+=($review->rating);
            $counter++;
        }
        $avg_rating=round($avg_rating/$counter);

        //Tags
        $tags = DB::select('
            SELECT "Tags".tag_name
            FROM "Products" INNER JOIN "Tags" ON "Products".product_id = "Tags".product_id
        ');


        //Discounts
        $date=date("Y/m/d");
        $discounts = DB::select('
            SELECT *
            FROM "Products" INNER JOIN "Discounts" ON "Products".product_id = "Discounts".product_id
            WHERE "Discounts".begin_date <= ? AND "Discounts".end_date >= ? 
        ', [$date, $date]);

        return view('products.product', ['product' => $product])
            ->with(['images'=> $images,
                    'avg_rating' => $avg_rating,
                    'reviews' => $reviews,
                    'tags' => $tags
            ]);
    }
}
