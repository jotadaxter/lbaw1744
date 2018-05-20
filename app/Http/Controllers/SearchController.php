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

        $result = DB::select('
            select "Products".name, "Products".price, "Products".description
            , "Products".release_date, "Products".logo_path, "Products".operating_system
            from "Products"
            where "Products".name LIKE ?
            order by "Products".name asc;
            
            '
        , ['%'.$search.'%']);


        return view('products.search')
            ->with(['products' => json_encode($result),
                'old_value' => $search]);
    }

    public function showCart()
    {
        return view('cart');
    }
}