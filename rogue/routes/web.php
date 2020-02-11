<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/profiles/profile', function () {
    return view('profiles/profile');
});

Route::get('/profile/edit', 'ProfilesController@edit')->name('profile.edit');

Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/home', 'HomeController@index')->name('home');




