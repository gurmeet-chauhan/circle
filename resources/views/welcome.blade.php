@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($statuses as $status)
    <h5>{{ $status->body }}</h5> {{ $status->owner->name}}
    <p><i class="fas fa-heart"></i> {{ $status->likes }} &nbsp;&nbsp;
        {{ $status->created_at->diffForHumans() }}
    </p>
    <hr>
    @endforeach
</div>
    
@endsection