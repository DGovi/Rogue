<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index(){
        if(Auth::check()) {
            $users = auth()->user()->follows()->pluck('followed');
            $posts = Post::whereIn('user_id', $users)->latest()->get();
            return view('feeds.private', compact('posts'));
        }else{
            $posts = Post::all();
            $posts->each(function ($item) {
                $comment_score = ( $item->comments->count() == null ? 0 : $item->comments->count() * 0.5 );
                $time_created = new Carbon($item->created_at);
                $time_score = Carbon::now()->diffInHours($time_created);
                //$like_score
                $time_score > 0 ? $item['score'] = ( ( $comment_score + 0.75) / $time_score ) : $item['score'] = 1 ;
            });
            $posts = $posts->sortByDesc('score');

            return view('welcome', ['posts' => $posts]);
        }
    }

    public function explore(){
        $posts = Post::all()->whereNotIn('user_id', Auth::id());
        $posts->each(function ($item) {
            $comment_score = ( $item->comments->count() == null ? 0 : $item->comments->count() * 0.5 );
            $time_created = new Carbon($item->created_at);
            $time_score = Carbon::now()->diffInHours($time_created);
            //$like_score
            $time_score > 0 ? $item['score'] = ( ( $comment_score + 0.75) / $time_score ) : $item['score'] = 1 ;
        });
        $posts = $posts->sortByDesc('score');

        return view('feeds.public', ['posts' => $posts]);
    }
}
