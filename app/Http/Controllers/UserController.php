<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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
            // 'dp' => $dp, 
            'statuses' => $statues->sortByDesc('id')
        ]);
    }

    public function update(Request $request)
    {
        
        $request->validate(['profile_picture' => 'image|mimes:jpeg,png,jpg|max:5120|required']);
        
        $path = $request->file('profile_picture')->store('/public/images/profile');        

        $user = User::find(auth()->user()->id);
        $user->profile_picture = $path;
        $user->save();

        return redirect()->back()->with('profilePicUpdated', 'Profile picture changed.');

    }
}