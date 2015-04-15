<?php

class bookingUserViewController extends BaseController {

  public function index(){
 	 }
  	//Function Fills the sers bookings table
	public function getUserBookingDataTable(){
		$users = Session::get('userdata',NULL);
    	return Datatable::query(DB::table('booking')
    		->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
    		->leftjoin('bookingUsers', 'booking.bookingID', '=', 'bookingUsers.bookingID')
    		->where('primaryUser' ,$users->username) ->where('transferin', '>=', date('m/d/Y'))
    		->orWhere('bookingUsers.email', $users->email)->where('transferin', '>=', date('m/d/Y')))
    		->showColumns('eventname', 'datein', 'dateout', 'primaryUser' ,'forBranch', 'name')
        	->searchColumns('eventname', 'datein', 'dateout', 'primaryUser' ,'forBranch', 'name')
        	->orderColumns('eventname', 'datein', 'dateout', 'primaryUser', 'forBranch', 'name')
        	->make();
	}
  	//Function Fills the users branch bookings table
  	public function getUserBookingDataTable2(){
    	$users = Session::get('userdata',NULL);
    	return Datatable::query(DB::table('booking')
     		->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
    		->where('transferin', '>=', date('m/d/Y'))
    		->where('booking.forBranch', $users->homebranch))
        	->showColumns('eventname', 'datein', 'dateout', 'primaryUser' ,'forBranch', 'name')
        	->addColumn('Delete', function($model) {
      			return HTML::link('/delete/'.$model->bookingID.'/edit/', 'Delete', array('class' => 'btn btn-default'));
        	})
        	->searchColumns('eventname', 'datein', 'dateout', 'primaryUser' ,'forBranch', 'name')
        	->orderColumns('eventname', 'datein', 'dateout', 'primaryUser', 'forBranch', 'name')
        	->make();
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//creates the views for the users bookings to be displayed on
	public function show()
	{
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
    	$table = Datatable::table()
      	->addColumn('Event Name', 'Date In', 'Date Out', 'Primary Recipient', 'Branch', 'Kit Name')
      	->setUrl(route('api.userbooking'))
      	->noScript();
      	 $table2 = Datatable::table()
      	->addColumn('Event Name', 'Date In', 'Date Out', 'Primary Recipient', 'Branch', 'Kit Name', 'Delete')
      	->setUrl(route('api.userbooking2'))
      	->noScript();
      	if (Session::get('created',NULL)!=NULL){
      	    return View::make('viewUserBooking')->with('table',$table)->with('table2',$table2)->with('created','The Booking Was Created');
      	}
      	else{
      		return View::make('viewUserBooking')->with('table',$table)->with('table2',$table2);
        }
  }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

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
