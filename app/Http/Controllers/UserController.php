<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index($id)
    {        
        $user = User::find($id);
        $statues = $user->statuses; 

        if($user->id == auth()->user()->id)
            return redirect('home');
        
        return view('user.profile', 
        [
            'user' => $user, 
            'statuses' => $statues->sortByDesc('id')
        ]);
    }
}