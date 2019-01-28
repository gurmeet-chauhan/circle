@extends('layouts.app')

@section('content')

    @include('partials.statuses')

    {{ $statuses->links() }}
    
@endsection