<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
/* Email command for sending the emails list
 *in the database. Crontab runs php artisan Email
 *every day
 *Made by Adam Sykes
 */
class EmailCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'Email';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
	    $date = date('m/d/Y');
		$email = DB::table('email')->where('date',$date)->get();
		$mail = null;
		if($email != NULL){
		    foreach($email as $mail){
		        Mail::send('emails.email',array(),function($message) use($mail){
		            $message->to($mail->address, ' ')->subject($mail->subject);
		        });
		        //get all of the emails that need to be sent today, and Mail them
		    }
		    DB::table('email')->where('date','==',$date)->delete();
		    //then erase them from the table so we don't get duplicate emails
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
