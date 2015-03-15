<?php

class bookingController extends \BaseController {

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
	    $rec = Session::get('rec',NULL);
	    if ($rec != NULL){
	        $rec += 1;
	    }
	    else{
		    $rec = 1;
		}
		Session::put('rec',$rec);
		return View::make('createBooking');
	}
	
	public function check()
	{
		if(Input::get('add')){
		    return $this->create();
		} elseif(Input::get('create')){
		    return $this->confirm();
		}
	}
	
	public function confirm()
	{
		return View::make('test');
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
