@extends('layouts.layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <div class="card mb-3">
                <div class="card p-4 shadow-sm">
                    @if (session('login'))
                        <p style="color: green;">{{session('login')}}</p>
                    @endif

                    @if (session('event'))
                        <p style="color: green;">{{session('event')}}</p>
                    @endif
                    <h2 class="card-title text-center">Welcome {{Auth::user()->name}}</h2>
                    <a class="text-center" href="{{ route('logout') }}">Logout</a>
                    <form method="POST" action="{{ route('event') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            @error('title')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Starting Time</label>
                            <input type="time" class="form-control" name="starting_time">
                            @error('title')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Ending Time</label>
                            <input type="time" class="form-control" name="ending_time">
                            @error('title')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Add Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Starting Time</th>
        <th scope="col">Ending Time</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($events as $event) 
        <tr>
          <th scope="row">{{ $event->id }}</th>
          <td>{{ $event->title }}</td>
          <td>{{ $event->description }}</td>
          <td>{{ $event->starting_time }}</td>
          <td>{{ $event->ending_time }}</td>
          <td><a href="#">Edit</a></td>
            <td><form>
                <button>Delete</button>
                </form></td>
        </tr>
        @endforeach
    
    </tbody>
  </table>
    
@endsection