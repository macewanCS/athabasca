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
		return View::make('test');
	}

	public function view()
	{
		return View::make('viewBooking');
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
