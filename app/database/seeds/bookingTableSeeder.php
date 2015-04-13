<?php

class bookingTableSeeder extends Seeder {

	public function run(){
		DB::table('booking')->delete();

    $booking = array(
        array(
          'primaryuser' => 'joshdoti',
          'eventname' => 'Ipadmini School Event',
          'kitBarcode'=> '31221111111001',
          'datein' => '04/18/2015',
          'forBranch' => 'MNA',
          'dateout' => '04/18/2015',
          'transferin' => '04/17/2015',
          'transferout' => '04/20/2015',
        ),
        array(
          'primaryuser' => 'joshdoti',
          'eventname' => 'Ipad School Event',
          'kitBarcode'=> '31221111111003',
          'datein' => '04/17/2015',
          'forBranch' => 'CSD',
          'dateout' => '04/18/2015',
          'transferin' => '04/16/2015',
          'transferout' => '04/20/2015',
        ),
        array(
          'primaryuser' => 'koensm',
          'eventname' => 'Mindstorm Kit Event',
          'kitBarcode'=> '31221111111005',
          'datein' => '04/14/2015',
          'forBranch' => 'ABB',
          'dateout' => '04/14/2015',
          'transferin' => '04/13/2015',
          'transferout' => '04/15/2015',
        ),
        array(
          'primaryuser' => 'dubeauc',
          'eventname' => 'Laptop(13Inch)',
          'kitBarcode'=> '31221111111008',
          'datein' => '04/21/2015',
          'forBranch' => 'CLV',
          'dateout' => '04/22/2015',
          'transferin' => '04/20/2015',
          'transferout' => '04/23/2015',
        ),
        array(
          'primaryuser' => 'dubeauc',
          'eventname' => 'Ipadmini School Event',
          'kitBarcode'=> '31221111111002',
          'datein' => '04/18/2015',
          'forBranch' => 'CLV',
          'dateout' => '04/18/2015',
          'transferin' => '04/17/2015',
          'transferout' => '04/20/2015',
        )
    );
		DB::table('booking')->insert($booking);
	}

  }
