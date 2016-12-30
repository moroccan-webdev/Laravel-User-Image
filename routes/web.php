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
Route::resource('client','ClientController',['except'=> ['edit'],['update']]);
Route::resource('message','MessageController',['except'=> ['edit']]);
Route::get('/home',['as' => 'home' , 'uses' => 'HomeController@index']);
//route for chartjs
//Route::get('chartjs', 'HomeController@chartjs');

Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
//get all users from the database and list them in the index page
Route::get('/user', ['as' => 'user.index' , 'uses' => 'UserController@index']);
//show user's details
Route::get('/user/{id}',['as' => 'user.show' , 'uses' => 'UserController@show']);
Route::delete('/user/{id}',['as' => 'user.destroy' , 'uses' => 'UserController@destroy']);
 // The following route generates a pdf
Route::get('getPDF/{id}', ['uses' => 'PDFController@getPDF', 'as' => 'getPDF']);
 //route to generate chartjs
Route::get('chartjs', ['uses' => 'HomeController@chartjs', 'as' => 'chartjs']);
