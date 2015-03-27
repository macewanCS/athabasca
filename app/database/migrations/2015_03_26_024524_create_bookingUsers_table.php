<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('bookingUsers', function($table){
			$table->bigInteger('bookingID');
			$table->string('user',60);
			$table->date('created_at')->nullable();
			$table->date('updated_at')->nullable();
			$table->rememberToken();
			$table->primary(array('bookingID', 'user'));
			$table->foreign('bookingID')->references('bookingID')->on('booking');
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
