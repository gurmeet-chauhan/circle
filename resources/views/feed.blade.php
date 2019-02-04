@extends('layouts.app')

@section('content')

    @if ($statuses->isEmpty())
        <h5 class="card-header">
            No Post found. When you follow somebody you see their recent posts in your feed.            
            <a href="/peoples">Discover peoples.</a>
        </h5>
    @endif

    @include('partials.statuses')

    {{ $statuses->links() }}
    
@endsection