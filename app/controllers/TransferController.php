<?php

class TransferController extends BaseController {

  public function index(){
     return 'nope';
 	 }
//       ->where('transferin', '>=', date('m/d/Y')))

 	public function getTransferTable(){
     $users = Session::get('userdata',NULL);
     	return Datatable::query(DB::table('booking')
       ->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
       ->where('kits.location', $users->homebranch)
       ->where('booking.forBranch', '<>', $users->homebranch))
        ->showColumns('transferin','eventname','forBranch','location')
        ->addColumn('Edit', function($model) {
          $model->bookingID;
            return HTML::link('/transfer/'.$model->bookingID.'/edit/', 'Send', array('class' => 'btn btn-default'));
          })
          ->searchColumns('transferin','eventname','forBranch','location')
         	->orderColumns('transferin','eventname','forBranch','location')
         	->make();
         }

  public function getTransferTable2(){
    $users = Session::get('userdata',NULL);
    return Datatable::query(DB::table('booking')
    ->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
    ->where('transferin', '>=', date('m/d/Y'))
    ->where('booking.forBranch', $users->homebranch))
        ->showColumns('transferin','eventname','forBranch','location')
        ->addColumn('Edit', function($model) {
          $model->bookingID;
              return HTML::link('/transfer/'.$model->bookingID.'/edit/', 'Accept', array('class' => 'btn btn-default'));
            })
            ->searchColumns('transferin','eventname','forBranch','location')
            ->orderColumns('transferin','eventname','forBranch','location')
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
      $querys = DB::table('booking')
      ->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
      ->where('kits.location', $users->homebranch);

      //return $users->homebranch;

      $data = DB::table('booking')->where('transferin', '>=', date('m/d/Y'));
        $table = Datatable::table()
            ->addColumn('Transfer On','Event Name', 'Transfer To','Current Location', 'Send Transfer')
            ->setUrl(route('api.transfer'))
            ->noScript();
        $table2 =Datatable::table()
            ->addColumn('Transfering On','Event Name', 'Transfering From', 'Current Location', 'Accept Transfer')
            ->setUrl(route('api.transfer2'))
            ->noScript();

      return View::make('transfers.transfer')->with('table',$table)->with('table2',$table2);
  }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $users = Session::get('userdata',NULL);
    if($users == NULL){
        return Redirect::to('/');
    }
    $data = DB::table('booking')->where('bookingID', $id)->get();
    $data = $data[0];
    $kitdata = DB::table('kits')->where('barcode',$data->kitBarcode)->get();
    $kitdata = $kitdata[0];
    if($data->forBranch == $kitdata->location){
      return View::make('transfers.edit')->with('data', $data)
      ->with('kitdata', $kitdata)->withErrors(['Kit is intended location'])->with('user', $users);
    }
    return View::make('transfers.edit')->with('data', $data)->with('kitdata', $kitdata)->with('user', $users);
	}

  public function edit2($id)
	{
    if(Input::get('intransit')){
      $barcode = DB::table('booking')->where('bookingID', $id)->pluck('kitBarcode');
      DB::table('kits')->where('barcode', $barcode)->update(array('location' => 'intransit'));
      return Redirect::to(URL::previous())->withErrors(['Kit has Been put In Transit']);
    }

    if(Input::get('arrived')){
      $location = DB::table('booking')->where('bookingID', $id)->pluck('forBranch');
      $barcode = DB::table('booking')->where('bookingID', $id)->pluck('kitBarcode');
      DB::table('kits')->where('barcode', $barcode)->update(array('location' => $location));
      return Redirect::to(URL::previous())->withErrors(['Kit Has Arrived']);
    }
    return Input::all();

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
