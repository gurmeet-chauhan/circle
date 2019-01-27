@extends('layouts.app')

@section('content')

    <div class="mb-4">
        <form class="form-inline my-2 my-lg-0" method="POST" action="/process">
            @csrf
            <input class="form-control mr-2" type="search" placeholder="Enter name" aria-label="Search" name="input">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    @isset($users)
    <div>                
                                
        
        @if ($users->isEmpty())
            <h2>User does not exist.</h2>
        @else
            <h2 class="mb-4">Search result:</h2>
        @endif

        @foreach ($users as $user)

        <div class="row mb-2">
            <div class="col-md-8">
                <a href="/user/profile/{{ $user->id }}">
                    {{ $user->name }}
                </a>
            </div>
            <div class="col-md-4">
                <a href="/chat/{{ $user->id }}" class="btn btn-primary">
                    Message
                </a>
            </div>
        </div>                        

        <hr>
        @endforeach
    </div>
    @endisset

@endsection