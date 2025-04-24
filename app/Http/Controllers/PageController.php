<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function routeRegister(){
        return view('auth.register');
    }

    public function routeLogin(){
        return view('auth.login');
    }
}
