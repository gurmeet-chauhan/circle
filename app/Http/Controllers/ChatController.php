<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\MessageSent;
use App\Chat;
use App\Message;

class ChatController extends Controller
{
    
    public function inbox()
    {
        $chats = Chat::where('initiator_id', auth()->user()->id)
            ->orWhere('recipient_id', auth()->user()->id)
            ->orderBy('updated_at', 'desc')
            ->simplePaginate(10);

        return view('chat.inbox', compact('chats'));
    }
    
    public function messages($id)
    {
        $messages = Chat::getMessages($id);
        return view('chat.messages', compact('messages'));        
    }

    public function send(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $message = Message::create([
            'sender_id' => auth()->user()->id,
            'reciever_id' => $request->reciever_id,
            'chat_id' => $request->chat_id,
            'body' => $request->body
        ]);

        $chat = Chat::find($request->chat_id);
        $chat->update(['updated_at' => $message->created_at]);

        broadcast(new MessageSent($message))->toOthers();

        return redirect('messages/'.$request->chat_id);
    }

    public function start($id)
    {        

        $chat = Chat::withUserId($id);
        if($chat->isEmpty()){

            $newChat = Chat::create([
                'initiator_id' => auth()->user()->id,
                'recipient_id' => $id,
            ]);

            Message::create([
                'sender_id' => auth()->user()->id,
                'reciever_id' => $id,
                'chat_id' => $newChat->id,
                'body' => "Connected"
            ]);
            
            return redirect('messages/'.$newChat->id);

        } else {
            return redirect('messages/'.$chat->first()->id);
        }                    
    }
}
