<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Carts;
use PDF;


class cart extends Controller
{
    public function index()
    {
    	return view('cart', ['loggedUser' => session('loggedUser')]);
    }

    public function placeOrder(Request $request)
    {
        $order = new Order;
        
    	$order->oStatus = 'ordered';
    	$order->cartId = $request->cartId;
    	$order->cost = $request->total;
    	$order->cEmail = session('loggedUser')->email;

    	$order->save();


        if(!empty(session("shoppingCart")))
            {
                $total = 0; 

                foreach(session("shoppingCart") as $keys => $values)
                {
                    $c = new Carts;
                    $c->cartId = $request->cartId;
                    $c->name = $values["item_name"];
                    $c->quantity = $values["item_quantity"];
                    $c->price = $values["item_price"];
                    $c->total = $values["item_quantity"] * $values["item_price"];

                    $c->save();
                }
            }

        return redirect()->route('home');
    }

    public function invoicePrint(Request $request)
     {
        $cartId = $request->cartId;

        $c = Carts::where('cartId', $cartId)->get();
        $total = Carts::where('cartId', $cartId)->sum('total');

        

        if ($request->download == true)
        {
            $pdf = PDF::loadView('invoice', ['carts' => $c, 'cartTotal' => $total, 'cartId' => $cartId]);
            return $pdf->download($cartId.'.pdf');
        } 
        else 
        {
            return view('invoice', ['carts' => $c, 'cartTotal' => $total, 'cartId' => $cartId]);
        }
        
     }
}
