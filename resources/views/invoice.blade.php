@extends('layouts.printHeader')



@section('content')
<center>

	<h1>Invoice</h1>

<br>

<h2>ID: {{$cartId}}</h2>
	<table class="sTable" style="width: 100%; border-collapse: collapse; " border="2">
            <tr>
                <th width="10%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="10%">Price</th>
                <th width="10%">Total</th>
            </tr>
            @foreach($carts as $cart)
            <tr>
                <td width="10%">{{$cart->name}}</td>
                <td width="10%">{{$cart->quantity}}</td>
                <td width="15%">{{$cart->price}}</td>
                <td width="20%">{{$cart->total}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total : </strong></td>
                <td>{{$cartTotal}}</td>
            </tr>
        </table>
<br>
<div align="left">
    
    <?php
    //echo date("Y-m-d H:i:s");

    $date = date("Y-m-d H:i:s");
    $newdate = strtotime ( '+6 hour' , strtotime ( $date ) ) ;
    $newdate = date ( 'Y-m-d H:i:s' , $newdate );

    echo $newdate;
?>

</div>
<br>

<a href="{{route('print.invoice', ['cartId' => $cartId, 'download' => true ])}}" class="button">Download</a>


</center>
@endsection