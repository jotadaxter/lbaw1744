<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use VAPOR\Products;

class ProductsController extends Controller
{
    /**
     * Shows all products
     *
     * @return Response
     */
    public function show()
    {

      return view('pages.products');
    }
}