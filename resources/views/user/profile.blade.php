@extends('layouts.app')

@section('content')            
    <div class="card mb-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 my-auto">
                    @if ($user->profile_picture == null)
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle">                           
                    @else
                        <img src="{{ \Storage::url($user->profile_picture) }}" alt="profile picture" class="img-thumbnail img-fluid">
                    @endif                    
                </div>
                <div class="col-md-8 text-center my-auto">
                    <h2>{{ $user->name }}</h2>            
                    <h5>{!! nl2br(e($user->bio)) !!}</h5>
                </div>                
            </div>
            
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