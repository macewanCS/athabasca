<?php

class TransferController extends BaseController {

  public function index(){
     return 'nope';
 	 }

 	public function getTransferTable(){
     	return Datatable::query(DB::table('booking')->where('transferin', '>=', date('m/d/Y')))
        ->showColumns('transferin','eventname','forBranch')
        ->addColumn('Edit', function($model) {
          $model->bookingID;
            return HTML::link('/transfer/'.$model->bookingID.'/edit/', 'Edit', array('class' => 'btn btn-default'));
          })
          ->searchColumns('transferin','eventname','forBranch')
         	->orderColumns('transferin','eventname','forBranch')
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
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
        $table = Datatable::table()
            ->addColumn('Transfer On','Event Name', 'Transfer To', 'Actions')
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
