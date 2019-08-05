@extends('layouts.printHeader')



@section('content')
<center>

	<h1>Completed Orders</h1>
    <br>
    <h3>Total sale : <strong style="color: green;">{{$totalCost}}</strong></h3>

	<table class="sTable">
            <tr>
                <th width="10%">Order Id</th>
                <th width="10%">Order Status</th>
                <th width="10%">Cart Id</th>
                <th width="20%">Date</th>
                <th width="5%">Cost</th>
                <th width="20%">Address</th>
                <th width="15%">Customer Email</th>
            </tr>
            <tbody id="Table">
            @foreach($sales as $sale)
            <tr>
                <td width="10%">{{$sale->id}}</td>
                <td width="10%">{{$sale->oStatus}}</td>
                <td width="15%">{{$sale->cartId}}</td>
                <td width="20%">{{$sale->date}}</td>
                <td width="10%">{{$sale->cost}}</td>
                <td width="20%">{{$sale->address}}</td>
                <td width="15%">{{$sale->cEmail}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

 
</center>
@endsection