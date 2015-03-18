<?php

class kitController extends \BaseController {

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

	//Allows for the starting of kit creation
	public function create()
	{
		$kits = DB::table('kitType')->lists('kitType');
		return View::make('kitManage.create')->with('kits', $kits);
	}

	//Renders a page for adding all needed kit information based on create input
	public function create2()
	{
		$assets = Input::get('assets');
		$kitType = Input::get('kitType');
		$kits = DB::table('kitType')->lists('kitType');
		return View::make('kitManage.create2')->with('kits', $kits)->with('kitInput',$kitType)->with('assets',$assets);
	}

	public function create2add()
	{
		//Adds an asset placeholder to the page, allowing for dynamic asset addings

		if(Input::get('add')){
			$assets = input::get('assets',NULL);
			$assets += 1;
			Input::merge(array('assets' => $assets));
			Request::flash();
			$input = input::all();
			$assets = input::get('assets',NULL);
			$kitType = Input::get('kitType');
			$kits = DB::table('kitType')->lists('kitType');
			return View::make('kitManage.create2')->with('kitInput',$kitType)->with('kits', $kits)->with('assets', $assets)->withInput($input);
		}
		elseif(input::get('sub') and input::get('assets',NULL) == 1){
			$assets = input::get('assets',NULL);
			Input::merge(array('assets' => $assets));
			Request::flash();
			$input = input::all();
			$assets = input::get('assets',NULL);
			$kitType = Input::get('kitType');
			$kits = DB::table('kitType')->lists('kitType');
			return View::make('kitManage.create2')->with('kitInput',$kitType)->with('kits', $kits)->with('assets', $assets)->withInput($input)->with('error', 'You need at least one asset');
		}
		elseif(Input::get('sub')){
			$assets = input::get('assets',NULL);
			$assets -= 1;
			Input::merge(array('assets' => $assets));
			Request::flash();
			$input = input::all();
			$assets = input::get('assets',NULL);
			$kitType = Input::get('kitType');
			$kits = DB::table('kitType')->lists('kitType');
			return View::make('kitManage.create2')->with('kitInput',$kitType)->with('kits', $kits)->with('assets', $assets)->withInput($input);
		}

		//Calls the database store function to store new kit
	//	elseif(Input::get('save'))
	//	{

	//	}
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
