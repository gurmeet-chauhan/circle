@extends('layouts.app')

@section('content')

    @foreach ($peoples as $user)
            <div class="card-header mb-2">
                <div class="container">
                    <a href="/user/profile/{{ $user->id }}">
                        {{ $user->name }}
                    </a>
                </div>                
            </div>                
    @endforeach

    {{ $peoples->links() }}
@endsection