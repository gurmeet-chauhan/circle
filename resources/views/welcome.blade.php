@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($statuses as $status)
    <h5>{{ $status->body }}</h5> {{ $status->owner->name}}
    <p>
            
        @if (auth()->user()->likes->where('status_id', $status->id)->first())
            <i class="fas fa-heart text-danger"></i>    
        @else
            <a href="/like/{{ $status->id }}">
                <i class="fas fa-heart"></i>
            </a>
        @endif
         {{ $status->likes }} 
        &nbsp;&nbsp;
        {{ $status->created_at->diffForHumans() }}
    </p>
    <hr>
    @endforeach
</div>
    
@endsection