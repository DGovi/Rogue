@extends('layouts.app')

@section('content')
<div class="container">
    {{ Auth::user()->name }}<br>
	<img src="/storage/{{ Auth::user()->profile->photo }}" height="200" width="200">
</div>
@endsection
