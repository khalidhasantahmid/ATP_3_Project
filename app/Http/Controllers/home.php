<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

use App\Product;
use App\User;
use App\Order;
use App\Address;
use App\Carts;



class home extends Controller
{
    public function index()
    {
    	$products = new Product;
    	$users = new User;
    	$orders = new Order;

    	//var_dump($sum);

        if(session('loggedUser') != null)
        {
            /*$users = DB::table('orders')
            ->join('addresses', 'orders.cEmail', '=', 'addresses.email')
            ->select('orders.*', 'addresses.address')
            ->get();*/

            if (session('loggedUser')->type == "admin")
            {
                $p = $products->orderBy('id', 'desc')->get();
                $u = $users->where('type', 'customer')->orderBy('id', 'desc')->get();

                //$o = $orders->orderBy('id', 'desc')->get();
                $o = DB::table('orders')->join('addresses', 'orders.cEmail', '=', 'addresses.email')
                                        ->select('orders.*', 'addresses.address')
                                        ->where('oStatus', 'ordered')
                                        ->orderBy('id', 'desc')
                                        ->get();

                $s = $orders->where('oStatus', 'completed')->orderBy('id', 'desc')->get();
                $sum = $orders->where('oStatus', 'completed')->sum('cost');
               
                return view('admin', ['products' => $p, 
                                'product' => null, 
                                'users' => $u, 
                                'orders' => $o, 
                                'sales' => $s, 
                                'totalCost' => $sum, 
                                'loggedUser' => session('loggedUser')]);
            }
            else 
            {
                $a = Address::where('email', session('loggedUser')->email)->first();
                //$o = $orders->where('cEmail', session('loggedUser')->email)->orderBy('id', 'desc')->get();
                $o = DB::table('orders')->where('cEmail', session('loggedUser')->email)
                                        ->join('addresses', 'orders.cEmail', '=', 'addresses.email')
                                        ->select('orders.*', 'addresses.address')
                                        ->orderBy('id', 'desc')
                                        ->get();

                return view('customer', ['loggedUser' => session('loggedUser'), 
                                            'orders' => $o,
                                            'address' => $a]);
            }
            
        }
        else
        {
            return redirect()->route('gallery');
        }	
    }

    public function addProduct(Request $request)
    {
        $p = new Product;

        $p->name = $request->pName;
        $p->path = $request->image;
        $p->price = $request->pPrice;
        $p->tag = $request->pTag;
        $p->description = $request->pDetail;
        $p->addedBy = session('loggedUser')->email;

        $p->save();

        return redirect()->route('home');
    }

    public function editProduct(Request $request)
    {
        $users = new User;
        $orders = new Order;

        $p = Product::find($request->id);

        $u = $users->where('type', 'customer')->orderBy('id', 'desc')->get();
        $o = $orders->orderBy('id', 'desc')->get();
        $s = $orders->where('oStatus', 'completed')->orderBy('id', 'desc')->get();
        $sum = $orders->where('oStatus', 'completed')->sum('cost');
               
                return view('admin', ['products' => null, 
                                'product' => $p, 
                                'users' => $u, 
                                'orders' => $o, 
                                'sales' => $s, 
                                'totalCost' => $sum, 
                                'loggedUser' => session('loggedUser')]);
    }

    public function updateProduct(Request $request)
    {
        $p = Product::find($request->id);

        $p->name = $request->ppName;
        $p->price = $request->ppPrice;
        $p->tag = $request->ppTag;
        $p->description = $request->ppDetail;

        $p->save();

        return redirect()->route('home');
    }

    public function deleteProduct(Request $request)
    {
        $p = Product::find($request->id);

        $p->forceDelete();;

        return redirect()->route('home');
    }

    public function orderStatus(Request $request)
    {
        $o = Order::find($request->id);

        $o->oStatus = 'completed';

        $o->save();

        return redirect()->route('home');
    }

    public function orderDelete(Request $request)
    {
        $o = Order::find($request->id);

        $o->forceDelete();;

        return redirect()->route('home');
    }

    public function updateUserAddress(Request $request)
    {
        $a = Address::find($request->id);

        $a->address = $request->address;

        $a->save();

        return redirect()->route('home');
    }

    public function updateUserInfo(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed'
        ]);

        $u = User::find($request->id);

        $u->name = $request->cName;
        $u->phone = $request->cNumber;
        $u->email = $request->email;
        $u->password = $request->password;

        $u->save();

        return redirect()->route('home');
    }

    public function deleteUser(Request $request)
    {
        $u = User::find($request->id);

        $u->forceDelete();;

        return redirect()->route('home');
    }

    public function ordersPrint()
     {
        $order = DB::table('orders')->join('addresses', 'orders.cEmail', '=', 'addresses.email')
                                        ->select('orders.*', 'addresses.address')
                                        ->where('oStatus', 'ordered')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return view('ordersPrint')->with('orders', $order);;
     }

     public function productsPrint()
     {
        $p = Product::orderBy('id', 'desc')->get();

        return view('productsPrint')->with('products', $p);;
     }

     public function usersPrint()
     {
        $u = User::where('type', 'customer')->orderBy('id', 'desc')->get();

        return view('usersPrint')->with('users', $u);;
     }

     public function profitPrint()
     {
        $s = Order::where('oStatus', 'completed')->orderBy('id', 'desc')->get();
        $sum = Order::where('oStatus', 'completed')->sum('cost');

        return view('profitPrint', ['sales' => $s, 
                                'totalCost' => $sum]);
     }

}
