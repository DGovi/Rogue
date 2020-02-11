@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Name</div>

                    <div class="card-body">
                        {{ $user->username }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Email</div>

                    <div class="card-body">
                        {{ $user->email }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Title of profile</div>

                    <div class="card-body">
                        {{ $user->profile->title }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Title of profile</div>

                    <div class="card-body">
                        <img src="/storage/{{ $user->profile->photo }}">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
