<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('welcome', compact('events'));
    }

    public function edit(string $id){
        $event = Event::find($id);
        return view('auth.edit', compact('event'));
    }
    public function update(Request $request,string $id){
        // dd($request->all());
        $event = Event::find($id);
        $event->update($request->all());
        return redirect()->route('index')->with('update', 'Edit Successful!');

    }
}
