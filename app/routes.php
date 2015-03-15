<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $users = Session::get('userdata',NULL);
    if ($users != NULL){
	    return View::make('test');
	}
	else{
	    return View::make('Login');
	}
});
Route::post('login', array('uses' => 'HomeController@login'));
Route::post('Home', array('uses' => 'HomeController@Home'));

Route::any('/kitmanage/create2', 'kitController@create2');
Route::any('/createbooking', 'bookingController@check');

Route::resource('kitmanage', 'kitController');
Route::resource('createBooking', 'bookingController@create');
