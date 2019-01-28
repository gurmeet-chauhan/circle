<?php

namespace App\Http\Controllers;

use App\Comment;

class CommentController extends Controller
{

    public function store($status)
    {
        request()->validate([
            'body' => 'required'
        ]);

        Comment::create([
            'body' => request('body'),
            'status_id' => $status,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }

}
