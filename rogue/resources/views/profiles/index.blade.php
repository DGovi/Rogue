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
                    <div class="card-header">Bio</div>

                    <div class="card-body">
                        {{ $user->profile->title }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Profile Pic</div>

                    <div class="card-body">
                        <img src="/storage/{{ $user->profile->photo }}">
                    </div>
                </div>
                @if (Auth::check() && $user->id != Auth::id() && $followed==false)
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/follow" >
                            @csrf
                            <input type="hidden" name="follow" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary">Follow</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            </div>
        </div>
    </div>
@endsection
