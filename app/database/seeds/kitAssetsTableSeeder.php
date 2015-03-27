<?php

class kitAssetsTableSeeder extends Seeder {

	public function run(){
		DB::table('kitAssets')->delete();

		$kitss = array(
			array(
				'kitBarcode' => 31221111111001,
				'assetName' => 'iPadMini1',
				'assetTag' => 0000001
			),
			array(
				'kitBarcode' => 31221111111002,
				'assetName' => 'iPadMini2',
				'assetTag' => 0000002
			),
			array(
				'kitBarcode' => 31221111111003,
				'assetName' => 'iPad1',
				'assetTag' => 0000003
			),
			array(
				'barcode' => 31221111111004,
				'assetName' => 'iPad2',
				'assetTag' => 0000004
			),
			array(
				'kitBarcode' => 31221111111005,
				'assetName' => 'LegoMindstorm1',
				'assetTag' => 0000005
			),
			array(
				'kitBarcode' => 31221111111006,
				'assetName' => 'LegoMindstorm2',
				'assetTag' => 0000006
			),
			array(
				'kitBarcode' => 31221111111007,
				'assetName' => 'Laptop(13Inch)1',
				'assetTag' => 0000007
			),
			array(
				'kitBarcode' => 31221111111008,
				'assetName' => 'Laptop(13Inch)2',
				'assetTag' => 0000008
			),
			array(
				'kitBarcode' => 31221111111009,
				'assetName' => 'BoardGames1',
				'assetTag' => 0000009
			),
			array(
				'kitBarcode' => 31221111111010,
				'assetName' => 'BoardGames2',
				'assetTag' => 0000010
			),
			array(
				'kitBarcode' => 31221111111001,
				'assetName' => 'iPadMini3',
				'assetTag' => 0000011
			),
			array(
				'kitBarcode' => 31221111111002,
				'assetName' => 'iPadMini4',
				'assetTag' => 0000012
			),
			array(
				'kitBarcode' => 31221111111003,
				'assetName' => 'iPad3',
				'assetTag' => 0000013
			),
			array(
				'kitBarcode' => 31221111111004,
				'assetName' => 'iPad4',
				'assetTag' => 0000014
			),
			array(
				'kitBarcode' => 31221111111005,
				'assetName' => 'LegoMindstorm3',
				'assetTag' => 0000015
			),
			array(
				'kitBarcode' => 31221111111006,
				'assetName' => 'LegoMindstorm4',
				'assetTag' => 0000016
			),
			array(
				'kitBarcode' => 31221111111007,
				'assetName' => 'Laptop(13Inch)3',
				'assetTag' => 0000017
			),
			array(
				'kitBarcode' => 31221111111008,
				'assetName' => 'Laptop(13Inch)4',
				'assetTag' => 0000018
			),
			array(
				'kitBarcode' => 31221111111009,
				'assetName' => 'BoardGames3',
				'assetTag' => 0000019
			),
			array(
				'kitBarcode' => 31221111111010,
				'assetName' => 'BoardGames4',
				'assetTag' => 0000020
			));

    DB::table('kitAssets')->insert($kitss);
  }
}
