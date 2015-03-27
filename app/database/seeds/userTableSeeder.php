<?php

class userTableSeeder extends Seeder {

	public function run(){
		DB::table('users')->delete();

    $users = array(
        array(
          'username' => 1,
          'empID' => 1,
          'password'=> 1,
          'phone' => '780-123-4567',
          'email' => 'emp1@epl.ca',
          'homebranch' => 'ABB',
          'role' => 'librarian'
        ),
        array(
          'username' => 2,
          'empID' => 2,
          'password'=> 2,
          'phone' => '780-123-4567',
          'email' => 'emp1@epl.ca',
          'homebranch' => 'ABB',
          'role' => 'librarian'
        ),
        array(
          'username' => 3,
          'empID' => 3,
          'password'=> 3,
          'phone' => '780-123-4567',
          'email' => 'emp3@epl.ca',
          'homebranch' => 'CSD',
          'role' => 'librarian'
        ),
        array(
          'username' => 4,
          'empID' => 4,
          'password'=> 4,
          'phone' => '780-123-4567',
          'email' => 'emp4@epl.ca',
          'homebranch' => 'CLV',
          'role' => 'librarian'
        ),
        array(
          'username' => 5,
          'empID' => 5,
          'password'=> 5,
          'phone' => '780-123-4567',
          'email' => 'emp5@epl.ca',
          'homebranch' => 'CLV',
          'role' => 'librarian'
        ),
        array(
          'username' => 6,
          'empID' => 6,
          'password'=> 6,
          'phone' => '780-123-4567',
          'email' => 'emp6@epl.ca',
          'homebranch' => 'CLV',
          'role' => 'librarian'
        ),
        array(
          'username' => 7,
          'empID' => 7,
          'password'=> 7,
          'phone' => '780-123-4567',
          'email' => 'emp7@epl.ca',
          'homebranch' => 'HIG',
          'role' => 'librarian'
        ),
        array(
          'username' => 8,
          'empID' => 8,
          'password'=> 8,
          'phone' => '780-123-4567',
          'email' => 'emp8@epl.ca',
          'homebranch' => 'IDY',
          'role' => 'librarian'
        ),
        array(
          'username' => 9,
          'empID' => 9,
          'password'=> 9,
          'phone' => '780-123-4567',
          'email' => 'emp9@epl.ca',
          'homebranch' => 'JPL',
          'role' => 'librarian'
        ),
        array(
          'username' => 10,
          'empID' => 10,
          'password'=> 10,
          'phone' => '780-123-4567',
          'email' => 'emp10@epl.ca',
          'homebranch' => 'APP',
          'role' => 'librarian'
        ),
        array(
          'username' => 11,
          'empID' => 11,
          'password'=> 11,
          'phone' => '780-123-4567',
          'email' => 'emp11@epl.ca',
          'homebranch' => 'LHL',
          'role' => 'librarian'
        ),
        array(
          'username' => 12,
          'empID' => 12,
          'password'=> 12,
          'phone' => '780-123-4567',
          'email' => 'emp12@epl.ca',
          'homebranch' => 'LON',
          'role' => 'librarian'
        ),
        array(
          'username' => 13,
          'empID' => 13,
          'password'=> 13,
          'phone' => '780-123-4567',
          'email' => 'emp13@epl.ca',
          'homebranch' => 'MEA',
          'role' => 'librarian'
        ),
        array(
          'username' => 14,
          'empID' => 14,
          'password'=> 14,
          'phone' => '780-123-4567',
          'email' => 'emp14@epl.ca',
          'homebranch' => 'MEA',
          'role' => 'librarian'
        ),
        array(
          'username' => 15,
          'empID' => 15,
          'password'=> 15,
          'phone' => '780-123-4567',
          'email' => 'emp15@epl.ca',
          'homebranch' => 'MLW',
          'role' => 'librarian'
        ),
        array(
          'username' => 16,
          'empID' => 16,
          'password'=> 16,
          'phone' => '780-123-4567',
          'email' => 'emp16@epl.ca',
          'homebranch' => 'MNA',
          'role' => 'librarian'
        ),
        array(
          'username' => 17,
          'empID' => 17,
          'password'=> 17,
          'phone' => '780-123-4567',
          'email' => 'emp17@epl.ca',
          'homebranch' => 'APP',
          'role' => 'librarian'
        ),
        array(
          'username' => 18,
          'empID' => 18,
          'password'=> 18,
          'phone' => '780-123-4567',
          'email' => 'emp18@epl.ca',
          'homebranch' => 'STR',
          'role' => 'librarian'
        ),
        array(
          'username' => 19,
          'empID' => 19,
          'password'=> 19,
          'phone' => '780-123-4567',
          'email' => 'emp19@epl.ca',
          'homebranch' => 'STR',
          'role' => 'librarian'
        ),
        array(
          'username' => 20,
          'empID' => 20,
          'password'=> 20,
          'phone' => '780-123-4567',
          'email' => 'emp20@epl.ca',
          'homebranch' => 'WOD',
          'role' => 'admin'
        )

    );
		DB::table('users')->insert($users);
	}

  }
