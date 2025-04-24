@extends('layouts.layout')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
        <div class="card p-4 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center fw-bold">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="form-label">Username</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email">
                    @error('email')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <p class="lead text-center">If you have an account <a href="{{ route('rLogin') }}">Register</a></p>
            </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection