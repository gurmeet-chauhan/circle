<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use \App\User;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $statuses = User::find(auth()->user()->id)
            ->statuses
            ->sortByDesc('id');

        return view('home', compact('statuses'));
    }

}
