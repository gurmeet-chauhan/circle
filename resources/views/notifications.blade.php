@extends('layouts.app')

@section('content')

    @if ($notifications->isEmpty())
        <h5>No new notification here.</h5>
    @else
        <h3 class="card-header mb-2">
            All notifications will be deleted when you leave this page.
        </h3>
        
        @foreach ($notifications as $notification)                            
            
            <div class="card mb-2">
                <div class="card-body">

                    @if ($notification->type == "App\Notifications\StatusLiked" )
                    @php
                        $like = App\Like::find($notification->data['like_id']);
                        $user = App\User::find($like->user_id);
                    @endphp
                        <h5>
                            <a href="/user/profile/{{$user->id}}" target="_blank">
                                {{ $user->name }}
                            </a>
                            liked your
                            <a href="/status/{{ $like->status_id }}" target="_blank">
                                status
                            </a>
                            .
                        </h5>    
                    @else
                    @php
                        $comment = App\Comment::find($notification->data['comment_id']);
                        $user = App\User::find($comment->user_id);
                    @endphp
                        <h5>
                            <a href="/user/profile/{{$user->id}}" target="_blank">
                                {{ $user->name }}
                            </a>
                            commented on your 
                            <a href="/status/{{ $comment->status_id }}" target="_blank">
                                status
                            </a>
                            .
                        </h5>
                    @endif
                    
                    <small class="text-muted">
                        {{ $notification->created_at->diffForHumans() }}
                    </small>
                    
                </div>
            </div>
        @endforeach
    @endif

@endsection

@php
    auth()->user()->notifications()->delete();
@endphp