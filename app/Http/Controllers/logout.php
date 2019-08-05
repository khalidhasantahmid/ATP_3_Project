<?php

namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;


class logout extends Controller
{
    public function sessionRemove()
    {
    	session()->flush();
    	session_destroy();

		//var_dump($count);
    	return redirect()->route('gallery');
    }
}
