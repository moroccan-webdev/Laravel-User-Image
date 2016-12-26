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
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
 // The following route generates a pdf
Route::get('getPDF/{id}', ['uses' => 'PDFController@getPDF', 'as' => 'getPDF']);
