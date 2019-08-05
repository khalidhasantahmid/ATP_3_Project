@extends('layouts.printHeader')



@section('content')
<center>

	<h1>Product List</h1>

	<table class="sTable">
            <tr>
                <th width="5%">Product Id</th>
                <th width="15%">Product Name</th>
                <th width="10%">Price</th>
                <th width="15%">Product Detail</th>
                <th width="25%">Image</th>
                <th width="15%">Added Date</th>
                <th width="15%">Added By</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td width="5%">{{$product->id}}</td>
                <td width="15%">{{$product->name}}</td>
                <td width="10%">{{$product->price}}</td>
                <td width="15%">{{$product->description}}</td>
                <td width="25%"><img src="/assets/img/{{$product->path}}" style="width: 80px; height: 100px;"></td>
                <td width="15%">{{$product->addedDate}}</td>
                <td width="15%">{{$product->addedBy}}</td>
            </tr>
            @endforeach
        </table>

 
</center>
@endsection