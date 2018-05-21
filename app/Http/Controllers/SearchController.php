<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use VAPOR\Product;

class SearchController extends Controller
{
    /**
     * Shows all products
     *
     * @return Response
     */
    public function showProductSearch(Request $request)
    {
        $search = $request->input('search');

        $db_input = '%'.$search.'%';

        $result = DB::select('
            select "Products".name, "Products".price, "Products".description
            , "Products".release_date, "Products".logo_path, "Products".operating_system
            from "Products"
            where "Products".name LIKE ?
            order by "Products".name asc;
            
            '
        , [$db_input]);
/*
        $result = DB::select('
            select distinct * from "Products"
            from "Products"
            where "Products".name LIKE ? AND "Products".operating_system LIKE ?
            AND "Products".release_date LIKE ? AND "Products".price LIKE ?
            order by "Products".name asc, "Products".price ASC ;
            
            '
            , [$db_input, $db_input, $db_input, $db_input]);

*/
        $products = json_encode($result);

        foreach($products as $product){
            $product->logo_path='<a href="' . route('product', ['product_id' => $product->product_id]) . '"><img alt="' . $product->name .
                '" src="/uploads/product_images/' . $product->logo_path .  '" width="30"></a>';
        }

        return view('products.search')
            ->with(['products' => $products,
                'old_value' => $search]);
    }

    public function showCart()
    {
        return view('cart');
    }
}