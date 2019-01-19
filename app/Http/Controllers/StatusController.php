<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Like;

class StatusController extends Controller
{    

    public function index()
    {        
        $statuses = Status::latest()->simplePaginate(10);
        return view('feed', compact('statuses'));
    }
    
    public function store()
    {
        request()->validate(['body' => 'required']);

        Status::create([
            'body' => request('body'),
            'owner_id' => auth()->user()->id
        ]);
        
        return redirect('home')->with('statusCreated', 'Status updated.');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect('/home')->with('statusDeleted', 'Status deleted.');
    }

    public function like($id)
    {   
        $alreadyLiked = Like::where('user_id', auth()->user()->id)
            ->where('status_id', $id)            
            ->get();

        if(!$alreadyLiked->isEmpty()) {
            abort('429');
        }

        Like::create([
            'user_id' => auth()->user()->id,
            'status_id' => $id,
            'liked' => true
        ]);

        Status::updateLikesCount($id);

        return redirect()->back();
    }
}
