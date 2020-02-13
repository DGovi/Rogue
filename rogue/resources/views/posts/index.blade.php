@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Photo uploaded by {{ $post->user->username }}</div>

                    <div class="card-body">
                        <img src="/storage/{{ $post->image }}" height="200px" width="200px">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Caption</div>

                    <div class="card-body">
                        {{ $post->caption }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Post a Comment</div>

                    <div class="card-body">
                        @if (Auth::check())

                        <form method="post" action="/comments" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">Create a new comment</label>

                            <div class="col-md-6">
                                <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autofocus>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Post Comment
                                </button>
                            </div>
                        </div>
                        </form>
                        @else
                            Login or Register to post a comment!
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Previous Comments</div>
                    <div class="card-body">
                        @foreach($post->comments as $comment)

                            {{ $comment->user->username }} :

                            {{ $comment->comment }}

                            <br />

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
