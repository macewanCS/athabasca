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
Route::resource('transfers', 'TransferController');
Route::post('Home', array('uses' => 'HomeController@Home'));

Route::any('/kitmanage/create2', 'kitController@create2');
Route::any('/kitmanage/create2add', 'kitController@create2add');
Route::any('/createbooking', 'bookingController@check');

Route::get('/viewbooking', 'bookingController@booking');
Route::get('api/booking', array('as' => 'api.booking', 'uses' => 'bookingController@getBookingDataTable'));

Route::get('/viewuserbooking', 'bookingController@userbooking');
Route::get('api/userbooking', array('as' => 'api.userbooking', 'uses' => 'bookingController@getUserBookingDataTable'));

Route::get('/viewkit', 'kitViewController@kit');
Route::get('api/kit', array('as' => 'api.kit', 'uses' => 'kitViewController@getKitDataTable'));

Route::get('/edit', 'bookingController@editBooking');

Route::resource('kitmanage', 'kitController');
Route::resource('createBooking', 'bookingController@create');
Route::resource('logout', 'HomeController@logout');
Route::resource('transfers', 'TransferController@create');
