<?php

namespace App\Http\Controllers;

use App\Follows;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request)
    {

        $user = User::findOrFail(Auth::id());
        $follow = new Follows();
        $follow->user_id = $user->id;

        if (null != $request->follow) {
            $follow->followed = $request->follow;
        }

        $follow->save();

        return redirect('profile/'.$request->follow);
    }

}
