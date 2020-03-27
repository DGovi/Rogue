<?php

namespace App\Http\Controllers;

use App\Follows;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{

    public function edit(){

        return view('profiles.edit', [
            'user' => User::findOrFail(Auth::id()),
        ]);
    }

    public function show($user=null){
        if($user==null){
            $user = User::findOrFail(Auth::id());
            $notifications = collect();
            foreach ($user->unreadNotifications->where('type', 'App\Notifications\NewComment') as $notification) {
                $insert = ['type' => 'new_comment',
                    'username' => User::find($notification->data['user_commented'])->username,
                    'post_id' => $notification->data['new_comment'],
                    'url' => '/posts/' . $notification->data['new_comment'] ,
                ];
                $notifications->push($insert);
                $notification->markAsRead();
            }
            foreach ($user->unreadNotifications->where('type', 'App\Notifications\NewFollower') as $notification) {
                $insert = ['type' => 'new_follower',
                    'username' => User::find($notification->data['new_follower'])->username ,
                    'url' => '/profile/' . $notification->data['new_follower'],
                    ];
                $notifications->push($insert);
                $notification->markAsRead();
            }
            //dd($notifications);
            return view('profiles.index', [
                'user' => $user,
                'notifications' => $notifications,
            ]);
        }else {
            $user = User::findOrFail($user);
            $followed = Follows::where('user_id', '=' , Auth::id())
                ->where('followed' , '=' , $user->id)->exists();
            return view('profiles.index', [
                'user' => $user,
                'followed' => $followed,
            ]);
        }
    }

    public function update(Request $request){
        $user = User::findOrFail(Auth::id());
        $profile = $user->profile;

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
        ]);


        if(null != $request->image) {
            $path = $request->file('image')->store('images/profile','public');
            $profile->photo = $path;
        }

        $profile->title = $request->title;
        $profile->save();

        return redirect('profile/'.$user->id);

    }

    public function search(Request $request){
        if(User::where('username', '=', $request->search)->exists()){
            $user = User::where('username', '=', $request->search)->first();
            return redirect('profile/'.$user->id);
        }else{
            return redirect('profile');
        }
    }
}


