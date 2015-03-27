<?php

class kitTypeTableSeeder extends Seeder {

	public function run(){
		DB::table('kitType')->delete();

    $types = array(
        array(
          'kitType' => 'iPadMini',
          'notes' => 'A Kit Containing X ipadMinis and chargers'
        ),
        array(
          'kitType' => 'iPad',
          'notes' => 'A Kit Containing X iPads and chargers'
        ),
        array(
          'kitType' => 'LegoMindstorm',
          'notes' => 'A Kit Containing X LegoMindstorms and accesories'
        ),
        array(
          'kitType' => 'Laptop(13Inch)',
          'notes' => 'A Kit Containing X 13 inch laptops with chargers'
        ),
        array(
          'kitType' => 'BoardGames',
          'notes' => 'A Kit Containing Board Games'
        ));

    DB::table('kitType')->insert($types);

  }
}
