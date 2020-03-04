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
                <div class="pr-5"><strong>{{ $user->numPosts() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->numFollowers() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->numFollowing() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
        </div>
        <div class="col-3 pt-5">
            @if (Auth::check() && $user->id != Auth::id() && $followed==false)
                <form method="post" action="/follow" >
                    @csrf
                    <input type="hidden" name="follow" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">Follow</button>
                </form>
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
</div>
@endsection
