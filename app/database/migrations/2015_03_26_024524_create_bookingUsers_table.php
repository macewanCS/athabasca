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
			$table->string('email',60);
			$table->date('created_at')->nullable();
			$table->date('updated_at')->nullable();
			$table->rememberToken();yth
			$table->primary(array('bookingID', 'email'));
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
