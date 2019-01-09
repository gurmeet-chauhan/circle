<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{

    public function index()
    {
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
}
