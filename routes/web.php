<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('client','ClientController');
Route::get('/home',['as' => 'home' , 'uses' => 'HomeController@index']);
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
//compose routes
Route::get('compose', 'ComposeController@getcompose');
Route::post('compose', 'ComposeController@postcompose');
