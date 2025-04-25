<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventDetailsRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function register(RegisterFormRequest $registerFormRequest){
        $registerFormRequest->validated();
       User::create([
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
            'password' => $loginFormRequest['password']])
            ){
            // return redirect()->route('welcomes')->with('login', 'Login Successful!');
            return to_route('index')->with('login', 'Login Successful!');
        }
      
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('logout', 'Logout Successful!');
    }

    public function event(EventDetailsRequest $eventDetailsRequest){
        $eventDetailsRequest->validated();
        Event::create([
            'title' => $eventDetailsRequest['title'],
            'description' => $eventDetailsRequest['description'],
            'starting_time' => $eventDetailsRequest['starting_time'],
            'ending_time' => $eventDetailsRequest['ending_time']
        ]);
        return redirect()->route('welcome')->with('event', 'Event details added!');
    }
}
