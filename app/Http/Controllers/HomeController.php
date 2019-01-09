<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use \App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statuses = User::find(auth()->user()->id)->statuses->sortByDesc('id');
        return view('home', compact('statuses'));
    }

    public function search(Request $request)
    {
        $input = $request->validate(['input' => 'required|min:3|max:64']);        

        $users = User::where ( 'name', 'LIKE', '%' . implode($input) . '%' )->get ();
     
        return view('search', compact('users'));
    }
}
