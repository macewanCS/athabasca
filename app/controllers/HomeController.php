<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('Login');
	}
	public function login(){
    $users = DB::table('users')->where('username',Input::get('username'))->first(); /* tries to find a username or returns null if none is found*/
    if($users != NULL and $users->username == Input::get('username') and $users->password == Input::get('password')){ /* compares the password to the stored if one was found */
        return View::make('test');
    }
    else{
        return View::make('Login');
    }
}

}
