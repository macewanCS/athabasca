<?php

class kitAssetsTableSeeder extends Seeder {

	public function run(){
		DB::table('kitAssets')->delete();

		$kitss = array(
			array(
				'kitBarcode' => 31221111111001,
				'assetName' => 'iPadMini1',
				'assetTag' => 100001,
			),
			array(
				'kitBarcode' => 31221111111002,
				'assetName' => 'iPadMini2',
				'assetTag' => 100002,
			),
			array(
				'kitBarcode' => 31221111111003,
				'assetName' => 'iPad1',
				'assetTag' => 100003,
			),
			array(
				'barcode' => 31221111111004,
				'assetName' => 'iPad2',
				'assetTag' => 100004,
			),
			array(
				'kitBarcode' => 31221111111005,
				'assetName' => 'LegoMindstorm1',
				'assetTag' => 100005,
			),
			array(
				'kitBarcode' => 31221111111006,
				'assetName' => 'LegoMindstorm2',
				'assetTag' => 100006,
			),
			array(
				'kitBarcode' => 31221111111007,
				'assetName' => 'Laptop(13Inch)1',
				'assetTag' => 100007,
			),
			array(
				'kitBarcode' => 31221111111008,
				'assetName' => 'Laptop(13Inch)2',
				'assetTag' => 100008,
			),
			array(
				'kitBarcode' => 31221111111009,
				'assetName' => 'BoardGames1',
				'assetTag' => 100009,
			),
			array(
				'kitBarcode' => 31221111111010,
				'assetName' => 'BoardGames2',
				'assetTag' => 100010,
			),
			array(
				'kitBarcode' => 31221111111001,
				'assetName' => 'iPadMini3',
				'assetTag' => 100011,
			),
			array(
				'kitBarcode' => 31221111111002,
				'assetName' => 'iPadMini4',
				'assetTag' => 100012,
			),
			array(
				'kitBarcode' => 31221111111003,
				'assetName' => 'iPad3',
				'assetTag' => 100013,
			),
			array(
				'kitBarcode' => 31221111111004,
				'assetName' => 'iPad4',
				'assetTag' => 100014,
			),
			array(
				'kitBarcode' => 31221111111005,
				'assetName' => 'LegoMindstorm3',
				'assetTag' => 100015,
			),
			array(
				'kitBarcode' => 31221111111006,
				'assetName' => 'LegoMindstorm4',
				'assetTag' => 100016,
			),
			array(
				'kitBarcode' => 31221111111007,
				'assetName' => 'Laptop(13Inch)3',
				'assetTag' => 100017,
			),
			array(
				'kitBarcode' => 31221111111008,
				'assetName' => 'Laptop(13Inch)4',
				'assetTag' => 100018,
			),
			array(
				'kitBarcode' => 31221111111009,
				'assetName' => 'BoardGames3',
				'assetTag' => 100019,
			),
			array(
				'kitBarcode' => 31221111111010,
				'assetName' => 'BoardGames4',
				'assetTag' => 100020,
			));

    DB::table('kitAssets')->insert($kitss);
  }
}
