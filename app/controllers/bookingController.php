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
	    $kit = 0;
	    $rec = Session::get('rec',NULL);
		$rec = 1;
		Session::put('rec',$rec);
		return View::make('createBooking')->with('kit', $kit);
	}
	
	public function create2()
	{
	    $rec = Session::get('rec',NULL);
		$rec += 1;
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
		} elseif(Input::get('kit')){
		    $kit = Input::get('desKit');
		    return $this->create()->with('kit', $kit);
		}
	}
	
	public function confirm()
	{
	    $months = [['3','1'],['2','8'],['3','1'],['3','0'],['3','1'],['3','0'],['3','1'],['3','1'],['3','0'],['3','1'],['3','0'],['3','1']];
	    $days = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
	    $startdate = Input::get('from');
	    $enddate = Input::get('to');
	    $tranIn = Input::get('from');
	    $tranOut = Input::get('to');
	    
	    
	    $mon = $tranIn[0] . $tranIn[1];
	    $date = $months[intval($mon)-1];
	    if($tranIn[3] == '0' and $tranIn[4] == '1'){ //need to create loop to go from 00 to 11 and reverse
	        $date = $months[intval($mon)-2];
	        $tranIn[3] = $date[0];
	        $tranIn[4] = $date[1];
	        $index = $days[array_search($mon,$days)-1];
	        $tranIn[0] = $index[0];
	        $tranIn[1] = $index[1];
	    }
	    else{
	        $mon = $tranIn[3] . $tranIn[4];
	        $index = $days[array_search($mon,$days)-1];
	        $tranIn[3] = $index[0];
	        $tranIn[4] = $index[1];
	    }
	    $mon = $tranOut[0] . $tranOut[1];
	    $date = $months[intval($mon)-1];
	    if($tranIn[3] == $date[0] and $tranIn[4] == $date[1]){ //need to create loop to go from 00 to 11 and reverse
	        $tranOut[3] = '0';
	        $tranOut[4] = '1';
	        $index = $days[array_search($mon,$days)+1];
	        $tranOut[0] = $index[0];
	        $tranOut[1] = $index[1];
	    }
	    else{
	        $mon = $tranOut[3] . $tranOut[4];
	        $index = $days[array_search($mon,$days)+1];
	        $tranOut[3] = $index[0];
	        $tranOut[4] = $index[1];
	    }
	    
	    
	    $location = Input::get('desBranch');
	    $eventName = Input::get('eName');
	    $primaryUser = Session::get('userdata',NULL);
	    $kits = DB::table('kitType')->lists('kitType');
	    $book = DB::select('select kitBarcode from booking where transferin = ? or transferout = ?',[$tranIn,$tranOut]);
	    $booked =[];
	    for($x = 0; $x < count($book);$x++){
	        $booked[$x] = $book[$x]->kitBarcode;
	    }
	    $kitBarcode = DB::table('kits')->where('kitType',$kits[Input::get('desKit')])->whereNotIn('barcode',$booked)->first();
	    if($kitBarcode == NULL){
	        return Redirect::back()->withInput()->with('errors','There are no Kits of this type avalable on the dates you selected');
	    }
	    DB::table('booking')->insert(array('forBranch' => $location, 'datein' => $startdate,'dateout' => $enddate,'transferin' => $tranIn,'transferout' => $tranOut,'primaryUser' => $primaryUser->username,'eventname' => $eventName,'kitBarcode' => $kitBarcode->barcode,'eventdate'=>$startdate));
		$holder = DB::table('booking')->lists('bookingID');
		$id = $holder[count($holder)-1];
		$rec = Session::get('rec',NULL);
		for($i = 1; $i <= $rec; $i++){
		    DB::table('bookingUsers')->insert(array('bookingID'=> $id, 'user'=> Input::get($i)));
		}
		return View::make('test');
	}

	/*public function view()
	{
		return View::make('viewBooking');
	}*/
	public function booking(){
    	$table = Datatable::table()
      	->addColumn('Event Name', 'Date In', 'Date Out', 'Primary Recipient', 'Branch', 'View/Edit/Delete')
      	->setUrl(route('api.booking'))
      	->noScript();
    	$this->layout->content = View::make('viewBooking', array('table' => $table));
	}

	public function getBookingDataTable(){

//    	$query = User::select('kitBarcode', 'datein', 'dateout', 'forBranch')->get();
    	return Datatable::query(DB::table('booking') -> where('forBranch', 'ABB'))
    		->showColumns('eventname', 'datein', 'dateout', 'primaryUser', 'forBranch')
            ->addColumn('Edit', function($model) {
                return '<a href='.$model->bookingID.'/edit class="btn btn-default">View/Edit/Delete</a>';
            })
        	->searchColumns('eventname', 'datein', 'dateout', 'primaryUser', 'forBranch')
        	->orderColumns('eventname', 'datein', 'dateout', 'primaryUser', 'forBranch')
        	->make();
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
