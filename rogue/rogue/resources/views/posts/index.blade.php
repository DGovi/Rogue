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
            </div>
        </div>
    </div>
    </div>
@endsection
