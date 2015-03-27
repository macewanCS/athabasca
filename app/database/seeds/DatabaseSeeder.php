<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('userTableSeeder');
		$this->call('kitTypeTableSeeder');
		$this->call('kitsTableSeeder');
		$this->call('kitAssetsTableSeeder');
	}

}
