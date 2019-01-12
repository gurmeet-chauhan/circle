<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index($id)
    {
        
        $user = User::find($id);
        $userStatues = $user->statuses; 
        return view('Profile', ['user' => $user, 'userStatuses' => $userStatues->sortByDesc('id')]);
    }
}
