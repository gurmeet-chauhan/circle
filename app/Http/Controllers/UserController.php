<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Like;

class UserController extends Controller
{
    public function index($id)
    {        
        $user = User::find($id);        
        $statues = $user->statuses;

        $follows = DB::table('followers')
            ->select('user_id')
            ->where('follower', auth()->user()->id)
            ->where('user_id', $id)
            ->get();

        $followers = DB::table('followers')
        ->select('user_id')
        ->where('user_id', $id)
        ->count();


        if($user->id == auth()->user()->id)
            return redirect('home');
        
        return view('user.profile', 
        [
            'user' => $user, 
            'follows' => $follows,
            'followers' => $followers,
            'statuses' => $statues->sortByDesc('id')
        ]);
    }

    public function picture(Request $request)
    {
        
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg|max:5120|required'
        ]);
                
        $resizedImage = Image::make($request->file('profile_picture'))
                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

        if($resizedImage->mime == "image/png") {
            $resizedImage->extension = "png";
        } else {
            $resizedImage->extension = "jpg";
        }

        $image = time(). '.' .$resizedImage->extension;

        $resizedImage->save('images/profile/'. $image);        
        
        $user = User::find(auth()->user()->id);
        $user->profile_picture = $image;
        $user->save();

        return redirect()->back()->with('profilePicUpdated', 'Profile picture changed.');

    }

    public function notifications()
    {                
        $notifications = auth()->user()->unreadNotifications()
                            ->latest()
                            ->get();

        return view('notifications', compact('notifications'));
    }

    public function follow($id)
    {
        DB::table('followers')->insert([
            'user_id' => $id,
            'follower' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    public function unfollow($id)
    {
        $follows = DB::table('followers')
            ->select('user_id')
            ->where('follower', auth()->user()->id)
            ->where('user_id', $id)
            ->delete();

        return redirect()->back();
    }

    public function peoples()
    {
        $peoples = User::latest()->take(100)->paginate(10);
        return view('peoples', compact('peoples'));
    }
}