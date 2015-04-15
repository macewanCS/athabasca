<?php

class bookingViewController extends BaseController {
  
  public function index(){
     return 'nope';
 	 }
 	//Function Fills the All Bookings Table
	public function getBookingDataTable(){
    	return Datatable::query(DB::table('booking') -> join('kits', 'booking.kitBarcode', '=', 'kits.barcode') 
    		->where('transferin', '>=', date('m/d/Y')))
    		->showColumns('eventname', 'datein', 'dateout', 'primaryUser' ,'forBranch', 'name')
            ->addColumn('Delete', function($model) {
            	$model->bookingID;
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
	//Function builds the view for the all bookings table
	public function show()
	{
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
	    if($users->role == 'admin'){
    	    $table = Datatable::table()
      	    ->addColumn('Event Name', 'Date In', 'Date Out', 'Primary Recipient', 'Branch', 'Kit Name', 'Delete')
      	    ->setUrl(route('api.booking'))
      	    ->noScript();
    	    return View::make('viewBooking', array('table' => $table));
    	}
    	return Redirect::to('/')->with('errors','You must be an administrator to access this page.');
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
