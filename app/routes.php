<?php
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

//Assorted Routes for secondary pages
Route::any('viewkit/{$id}/edit2', array('uses' => 'kitViewController@edit2'));
Route::post('login', array('uses' => 'HomeController@login'));
Route::post('Home', array('uses' => 'HomeController@Home'));
Route::any('/kitmanage/create2', 'kitController@create2');
Route::any('/kitmanage/create2add', 'kitController@create2add');
Route::any('/createbooking', 'bookingController@check');

//Api's for creating tables when called
Route::get('api/booking', array('as' => 'api.booking', 'uses' => 'bookingViewController@getBookingDataTable'));
Route::get('api/userbooking', array('as' => 'api.userbooking', 'uses' => 'bookingUserViewController@getUserBookingDataTable'));
Route::get('api/kit', array('as' => 'api.kit', 'uses' => 'kitViewController@getKitDataTable'));
Route::get('api/transfer', array('as' => 'api.transfer', 'uses' => 'TransferController@getTransferTable'));

//Resources for each function
Route::resource('/delete', 'deleteController');
Route::resource('kitmanage', 'kitController');
Route::resource('createBooking', 'bookingController@create');
Route::resource('logout', 'HomeController@logout');
Route::resource('/transfer', 'TransferController');
Route::resource('/viewbooking', 'bookingViewController');
Route::resource('/viewuserbooking', 'bookingUserViewController');
Route::resource('/viewkit', 'kitViewController');
