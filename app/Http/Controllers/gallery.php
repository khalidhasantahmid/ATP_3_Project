<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;


class gallery extends Controller
{
    public function index()
    {
    	$product = new Product;

    	$p = $product->orderBy('id', 'desc')->get();
    	$count = $product->count('id');

		//var_dump($count);
    	return view('gallery', ['products' => $p, 
    								'countP' => $count, 
    								'loggedUser' => session('loggedUser')]);
    }

    public function search(Request $request)
    {
        $term = $request->term;

        //echo $term;

        $result = Product::where('name', 'LIKE', '%'.$term.'%')
        ->orWhere('tag', 'LIKE', '%'.$term.'%')
        ->orWhere('description', 'LIKE', '%'.$term.'%')->get();

        //var_dump($result);
        $response = json_decode($result);
        return $response;

        //return redirect()->route('gallery');
    }

    public function searchByTag(Request $request)
    {
        $term = $request->term;
        $product = new Product;
 
        $p = Product::where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('tag', 'LIKE', '%'.$term.'%')
            ->orWhere('description', 'LIKE', '%'.$term.'%')->get();
        $count = $p->count('id');
        
           // echo $p;
        return view('gallery', ['products' => $p, 
                                    'countP' => $count, 
                                    'loggedUser' => session('loggedUser')]);
    }

    public function sort(Request $request)
    {
        $term = $request->term;
        
        if ($term == 'desc') {
            $p = Product::orderBy('price', 'desc')->get();
        } else {
            $p = Product::orderBy('price', 'asc')->get();
        }

        $count = $p->count('id');

        return view('gallery', ['products' => $p, 
                                    'countP' => $count, 
                                    'loggedUser' => session('loggedUser')]);
    }
}
