@extends('layouts.app')

@section('content')

    @foreach ($peoples as $user)
        @if (auth()->user()->id != $user->id)
            <div class="row mb-4">
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
        @endif        
    @endforeach

    {{ $peoples->links() }}
@endsection