@extends('layouts.app')

@section('content')
<body id="body_welcome_page">
<div class="container" id="welcome" >
    <div class="row justify-content-center">
        <div class="jumbotron">
            <div align="center" class="display-4">Welcome to Rogue!</div>
            <p class="lead">

                </br>This is a project for SOEN341 made by Killian, James, Daniel, Ashraf and Kaysse
                </br>This a list of our functionalities so far:
                <ul>
                    <li>Registration/Connection</li>
                    <li>Profile</li>
                    <li>Adding pictures</li>
                    <li>Commenting pictures</li>
                    <li>Editing the profile</li>
                </ul>
                Go ahead! Start using our website by creating your profile and posting some amazing pictures!
            </p>
        </div>
    </div>
</div>
 <div id="text_container_welcome">
    <img id="welcome_logo" src="images/Allblack1.png" alt="Logo"/>
 </div>
</body>
@endsection