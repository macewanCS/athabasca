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
			$table->string('empID');
			$table->timestamps();
			$table->rememberToken();
			$table->primary(array('bookingID', 'empID'));
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
