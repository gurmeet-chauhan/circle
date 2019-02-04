<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $followers = DB::table('followers')
            ->select('user_id')
            ->where('user_id', auth()->user()->id)
            ->count();

        $statuses = auth()->user()->statuses()->latest()->simplePaginate(15);
        return view('home', [
            'statuses' => $statuses,
            'followers' => $followers
        ]);
    }

}
