@extends('layouts.printHeader')



@section('content')
<center>

	<h1>User List</h1>

	<table class="sTable">
            <tr>
                <th width="10%">Id</th>
                <th width="25%">Name</th>
                <th width="25%">Phone</th>
                <th width="25%">Email</th>
                <th width="15%">Type</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td width="10%">{{$user->id}}</td>
                <td width="25%">{{$user->name}}</td>
                <td width="25%">{{$user->phone}}</td>
                <td width="25%">{{$user->email}}</td>
                <td width="15%">{{$user->type}}</td>
            </tr>
            @endforeach
        </table>

 
</center>
@endsection