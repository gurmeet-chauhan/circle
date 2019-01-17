@extends('layouts.app')


    @section('content')
    <div class="col-md-6 offset-md-3">

        @foreach ($messages->reverse() as $msg)

        @if (auth()->user()->id == $msg->sender_id)
            <div class="card text-white bg-secondary mb-3 float-right" style="width:90%">            
                <div class="card-body">
                        <p class="text-right">
                            {{ $msg->body }}
                            <br>
                            <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                        </p>
                </div>
            </div>    
        @else
            <div class="card text-white bg-primary mb-3" style="width:90%">            
                <div class="card-body">
                        <p class="text-left">
                            {{ $msg->body }}
                            <br>
                            <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                        </p>
                </div>
            </div>
        @endif
                    
        @endforeach    


        <form action="/message" method="post">
            @csrf
            
            @php
                $data = $messages->first()
            @endphp

            <input type="hidden" name="chat_id" value="{{ $data->chat_id }}" >
            <input type="hidden" name="reciever_id" 
                value="{{ auth()->user()->id == $data->sender_id ? $data->reciever_id : $data->sender_id }}">

            <div class="form-group">                

              <textarea class="form-control" name="body" id="message" rows="3" placeholder="write message here..."></textarea>
            </div>

            <input type="submit" class="btn btn-success btn-block text-center" value="send">
        </form>

        <p>{{ $messages->links() }}</p>
    </div>
    @endsection
