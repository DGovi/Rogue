<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function private(){
        $users = auth()->user()->follows()->pluck('followed');
        $posts = Post::whereIn('user_id', $users)->latest()->get();
        return view('posts.actualPosts', compact('posts'));
    }

    public function public(){
        $posts = Post::all();
        $posts->each(function ($item) {
            $comment_score = ( $item->comments->count() == null ? 0 : $item->comments->count() * 0.5 );
            $time_created = new Carbon($item->created_at);
            $time_score = Carbon::now()->diffInHours($time_created);
            //$like_score
            $time_score > 0 ? $item['score'] = ($comment_score / $time_score ) : $item['score'] = 1 ;
        });

        $posts = $posts->sortByDesc('score');

        return view('feeds.public', ['posts' => $posts]);
    }
}
