<?php

namespace App\Http\Controllers;

use App\Follows;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function store(Request $request){

        $user = User::findOrFail(Auth::id());

        $post = new Post();
        $post->user_id = $user->id;

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required',
        ]);

        if(null != $request->image) {
            $path = $request->file('image')->store('images/posts','public');
            $post->image = $path;
        }

        $post->caption = $request->caption;
        $post->save();

        return redirect('posts/'.$post->id);
    }

    public function create(){

        return view('posts.create', [
            'user' => User::findOrFail(Auth::id()),
        ]);
    }

    public function show($id){

        $post = Post::findOrFail($id);

        $followed = Follows::where('user_id', '=' , Auth::id())
            ->where('followed' , '=' , $post->user->id)->exists();

        return view('posts.index', [
            'post' => $post,
            'followed' => $followed,
        ]);
    }

}
