<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kitType', function($table){
		$table->string('kitType', 50);
		$table->text('notes', 50)->nullable();
		$table->date('created_at')->nullable();
		$table->date('updated_at')->nullable();
		$table->rememberToken();
		$table->primary('kitType');
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
