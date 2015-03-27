<?php

class kitAssetsTableSeeder extends Seeder {

	public function run(){
		DB::table('kitAssets')->delete();

    $kits = array(
      array(
        'barcode' => 31221111111001,
        'kitType' => 'iPadMini',
        'assets' => 2,
        'name' => 'iPadMini1',
        'notes' => 'none'
      )
    );

    DB::table('kitAssets')->insert($kits);

  }
}
