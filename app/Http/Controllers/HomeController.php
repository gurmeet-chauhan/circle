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
        $statuses = auth()->user()->statuses()->latest()->simplePaginate(15);
        return view('home', compact('statuses'));
    }

}
