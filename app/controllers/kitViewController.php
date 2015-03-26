<?php

class kitViewController extends \BaseController {
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
	/*public function create()
	{
	    $kittype = Input::get('Kit Type');
	    if($kittype == Null){
		    return View::make('ViewKits');
		}
		else{
		    return View::make("ViewKits")->with($kittype);
		}
	}*/


	public function kit(){

    	$table = Datatable::table()
      	->addColumn('Kit Name', 'Kit Barcode', 'Damage Description', 'Notes')
      	->setUrl(route('api.kit'))
      	->noScript();
    	$this->layout->content = View::make('ViewKits', array('table' => $table));
	}

	public function getKitDataTable(){
    	return Datatable::query(DB::table('kits'))
    		->showColumns('name', 'barcode', 'notes')
        	->searchColumns('name', 'barcode', 'notes')
        	->orderColumns('name', 'barcode', 'notes')
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
