<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function register(RegisterFormRequest $registerFormRequest){
        $registerFormRequest->validated();
        User::create(
            [
                'name' => $registerFormRequest['name'],
                'email' => $registerFormRequest['email'],
                'password' => Hash::make($registerFormRequest['password'])
            ]);
        return redirect()->route('login')->with('register', 'Registration Successful!');
    }

    public function login(LoginFormRequest $loginFormRequest){
        $loginFormRequest->validated();

        if(Auth::attempt([
            'email' => $loginFormRequest['email'],
            'password' => $loginFormRequest['password']
            ])) {
            return redirect()->route('welcome')->with('login', 'Login Succesful!');
        }
    }
}
