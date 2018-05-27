<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

use VAPOR\Product;

class SearchController extends Controller
{
 use Searchable;
    /**
     * Shows all products
     *
     * @return Response
     */
    public function showProductSearch(Request $request)
    {
        $search = $request->input('search');

        /*$db_input = '%'.$search.'%';

        $result = DB::select('
            select "Products".name, "Products".price, "Products".description
            , "Products".release_date, "Products".logo_path, "Products".operating_system
            from "Products"
            where "Products".name LIKE ?
            order by "Products".name asc;
            
            '
        , [$db_input]);

        $products = DB::select('
            select distinct * 
            from "Products"
            where "Products".name LIKE ? OR "Products".operating_system LIKE ? 
            order by "Products".name asc, "Products".price ASC ;
            
            '
            , [$db_input, $db_input]);*/


        if($request->has('search')){
            $products = Product::search($request->search)
                ->paginate(4);
        }else{
            $products = Product::paginate(4);
        }


        return view('products.search')
            ->with(['products' => $products,
                'old_value' => $search]);
    }


}
