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
            SELECT "Image".img_path
            FROM "Image" INNER JOIN "Products" ON "Image".product_id="Products".product_id       
       ');

        //get reviews
        $reviews=DB::select('
            SELECT "Reviews".sk_id, "Reviews".rating, "Reviews".review_date, "Reviews".comment
            FROM (("Reviews" INNER JOIN "SerialKeys" ON "Reviews".sk_id="SerialKeys".sk_id)
            INNER JOIN "Products" ON "Products".product_id = "SerialKeys".product_id)
            ORDER BY "Reviews".date DESC;
                   
       ');

        $avg_rating =0;
        $counter=0;
        //calculate Average Rating
        foreach($reviews as $review){
            //acc
        }
        $avg_rating=($avg_rating/$counter);


        return view('products.product', ['product' => $product])
            ->with(['images'=> $images, 'avg_rating' => $avg_rating]);
    }
}
