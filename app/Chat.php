<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = [];
    
    public function initiator()
    {
        return $this->belongsTo(User::class);
    }
    
    public function recipient()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public static function withUserId($id) 
    {
        $chat = Chat::where('initiator_id', auth()->user()->id)
            ->where('recipient_id', $id)
            ->OrWhere('recipient_id', auth()->user()->id)
            ->where('initiator_id', $id)
            ->get();
        return $chat;                    
    }

    public static function getMessages($id)
    {
        $chat = Chat::find($id);

        if($chat == null)
            abort('404');

        if($chat->initiator_id == auth()->user()->id 
                || $chat->recipient_id == auth()->user()->id)
        {
            return Message::where('chat_id', $id)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);
        }
        else
        {
            return redirect()->back();
        }
    }
}
