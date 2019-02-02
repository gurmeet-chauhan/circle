<?php

namespace App\Http\Controllers;

use App\Status;
use App\Comment;
use App\Notifications\CommentAdded;

class CommentController extends Controller
{

    public function store($statusId)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $comment = Comment::create([
            'body' => request('body'),
            'status_id' => $statusId,
            'user_id' => auth()->user()->id
        ]);

        $status = Status::find($statusId);
        if ($status->owner->id != auth()->user()->id)
            $status->owner->notify(new CommentAdded($comment->id));

        return redirect()->back();
    }

}
