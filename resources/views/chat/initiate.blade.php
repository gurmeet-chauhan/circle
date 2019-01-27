@extends('layouts.app')

@section('content')
    <form action="/message" method="post">
        @csrf            

        <input type="hidden" name="chat_id" value="{{ $chat_id }}" >
        <input type="hidden" name="reciever_id" value="{{ $reciever_id }}">

        <div class="form-group">                
            <label for="message">Write message</label>              
            <textarea class="form-control" name="body" id="message" rows="3"></textarea>
        </div>

        <input type="submit" class="btn bg-dark text-light btn-block" value="send">
    </form>
@endsection