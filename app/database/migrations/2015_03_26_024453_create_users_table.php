``<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
	{
			$table->string('username', 60);
			$table->bigInteger('empID');
			$table->string('password',60);
			$table->string('phone',20);
			$table->string('email', 60);
			$table->string('homebranch', 10);
			$table->string('role', 20);
			$table->date('created_at')->nullable();
			$table->date('updated_at')->nullable();
			$table->rememberToken();
			$table->primary('empID');
			$table->unique('username');
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
