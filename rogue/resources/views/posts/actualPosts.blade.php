@extends('layouts.app')

@section('content')
<div class="container">
   @foreach($posts as $post)
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <a href="/profile/{{ $post->user->id }}">
                                <img src="/storage/{{ $post->user->profile->photo }}" class="rounded-circle w-100" style="max-width: 40px;">
                            </a>
                        </div>
                        <div class="pr-3">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ '@'.$post->user->username }}</span>
                            </a>
                        </div>
                    </div>

                    <hr size="20">

                    <p>

                <span>
                    {{ $post->caption }}
                </span>
                    </p>


                </div>
            </div>
        </div>

       <br><br>


    @endforeach
</div>
@endsection
