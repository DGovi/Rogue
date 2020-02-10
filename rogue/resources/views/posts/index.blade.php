@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Photo</div>

                    <div class="card-body">
                        <img src="/storage/{{ $post->image }}">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Caption</div>

                    <div class="card-body">
                        {{ $post->caption }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Username of OP</div>

                    <div class="card-body">
                        {{ $post->user->username }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
