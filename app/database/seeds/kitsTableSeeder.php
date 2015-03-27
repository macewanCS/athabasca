<?php

class kitsTableSeeder extends Seeder {

	public function run(){
		DB::table('kits')->delete();

    $kits = array(
      array(
        'barcode' => 31221111111001,
        'kitType' => 'iPadMini',
        'assets' => 2,
        'name' => 'iPadMini1',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111002,
        'kitType' => 'iPadMini',
        'assets' => 2,
        'name' => 'iPadMini2',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111003,
        'kitType' => 'iPad',
        'assets' => 2,
        'name' => 'iPad1',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111004,
        'kitType' => 'iPad',
        'assets' => 2,
        'name' => 'iPad2',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111005,
        'kitType' => 'LegoMindstorm',
        'assets' => 2,
        'name' => 'LegoMindstorm1',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111006,
        'kitType' => 'LegoMindstorm',
        'assets' => 2,
        'name' => 'LegoMindstorm2',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111007,
        'kitType' => 'Laptop(13Inch)',
        'assets' => 2,
        'name' => 'Laptop(13Inch)1',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111008,
        'kitType' => 'Laptop(13Inch)',
        'assets' => 2,
        'name' => 'Laptop(13Inch)2',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111009,
        'kitType' => 'BoardGames',
        'assets' => 2,
        'name' => 'BoardGames2',
        'notes' => 'none'
      ),
      array(
        'barcode' => 31221111111010,
        'kitType' => 'BoardGames',
        'assets' => 2,
        'name' => 'BoardGames1',
        'notes' => 'none'
      )
    );

    DB::table('kits')->insert($kits);

  }
}
