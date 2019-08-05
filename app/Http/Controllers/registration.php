<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\User;

class registration extends Controller
{
    public function index(Request $request)
    {
    	return view('registration');
    }

    public function register(UserRequest $request)
    {
        $validated = $request->validated();
        
    	$user = new User;

    	$user->name = $request->name;
    	$user->phone = $request->number;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->type = 'customer';

    	$user->save();

    	return redirect()->route('login');
    }
}
