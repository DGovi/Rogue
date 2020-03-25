@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pt-5">
            <img src="/storage/{{ $user->profile->photo }}" class="rounded-circle w-100">
        </div>
        <div class="col-6 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h2">{{ $user->username }}</div>
                </div>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->numPosts() }} posts</strong></div>
                <div class="pr-5"><strong>{{ $user->numFollowers() }} followers</strong></div>
                <div class="pr-5"><strong>{{ $user->numFollowing() }} following</strong></div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
        </div>
        <div class="col-3 pt-5">
            @if (Auth::check() && $user->id != Auth::id() && $followed==false)
                <form method="post" action="/follow" >
                    @csrf
                    <input type="hidden" name="follow" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary btn-block mb-2 ">Follow</button>
                </form>
            @elseif (Auth::check() && $user->id != Auth::id() && $followed)
                <form method="post" action="/unfollow" >
                    @csrf
                    <input type="hidden" name="unfollow" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary btn-block mb-2 ">Unfollow</button>
                </form>
            @elseif (Auth::check() && $user->id == Auth::id())
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block mb-2 ">Logout</button>
                </form>
                    <a href="/profile/edit" class="btn btn-primary btn-block mb-2 ">Edit Profile</a>
            @endif
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/posts/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>

    Notifications Comments :
    <br>
    @if (Auth::check() && $user->id == Auth::id())
        @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewComment') as $notification)
            A new comment on post : {{ $notification->data['new_comment'] }} <br>
            by user : {{ $notification->data['user_commented'] }}
            {{ $notification->markAsRead() }}
            <br>
        @endforeach
    @endif

    Notifications Follow :
    <br>
    @if (Auth::check() && $user->id == Auth::id())
        @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewFollower') as $notification)
            A new follower: {{ $notification->data['new_follower'] }}
            {{ $notification->markAsRead() }}
            <br>
        @endforeach
    @endif

</div>
@endsection
