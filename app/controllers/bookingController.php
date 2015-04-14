<?php

class bookingController extends \BaseController {
	protected $layout = 'layouts.default';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create() // Creates the View when View is made
	{
	    $users = Session::get('userdata',NULL);//gets the loged in user data
	    if($users == NULL){ // if no user is loged in redirects to the login page
	        return Redirect::to('/');
	    }
	    $kit = 0; // sets the default kit to 0(passed to the view)
	    $rec = Session::get('rec',NULL); //gets the number of Additional users in session
		$rec = 0; // resets the number of additional users
		Session::put('rec',$rec); // sets the number of additional users into session
		return View::make('createBooking')->with('kit', $kit); // creates the view
	}

	public function create2()//Adds one Additional user to the view
	{
		Request::flash(); 
	    $rec = Session::get('rec',NULL); // gets the current number of Additional users
		$rec += 1; // adds the one
		Session::put('rec',$rec); // sets the number of additional users into session
		$kit = Input::get('desKit'); // gets the desired kit from the last view iteration
		$input = Input::all(); // gets all inputs from the last view
		return View::make('createBooking')->with('kit', $kit)->withInput($input); // remakes booking with input
	}

	public function create3() // removes one user from the create booking view
	{
	    Request::flash();
	    $rec = Session::get('rec',NULL); // gets the current number of Additional users
	    if($rec >= 1){ // if the value is above zero subtract one
		    $rec -= 1;
		}
		Session::put('rec',$rec); // set the new number of additional users for the booking
		$kit = Input::get('desKit'); // gets the desired kit input
		$input = Input::all(); // gets all input
		return View::make('createBooking')->with('kit', $kit)->withInput($input); // creates the create booking with input
	}

	public function check() // finds out which of three buttons were pressed
	{
		if(Input::get('add')){ // if add additional users was pressed
		    return $this->create2();
		} elseif(Input::get('create')){ // if create booking was pressed
		    return $this->confirm();
		} elseif(Input::get('remove')){ // if remove booking was pressed
		    return $this->create3();
		}
	}

	public function confirm()
	{
	    //Bellow data are arrays that are used in converting the Date into M/D/Y format
	    $months = ['Jan'=>'31','Feb'=>'28','Mar'=> '31','Apr'=>'30','May'=>'31','Jun'=>'30','Jul'=>'31','Aug'=>'31','Sep'=>'30','Oct'=>'31','Nov'=>'30','Dec'=>'31'];
	    $monValue = ['Jan'=>'01','Feb'=>'02','Mar'=> '03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12'];
	    $monBack = ['Jan'=>'Dec','Feb'=>'Jan','Mar'=> 'Feb','Apr'=>'Mar','May'=>'Apr','Jun'=>'May','Jul'=>'Jun','Aug'=>'Jul','Sep'=>'Aug','Oct'=>'Sep','Nov'=>'Oct','Dec'=>'Nov'];
	    $monFront = ['Jan'=>'Feb','Feb'=>'Mar','Mar'=> 'Apr','Apr'=>'May','May'=>'Jun','Jun'=>'Jul','Jul'=>'Aug','Aug'=>'Sep','Sep'=>'Oct','Oct'=>'Nov','Nov'=>'Dec','Dec'=>'Jan'];
	    
	    $weBack= ['Sun'=>1,'Mon'=>2,'Tue'=>0,'Wed'=>0,'Thu'=>0,'Fri'=>0,'Sat'=>0];// additional black out days behind booking
	    $weFront= ['Sun'=>0,'Mon'=>0,'Tue'=>0,'Wed'=>0,'Thu'=>0,'Fri'=>2,'Sat'=>1];//number of black off additional blackout days infront
	    $fromDate = Input::get('from');// the booking start date
	    $toDate = Input::get('to'); // the booking end date
	    // initialize variables bellow
	    $startdate;
	    $enddate;
	    $tranIn;
	    $tranOut;

	    /*setting Booking Start and transfer in date*/
	    $tDay = $fromDate[4].$fromDate[5];
	    if($tDay == '01'){ // if the start date is the start of a month finds last day of previous month for black out days
	        $inDay = $months[$monBack[$fromDate[7].$fromDate[8].$fromDate[9]]];
	        $inDay = (string)(intval($inDay) - $weBack[$fromDate[0].$fromDate[1].$fromDate[2]]);
	        $inMon = $monValue[$monBack[$fromDate[7].$fromDate[8].$fromDate[9]]];
	        if(($fromDate[7].$fromDate[8].$fromDate[9]) == 'Jan'){ // if the month was january convert to last years dec
	            $inYear = (string)(intval($fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14])-1);
            }
            else{ // else stays this year
                $inYear = $fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14];
            }
	    }
	    else{ // converts the date into the previous day with addianal days of transfer as needed
	        $inDay = (string)(intval($tDay)-1);
	        $inDay = (string)(intval($inDay) - $weBack[$fromDate[0].$fromDate[1].$fromDate[2]]);
	        if(intval($inDay) < 10){
	            $inDay = '0'.$inDay;
	        }
	        $inMon = $monValue[$fromDate[7].$fromDate[8].$fromDate[9]];
	        $inYear = $fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14];
	    }
	    //Bellow set the variables for the transfer in date and event start date in M/D/Y format
	    $stMon = $monValue[$fromDate[7].$fromDate[8].$fromDate[9]];
	    $stYear = $fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14];
	    $tranIn = $inMon.'/'.$inDay.'/'.$inYear;
	    $startdate = $stMon.'/'.$tDay.'/'.$stYear;

	    /*setting Booking End and transfer Out date*/
	    $mon = $months[$toDate[7].$toDate[8].$toDate[9]];
	    $tDay = $toDate[4].$toDate[5];
	    if($tDay == $mon){ // if the date is the last of the selected month move to the first of the next month
	        $outDay = '1';
	        $outDay = (string)(intval($outDay) + $weFront[$toDate[0].$toDate[1].$toDate[2]]);
	        $outMon = $monValue[$monFront[$toDate[7].$toDate[8].$toDate[9]]];
	        if(intval($outDay) < 10){
	            $outDay = '0'.$outDay;
	        }
	        if(($toDate[7].$toDate[8].$toDate[9]) == 'Dec'){ // if the selected end is the end of dec move to jan 1st of next year
	            $outYear = (string)(intval($toDate[11].$toDate[12].$toDate[13].$toDate[14])+1);
            }
            else{ // else same year
                $outYear = $toDate[11].$toDate[12].$toDate[13].$toDate[14];
            }
	    }
	    else{ // if not end of a month add on to current date and keep month year
	        $outDay = (string)(intval($tDay)+1);
	        $outDay = (string)(intval($outDay) + $weFront[$toDate[0].$toDate[1].$toDate[2]]);
	        if(intval($outDay) < 10){
	            $outDay = '0'.$outDay;
	        }
	        $outMon = $monValue[$toDate[7].$toDate[8].$toDate[9]];
	        $outYear = $toDate[11].$toDate[12].$toDate[13].$toDate[14];
	    }
	    // places the M/D/Y formated transfer out and end dates into variales
	    $endMon = $monValue[$toDate[7].$toDate[8].$toDate[9]];
	    $endYear = $toDate[11].$toDate[12].$toDate[13].$toDate[14];
	    $tranOut = $outMon.'/'.$outDay.'/'.$outYear;
	    $enddate = $endMon.'/'.$tDay.'/'.$endYear;

        // the bottom three get the brach event name and the current user data
	    $location = Input::get('desBranch');
	    $eventName = Input::get('eName');
	    $primaryUser = Session::get('userdata',NULL);

        // bottom 2 get all kit types from the DB and if the user and booking id have a match in the Database
	    $kits = DB::table('kitType')->lists('kitType');
	    $book = DB::select('select kitBarcode from booking where transferin Between ? and ? or transferout Between ? and ?',[$tranIn,$tranOut,$startdate,$tranOut]);
	    $booked =[]; // used to convert book into an array of barcodes
	    for($x = 0; $x < count($book);$x++){ // gets all barcodes from book
	        $booked[$x] = $book[$x]->kitBarcode;
	    }
	    // gets the kit barcode of the first avalable kit of the selected kit type
	    $kitBarcode = DB::table('kits')->where('kitType',$kits[Input::get('desKit')])->whereNotIn('barcode',$booked)->first();
        
        // bellow 2 ifs print error messages with redirect back
        if($eventName == ""){
            return Redirect::to('/createBooking')->with('errors','You must enter an Event Name');
          }
	    if($kitBarcode == NULL){
	        return Redirect::to('/createBooking')->with('errors','There are no Kits of this type avalable on the dates you selected');
	    }
	    //bellow adds the booking into the Data base
	    DB::table('booking')->insert(array('forBranch' => $location, 'datein' => $startdate,'dateout' => $enddate,'transferin' => $tranIn,'transferout' => $tranOut,'primaryUser' => $primaryUser->username,'eventname' => $eventName,'kitBarcode' => $kitBarcode->barcode));
        
        //bellow then get the auto gernerated booking id from the above addition
		$holder = DB::table('booking')->lists('bookingID');
		$id = $holder[count($holder)-1];
		
		// bellow adds the priamry user to the email list for this kit
		DB::table('email')->insert(array('Address'=> $primaryUser->email, 'subject'=>'test','message'=>'test','date'=>$tranIn));
		
		$rec = Session::get('rec',NULL); // gets the number of additional users
		$users = DB::table('users')->lists('email'); // gets a list of all emails
		//adds the primary user to the email queue
		Mail::send('emails.email2',array(),function($message) use($primaryUser){
		   $message->to($primaryUser->email, ' ')->subject('EPL Booking Created');
		});
		for($i = 1; $i <= $rec; $i++){ // for all aditianla users
		    $check = DB::select('select bookingID from bookingUsers where bookingID = ? and email = ?',[$id,$users[Input::get($i)]]); // checks if they are already in the Database for this kit
                
                //if the check is passed and the additianal user is not the primary user create a database entry and add them to the email list
				if($check == NULL && $users[Input::get($i)] != $primaryUser->email){
		        DB::table('bookingUsers')->insert(array('bookingID'=> $id, 'email'=> $users[Input::get($i)]));
		        DB::table('email')->insert(array('Address'=> $users[Input::get($i)], 'subject'=>'test','message'=>'test','date'=>$tranIn));
				//adds mail to the list
				Mail::send('emails.email2',array(),function($message) use($users){
		             $message->to($users[Input::get($i)], ' ')->subject('EPL Booking Created');
		        });
		    }
		}
		//redirects to the view user booking page
		return Redirect::to('viewuserbooking/show')->with('created','The Booking was Created');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
