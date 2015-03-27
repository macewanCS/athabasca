<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kitAssets', function($table){
		$table->string('kitBarcode', 20);
		$table->string('assetName', 50);
		$table->string('assetTag', 20);
		$table->date('created_at')->nullable();
		$table->date('updated_at')->nullable();
		$table->rememberToken();
		$table->primary(array('kitBarcode', 'assetTag'));
		$table->foreign('kitBarcode')->references('barcode')->on('kits');
	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
