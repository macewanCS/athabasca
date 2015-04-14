<?php

class TransferController extends BaseController {

  public function index(){
     return 'nope';
 	 }

  //Function Fills the upcomming transfers table
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

  //Function Fills the incomming transfers table
  public function getTransferTable2(){
    $users = Session::get('userdata',NULL);
    return Datatable::query(DB::table('booking')
    ->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
    ->where('transferin', '>=', date('m/d/Y'))
    ->where('kits.location','<>',$users->homebranch)
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

  //creates the views for the transfer tables to be displayed on
	public function show()
	{

	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
      $querys = DB::table('booking')
      ->join('kits', 'booking.kitBarcode', '=', 'kits.barcode')
      ->where('kits.location', $users->homebranch);

      //Formats collumns on table and calls table controllers
      $data = DB::table('booking')->where('transferin', '>=', date('m/d/Y'));
        $table = Datatable::table()
            ->addColumn('Transfer On','Event Name', 'Transfer To','Current Location', 'Send Transfer')
            ->setUrl(route('api.transfer'))
            ->noScript();
        $table2 =Datatable::table()
            ->addColumn('Transfering On','Event Name', 'Destination', 'Current Location', 'Accept Transfer')
            ->setUrl(route('api.transfer2'))
            ->noScript();

      return View::make('transfers.transfer')->with('table',$table)->with('table2',$table2);
  }


  //Create the edit transfer view
  //gets information from database relevent to kit transfer
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
      ->with('kitdata', $kitdata)->withErrors(['Kit is at the Intended Location'])->with('user', $users);
    }
    return View::make('transfers.edit')->with('data', $data)->with('kitdata', $kitdata)->with('user', $users);
	}

  //called by buttons on transfer edit page.
  //Sets location of kit and returns proper message
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

}
