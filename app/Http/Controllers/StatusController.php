<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Like;

class StatusController extends Controller
{

    public function index()
    {
        if(!auth()->check()){
            return redirect('login');
        }
        $statuses = Status::latest()->get();
        return view('welcome')->with('statuses', $statuses);
    }
    
    public function store()
    {
        Status::create([
            'body' => request('body'),
            'owner_id' => auth()->user()->id
        ]);
        
        return redirect('home');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect('/home');
    }

    public function like($id)
    {

        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->status_id = $id;
        $like->liked = true;
        $like->save();
     
        $status = Status::find($id);
        $status->likes +=1;
        $status->save();
         return redirect()->back();
    }
}
