<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class singleview extends Controller
{
    public function index(Request $request)
    {
    	$product = new Product;

    	$p = $product->where('id', $request->id)->first();

    	return view('singleview')->with(['product' => $p, 
    										'loggedUser' => session('loggedUser')]);

    	//return $request->id;
    }

    public function postCart(Request $request)
    {
    	$product = new Product;

    	$p = $product->where('id', $request->id)->first();

    	return view('singleview')->with(['product' => $p, 
    										'loggedUser' => session('loggedUser')]);

    	//return $request->id;
    }

    public function getCart(Request $request)
    {
    	return view('cart')->with(['loggedUser' => session('loggedUser')]);

    	//return $request->id;
    }
}
