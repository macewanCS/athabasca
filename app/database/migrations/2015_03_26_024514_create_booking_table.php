<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking', function($table){
			$table->increments('bookingID');
			$table->string('primaryUser', 60);
			$table->string('eventname', 60)->nullable();
			$table->string('kitBarcode', 20);
			$table->date('datein');
			$table->string('forBranch', 10);
			$table->date('dateout');
			$table->date('transferin');
			$table->date('transferout');
			$table->date('created_at')->nullable();
			$table->date('updated_at')->nullable();
			$table->rememberToken();
			$table->date('bookingID')
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
