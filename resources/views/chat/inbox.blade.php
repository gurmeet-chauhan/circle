@extends('layouts.app')

@section('content')
    <h1>Inbox</h1>

    @if ($chats->isEmpty())
        <p>No chats found.</p>
    @endif

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
                <p>{{ $chat->messages->last()->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach

    {{ $chats->links() }}
    
@endsection