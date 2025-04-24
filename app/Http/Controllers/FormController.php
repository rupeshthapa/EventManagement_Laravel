<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register(RegisterFormRequest $registerFormRequest){
        $registerFormRequest->validated();
        return view('auth.register');
    }
}
