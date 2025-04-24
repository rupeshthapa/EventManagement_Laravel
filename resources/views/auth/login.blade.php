@extends('layouts.layout')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card p-4 shadow-sm">
            <div class="card-body">
                @if (session('register'))
                    <p style="color: green;">{{session('register')}}</p>
                @endif

                @if (session('logout'))
                <p style="color: red;">{{session('logout')}}</p>
            @endif

                <h2 class="card-title text-center fw-bold">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-label">
                        <label for="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('email')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <p class="lead">If you don't have an account <a href="{{ route('rRegister') }}">Register</a></p>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection