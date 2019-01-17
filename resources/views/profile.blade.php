@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mb-2">
                <div class="card-header">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->bio }}</p>
                    <a href="/chat/{{ $user->id }}" class="btn btn-primary">Message</a>
                </div>
            </div>

            <h3>Recent</h3>
            
            @include('partials.statuses')
                
        </div>
    </div>
</div>             
            
@endsection