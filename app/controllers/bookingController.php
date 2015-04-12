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
	public function create()
	{
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
	    $kit = 0;
	    $rec = Session::get('rec',NULL);
		$rec = 0;
		Session::put('rec',$rec);
		return View::make('createBooking')->with('kit', $kit);
	}

	public function create2()
	{
		Request::flash();
	  $rec = Session::get('rec',NULL);
		$rec += 1;
		Session::put('rec',$rec);
		$kit = Input::get('desKit');
		$input = input::all();
		return View::make('createBooking')->with('kit', $kit)->withInput($input);
	}

	public function create3()
	{
	    $rec = Session::get('rec',NULL);
	    if($rec >= 1){
		    $rec -= 1;
		}
		Session::put('rec',$rec);
		$kit = Input::get('desKit');
		return View::make('createBooking')->with('kit', $kit);
	}

	public function check()
	{
		if(Input::get('add')){
		    return $this->create2();
		} elseif(Input::get('create')){
		    return $this->confirm();
		} elseif(Input::get('remove')){
		    return $this->create3();
		}
	}

	public function confirm()
	{
	    $months = ['Jan'=>'31','Feb'=>'28','Mar'=> '31','Apr'=>'30','May'=>'31','Jun'=>'30','Jul'=>'31','Aug'=>'31','Sep'=>'30','Oct'=>'31','Nov'=>'30','Dec'=>'31'];
	    $monValue = ['Jan'=>'01','Feb'=>'02','Mar'=> '03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12'];
	    $monBack = ['Jan'=>'Dec','Feb'=>'Jan','Mar'=> 'Feb','Apr'=>'Mar','May'=>'Apr','Jun'=>'May','Jul'=>'Jun','Aug'=>'Jul','Sep'=>'Aug','Oct'=>'Sep','Nov'=>'Oct','Dec'=>'Nov'];
	    $monFront = ['Jan'=>'Feb','Feb'=>'Mar','Mar'=> 'Apr','Apr'=>'May','May'=>'Jun','Jun'=>'Jul','Jul'=>'Aug','Aug'=>'Sep','Sep'=>'Oct','Oct'=>'Nov','Nov'=>'Dec','Dec'=>'Jan'];
	    $weBack= ['Sun'=>1,'Mon'=>2,'Tue'=>0,'Wed'=>0,'Thu'=>0,'Fri'=>0,'Sat'=>0];
	    $weFront= ['Sun'=>0,'Mon'=>0,'Tue'=>0,'Wed'=>0,'Thu'=>0,'Fri'=>2,'Sat'=>1];
	    $fromDate = Input::get('from');
	    $toDate = Input::get('to');
	    $startdate;
	    $enddate;
	    $tranIn;
	    $tranOut;

	    /*setting Booking Start and transfer in date*/
	    $tDay = $fromDate[4].$fromDate[5];
	    if($tDay == '01'){
	        $inDay = $months[$monBack[$fromDate[7].$fromDate[8].$fromDate[9]]];
	        $inDay = (string)(intval($inDay) - $weBack[$fromDate[0].$fromDate[1].$fromDate[2]]);
	        $inMon = $monValue[$monBack[$fromDate[7].$fromDate[8].$fromDate[9]]];
	        if(($fromDate[7].$fromDate[8].$fromDate[9]) == 'Jan'){
	            $inYear = (string)(intval($fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14])-1);
            }
            else{
                $inYear = $fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14];
            }
	    }
	    else{
	        $inDay = (string)(intval($tDay)-1);
	        $inDay = (string)(intval($inDay) - $weBack[$fromDate[0].$fromDate[1].$fromDate[2]]);
	        if(intval($inDay) < 10){
	            $inDay = '0'.$inDay;
	        }
	        $inMon = $monValue[$fromDate[7].$fromDate[8].$fromDate[9]];
	        $inYear = $fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14];
	    }
	    $stMon = $monValue[$fromDate[7].$fromDate[8].$fromDate[9]];
	    $stYear = $fromDate[11].$fromDate[12].$fromDate[13].$fromDate[14];
	    $tranIn = $inMon.'/'.$inDay.'/'.$inYear;
	    $startdate = $stMon.'/'.$tDay.'/'.$stYear;

	    /*setting Booking End and transfer Out date*/
	    $mon = $months[$toDate[7].$toDate[8].$toDate[9]];
	    $tDay = $toDate[4].$toDate[5];
	    if($tDay == $mon){
	        $outDay = '1';
	        $outDay = (string)(intval($outDay) + $weFront[$toDate[0].$toDate[1].$toDate[2]]);
	        $outMon = $monValue[$monFront[$toDate[7].$toDate[8].$toDate[9]]];
	        if(intval($outDay) < 10){
	            $outDay = '0'.$outDay;
	        }
	        if(($toDate[7].$toDate[8].$toDate[9]) == 'Dec'){
	            $outYear = (string)(intval($toDate[11].$toDate[12].$toDate[13].$toDate[14])+1);
            }
            else{
                $outYear = $toDate[11].$toDate[12].$toDate[13].$toDate[14];
            }
	    }
	    else{
	        $outDay = (string)(intval($tDay)+1);
	        $outDay = (string)(intval($outDay) + $weFront[$toDate[0].$toDate[1].$toDate[2]]);
	        if(intval($outDay) < 10){
	            $outDay = '0'.$outDay;
	        }
	        $outMon = $monValue[$toDate[7].$toDate[8].$toDate[9]];
	        $outYear = $toDate[11].$toDate[12].$toDate[13].$toDate[14];
	    }
	    $endMon = $monValue[$toDate[7].$toDate[8].$toDate[9]];
	    $endYear = $toDate[11].$toDate[12].$toDate[13].$toDate[14];
	    $tranOut = $outMon.'/'.$outDay.'/'.$outYear;
	    $enddate = $endMon.'/'.$tDay.'/'.$endYear;


	    $location = Input::get('desBranch');
	    $eventName = Input::get('eName');
	    $primaryUser = Session::get('userdata',NULL);


	    $kits = DB::table('kitType')->lists('kitType');
	    $book = DB::select('select kitBarcode from booking where transferin Between ? and ? or transferout Between ? and ?',[$tranIn,$tranOut,$startdate,$tranOut]);
	    $booked =[];
	    for($x = 0; $x < count($book);$x++){
	        $booked[$x] = $book[$x]->kitBarcode;
	    }
	    $kitBarcode = DB::table('kits')->where('kitType',$kits[Input::get('desKit')])->whereNotIn('barcode',$booked)->first();
        if($eventName == ""){
            return Redirect::to('/createBooking')->with('errors','You must enter an Event Name');
          }
	    if($kitBarcode == NULL){
	        return Redirect::to('/createBooking')->with('errors','There are no Kits of this type avalable on the dates you selected');
	    }
	    DB::table('booking')->insert(array('forBranch' => $location, 'datein' => $startdate,'dateout' => $enddate,'transferin' => $tranIn,'transferout' => $tranOut,'primaryUser' => $primaryUser->username,'eventname' => $eventName,'kitBarcode' => $kitBarcode->barcode));

		$holder = DB::table('booking')->lists('bookingID');
		$id = $holder[count($holder)-1];
		DB::table('email')->insert(array('Address'=> $primaryUser->email, 'subject'=>'test','message'=>'test','date'=>$tranIn));
		$rec = Session::get('rec',NULL);
		$users = DB::table('users')->lists('email');
		for($i = 1; $i <= $rec; $i++){
		    $check = DB::select('select bookingID from bookingUsers where bookingID = ? and email = ?',[$id,$users[Input::get($i)]]);
		    if($check == NULL && $users[Input::get($i)] != $primaryUser->email){
		        DB::table('bookingUsers')->insert(array('bookingID'=> $id, 'email'=> $users[Input::get($i)]));
		        DB::table('email')->insert(array('Address'=> $users[Input::get($i)], 'subject'=>'test','message'=>'test','date'=>$tranIn));
		        Mail::send('emails.email2',array(),function($message) use($users,$i){
		            $message->to($users[Input::get($i)], ' ')->subject('EPL Booking Created');
		        });
		    }
		}
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
