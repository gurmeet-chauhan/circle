<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function search()
    {
        return view('search');
    }

    public function process(Request $request)
    {
        $username = $request->validate([
                'input' => 'required|min:3|max:64'
            ]);        
        
        $users = User::where (
            'name', 'LIKE', '%' . implode($username) . '%'
        )->get ();
     
        return view('search', compact('users'));
    }
}
