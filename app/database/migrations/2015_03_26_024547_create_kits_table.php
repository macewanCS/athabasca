<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kits', function($table){
		$table->string('barcode', 50);
		$table->string('kitType', 50);
		$table->biginteger('assets');
		$table->string('name');
		$table->text('notes')->nullable();
		$table->text('damageDescription')->nullable();
		$table->string('location',20)->nullable();
		$table->string('damaged', 10)->nullable();
		$table->date('created_at')->nullable();
		$table->date('updated_at')->nullable();
		$table->rememberToken();
		$table->primary('barcode');
		$table->foreign('kitType')->references('kitType')->on('kitType');
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
