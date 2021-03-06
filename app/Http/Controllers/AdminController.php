<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use VAPOR\Product;
use VAPOR\User;

class AdminController extends Controller
{
    function showAdminPage(){

        $users = USER::all();

        return view('admin.users')
            ->with('users', $users);
    }

    function showAdminPageUsers(){

        $users = USER::all();

        return view('admin.users')
            ->with('users', $users);
    }

    function showAdminPageProducts(){
        $products = Product::all();

        return view('admin.products')
            ->with('products', $products);

    }

    function removeProductAdmin($product_id) {
        
        $product = Product::find($product_id);
        $product->hidden = true;
        $product->save();
        $products = Product::all();

        return view('admin.products')
            ->with('products', $products);

    }
}
