@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mb-4">
                <div class="card-header">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->bio }}</p>
                    <button class="btn btn-primary">Follow</button>
                </div>
            </div>


            
                @foreach ($userStatuses as $status)
                    <div class="card">
                        <div class="card-header">
                            <p>{{ $status->body }}</p>
                            <p><i class="fas fa-heart"></i> {{ $status->likes }} &nbsp;&nbsp;{{ $status->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach
                
        </div>
    </div>
</div>             
            
@endsection