@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3">
        <h1>Inbox</h1>

        @foreach ($chats as $chat)
            
            @php
                $chatRecipient = auth()->user()::find($chat->recipient_id);
                $chatInitiator = auth()->user()::find($chat->initiator_id);
            @endphp

            <div class="card mb-4">
                <div class="card-body">
                    @if ($chatInitiator == auth()->user())
                        <a href="/messages/{{ $chat->id }}">{{ $chatRecipient->name }}</a>    
                    @else
                        <a href="/messages/{{ $chat->id }}">{{ $chatInitiator->name }}</a>
                    @endif
                    <p>{{ $chat->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach

        {{ $chats->links() }}
        
    </div>
@endsection