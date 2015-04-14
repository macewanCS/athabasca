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



	public function Home(){//if no user is logged in redirects to the login or creates the homepage view with table
		$users = Session::get('userdata',NULL);
		if($users == NULL){
				return View::make('Login');
		}

		$table = Datatable::table()
				->addColumn('Transfer On','Event Name', 'Transfer To', 'Current Location', 'Send')
				->setUrl(route('api.transfer'))
				->noScript();

    return View::make('test')->with('table',$table);
    }

	public function login(){//Checks the Datatable for a user and a password for the login
	//gets the first user with the matching name
    $users = DB::table('users')->where('username',Input::get('username'))->first(); /* tries to find a username or returns null if none is found*/
    if($users != NULL and $users->username == Input::get('username') and $users->password/*input hashing here*/ == Input::get('password')){ /* compares the password to the stored if one was found */
        // in the above we left the hashing out as we did not know which type EPL used and left a comment to input hashing that will allow the login to match their passwords
        $users = Session::put('userdata',$users); //sets the user into sessions
				return Redirect::to('/'); // redirects to home

    }
    else{
        return Redirect::back()->withInput()->with('errors','Username or Password is incorrect. Please try again');// redirects back to login with an error
    }
}
    public function logout(){ // when the log out is pressed flushes the all session values(including loged in user data) and redirects to Home()
        $users = Session::get('userdata',NULL);
        if($users != NULL){
            Session::flush();
        }
            return Redirect::to('/');
}

}
