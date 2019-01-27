@extends('layouts.app')

@section('content')            
    <div class="card mb-2">
        <div class="card-header">
            <h2>{{ $user->name }}</h2>            
            <h5>{{ $user->bio }}</h5>
            <hr>
            <a href="/chat/{{ $user->id }}" class="btn btn-primary">Message</a>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h3>Recent posts :</h3>
        </div>
    </div>    
    
    @include('partials.statuses')                        
@endsection