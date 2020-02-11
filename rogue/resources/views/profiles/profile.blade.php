@extends('profiles.layouts.index')

@section('content')



<div class="container">
    <h2 class="profiletitle">{{ Auth::user()->name }}'s Profile</h2>
    <div class="image_container">
    	<!--loop array of images here-->
    	<!--foreach (images as image)-->
			<div class="wrapper">
				<img class="images" src="" />          
			</div>
		<!--endforeach-->
	</div>
</div>
@endsection
