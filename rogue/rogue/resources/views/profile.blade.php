@extends('layouts.app')

@section('content')
<div class="container">
    {{ Auth::user()->name }}<br>
	<img src="/storage/{{ Auth::user()->profile->photo }}" height="130" width="130">
</div>
@endsection
