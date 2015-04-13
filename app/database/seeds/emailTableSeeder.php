<?php

class emailTableSeeder extends Seeder {

	public function run(){
		DB::table('email')->delete();

        $users = array(
          'emailID' => 1,
          'address' => 'christopherdubeau@gmail.com',
          'subject'=> 'This is a test',
          'message' => 'Sup, bitch.',
          'date' => '04/12/2015',
        );
	    DB::table('email')->insert($users);
	}

  }
