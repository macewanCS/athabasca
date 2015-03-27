<?php

class TransferController extends BaseController {

  public function index(){
     return 'nope';
 	 }

 	public function getTransferTable(){
     	return Datatable::query(DB::table('booking'))
        ->showColumns('eventdate', 'transferin', 'transferout', 'forBranch')
        ->addColumn('Edit', function($model) {
          $model->bookingID;
            return HTML::link('/transfer/'.$model->bookingID.'/edit/', 'Edit', array('class' => 'btn btn-default'));
          })
          ->searchColumns('eventdate', 'transferin', 'transferout', 'forBranch')
         	->orderColumns('eventdate', 'transferin', 'transferout', 'forBranch')
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
	public function show()
	{
      $table = Datatable::table()
        ->addColumn('Event', 'Transfer In', 'Transfer Out', 'Branch', 'Edit')
        ->setUrl(route('api.transfer'))
        ->noScript();
      return View::make('transfer', array('table' => $table));
  }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $data = DB::table('booking')->where('bookingID', $id)->first();
    //dd($data);
    return View::make('transfers.edit')->with('data', $data);
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
