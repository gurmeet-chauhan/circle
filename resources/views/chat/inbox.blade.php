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

        @if ($chat->messages->last()->reciever_id == auth()->user()->id && $chat->messages->last()->read != true)
            <div class="card mb-4 bg-primary">
                <div class="card-body"> 
                    @if ($chatInitiator == auth()->user())
                        <a href="/messages/{{ $chat->id }}" class="text-white">
                            {{ $chatRecipient->name }}
                        </a>    
                    @else
                        <a href="/messages/{{ $chat->id }}" class="text-white">
                            {{ $chatInitiator->name }}
                        </a>
                    @endif
                    <div>
                        <small>
                            {{ $chat->messages->last()->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            </div>    
        @else
            <div class="card mb-4">
                <div class="card-body"> 
                    @if ($chatInitiator == auth()->user())
                        <a href="/messages/{{ $chat->id }}">
                            {{ $chatRecipient->name }}
                        </a>    
                    @else
                        <a href="/messages/{{ $chat->id }}">
                            {{ $chatInitiator->name }}
                        </a>
                    @endif
                    <div>
                        <small>
                            {{ $chat->messages->last()->created_at->diffForHumans() }}
                        </small>
                    </div>                
                    
                </div>
            </div>
        @endif
            
    @endforeach

    {{ $chats->links() }}
    
@endsection