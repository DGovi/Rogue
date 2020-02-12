<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'comment' => 'required',
        ]);
    }


}
