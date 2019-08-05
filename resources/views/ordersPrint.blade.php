@extends('layouts.printHeader')



@section('content')
<center>

	<h1>Order List</h1>

	<table class="sTable">
            <tr>
                <th width="10%">Order Id</th>
                <th width="10%">Order Status</th>
                <th width="15%">Cart Id</th>
                <th width="20%">Date</th>
                <th width="5%">Cost</th>
                <th width="20%">Address</th>
                <th width="15%">Customer Email</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td width="10%">{{$order->id}}</td>
                <td width="10%">{{$order->oStatus}}</td>
                <td width="15%">{{$order->cartId}}</td>
                <td width="20%">{{$order->date}}</td>
                <td width="10%">{{$order->cost}}</td>
                <td width="20%">{{$order->address}}</td>
                <td width="15%">{{$order->cEmail}}</td>
            </tr>
            @endforeach
        </table>

 
</center>
@endsection