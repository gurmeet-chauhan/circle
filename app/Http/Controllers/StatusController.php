<?php

namespace App\Http\Controllers;

use App\Notifications\StatusLiked;
use App\Status;
use App\Like;
use App\Comment;

class StatusController extends Controller
{    

    public function index()
    {        
        $statuses = Status::latest()->simplePaginate(10);
        return view('feed', compact('statuses'));
    }

    public function show(Status $status)
    {
        $comments = $status->comments()
                        ->latest()
                        ->get();

        return view('statuses.show',[
            'comments' => $comments,
            'status' => $status
        ]);
    }
    
    public function store()
    {
        request()->validate([
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120|nullable'
        ]);

        $path = null;

        if(request()->has('image')) {
            $path = request()->file('image')
                        ->store('/public/images/status');
        }        

        Status::create([
            'body' => request('body'),
            'image' => $path,
            'owner_id' => auth()->user()->id
        ]);
        
        return redirect('home')->with('statusCreated', 'Status updated.');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->back()->with('statusDeleted', 'Status deleted.');
    }

    public function like($id)
    {   
        $status = Status::find($id);
        $alreadyLiked = Like::where('user_id', auth()->user()->id)
            ->where('status_id', $id)            
            ->get();

        if(!$alreadyLiked->isEmpty()) {
            abort('429');
        }

        $like = Like::create([
            'user_id' => auth()->user()->id,
            'status_id' => $id,
            'liked' => true
        ]);        

        if ($status->owner->id != auth()->user()->id)
            $status->owner->notify(new StatusLiked($like->id));

        return redirect()->back();
    }
}
