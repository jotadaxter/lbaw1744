<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Product;

class ProductController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $product_id
     * @return Response
     */
    public function show($product_id)
    {
       $product = Product::find($product_id);

     // $this->authorize('show', $product);

      return view('pages.product', ['product' => $product]);
    }
}
