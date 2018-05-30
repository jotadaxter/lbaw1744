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
           SELECT "Reviews".rating, "Reviews".comment, "Reviews".review_date, "Users".username, "Users".img, "Users".user_id
           FROM (("Reviews"
           INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id)
           INNER JOIN "Users" ON "SerialKeys".assignment_id = "Users".user_id)
           WHERE "SerialKeys".product_id = ?
           ORDER BY "Reviews".rating DESC;
                   
       ', [$product_id]);

        $avg_rating =0;
        $counter=0;
        //calculate Average Rating
        foreach($reviews as $review){
            $avg_rating+=($review->rating);
            $counter++;
        }
        if($counter>0)
            $avg_rating=round($avg_rating/$counter);
        else{
            $avg_rating = -1;
        }

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

    public function update(Request $request, $product_id)
    {
       
        $product = Product::find($product_id);
        
        
        
        return view('users.profile', ['user' => $user]);
    }
}
