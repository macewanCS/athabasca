<?php

class bookingTableSeeder extends Seeder {

	public function run(){
		DB::table('booking')->delete();

    $booking = array(
        array(
          'primaryuser' => 'joshd',
          'eventname' => 'Ipad School Event',
          'kitBarcode'=> '31221111111001',
          'datein' => '04/18/2015',
          'forBranch' => 'ABB',
          'dateout' => '04/18/2015',
          'transferin' => '04/17/2015',
          'transferout' => '04/20/2015',
        )
    );
		DB::table('booking')->insert($booking);
	}

  }
