@extends('layouts.app')

@section('content')
    
    <div class="container">
        @if ($users->isEmpty())
            <h2>User does not exist.</h2>
        @else
            <h2 class="mb-4">Search result:</h2>
        @endif
        @foreach ($users as $user)
            <p>
            <a href="/user/profile/{{ $user->id }}">{{ $user->name }}</a>
            <button class="btn btn-primary ml-5">Follow</button>
            </p>

        @endforeach
    </div>

@endsection