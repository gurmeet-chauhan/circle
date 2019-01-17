@extends('layouts.app')

@section('content')

<div class="col-md-6 offset-md-3">
    @foreach ($statuses as $status)
    <div class="card mb-4">
        <div class="card-body">
            <h5>{{ $status->body }}</h5> 
            
            <a href="/user/profile/{{ $status->owner->id }}" class="card-link ">
                {{ $status->owner->name }}
            </a>
            
            @include('partials.likes')
            
        </div>
      </div>
    
    @endforeach

    {{ $statuses->links() }}
</div>
    
@endsection