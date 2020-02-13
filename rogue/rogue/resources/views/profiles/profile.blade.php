@extends('profiles.layouts.index')

@section('content')



<div class="container">
	<h3 class="profiletitle">{{ Auth::user()->name }}</h3>
	<div class="profile d-flex justify-content-center">
		<div class="pr-4">
			<h5><strong>0</strong> posts</h5>
		</div>
		<div class="pr-4">
			<h5><strong>0</strong> followers</h5>
		</div>
		<div class="pr-4">
			<h5><strong>0</strong> following</h5>
		</div>
	</div>
	<div class="profilebio d-flex justify-content-center">
		<div><em>"No worries, you will soon be able to edit your own bio"</em></div>
	</div>
	<div>
		<div class="profile-pic">
			<img class="rounded-circle" src="/storage/{{ Auth::user()->profile->photo }}" height="130" width="130" />
		</div>
		<!--loop array of images here-->
		<!--foreach (images as image)-->
		<div class="image_container">
			
		</div>
		<!--endforeach-->
	</div>
</div>
@endsection