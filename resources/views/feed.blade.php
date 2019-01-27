@extends('layouts.app')

@section('content')

    @foreach ($statuses as $status)
    <div class="card mb-2">
        <div class="card-body">
            <h4>
                <a href="/status/{{ $status->id }}">
                    {{ $status->body }}
                </a>                
            </h4> 
            
            <a href="/user/profile/{{ $status->owner->id }}" class="card-link ">
                {{ $status->owner->name }}
            </a>
            
            @include('partials.likes')
            
        </div>
      </div>
    
    @endforeach

    {{ $statuses->links() }}
    
@endsection