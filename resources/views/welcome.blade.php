@extends('layouts.layout')

@section('content')
    <h2>Welcom</h2>
    @if (session('login'))
        <p style="color: green;">{{session('login')}}</p>
    @endif
    
@endsection