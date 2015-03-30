<?php

class kitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$xml = simplexml_load_file("http://www.epl.ca/branches.xml");
		//$read = new SimpleXmlElement($xml);
		foreach ($xml as $xml_data){

        $branch = $xml_data->branchInfo->BranchId;
				echo '<pre>'; print_r($branch);
    }
		//return $xml;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	//Allows for the starting of kit creation
	public function create()
	{
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
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

		elseif(Input::get('sub')){
			$assets = input::get('assets',NULL);
			if($assets == 1){
			 goto skip;
			}
			$assets -= 1;
			skip:
			Input::merge(array('assets' => $assets));
			Request::flash();
			$input = input::all();
			$assets = input::get('assets',NULL);
			$kitType = Input::get('kitType');
			$kits = DB::table('kitType')->lists('kitType');
			return View::make('kitManage.create2')->with('kitInput',$kitType)->with('kits', $kits)->with('assets', $assets)->withInput($input);
		}

		//Rules for Validation go HERE
		$message = array(
			'barcode.digits' => 'Barcode must be 14 digits long and begin with 31221',
			'barcode.regex' => 'Barcode must be 14 digits long and begin with 31221',
		);


		$rules = ['kitType' => 'required',
		'assets' => 'required',
		'barcode' => 'required|digits:14|unique:kits|regex:/^(31221)\w{9}/',];

		$assets = input::get('assets',NULL);
		for($i = 0; $i < $assets; $i++){
			$rules[$i] = 'required|digits:7|unique:kitAssets,assetTag';
			$message[$i.'.unique'] = 'Asset Tag Allready Taken';
			$message[$i.'.digits'] = 'Asset Tags are 7 digits';
			$message[$i.'.required'] = 'All Fields Required, Remove an asset if unneeded';
		}


		$validation =Validator::make(Input::all(),$rules, $message);
		if($validation->fails())
		{
			Request::flash();
			$input = input::all();
			$assets = input::get('assets',NULL);
			$kitType = Input::get('kitType');
			$kits = DB::table('kitType')->lists('kitType');
			return View::make('kitManage.create2')->with('kitInput',$kitType)->with('kits', $kits)->with('assets', $assets)->withInput($input)->withErrors($validation->messages());
		}

			DB::beginTransaction();
			//return input::all();
			//Gets a list of kitTypes from database. sets $kits to chosen kittpye
			$kits = DB::table('kitType')->lists('kitType');
			$kitType = Input::get('kitType');
			$kits = $kits[$kitType];
			$assets = Input::get('assets');
			$count = DB::table('kits')->count();//select("select count(*) as cnt FROM kits WHERE names LIKE '%?%' group by ",[$kits])->get();
			//return $count;
			$count += 1;

			$name = $kits.$count;

			$barcode = Input::get('barcode');
			$notes = Input::get('notes');

			DB::table('kits')->insert(array('barcode' => $barcode,'KitType' => $kits,'assets' => $assets,'notes' => $notes, 'name' => $name));

			for($i = 1; $i < $assets+1; $i++){
				$index = $i -1;
				$assetTag = Input::get($index);
				DB::table('kitAssets')->insert(array('kitBarcode' => $barcode,'assetName' => $kits.$i, 'assetTag' => $assetTag));
			}
			DB::commit();
			return Redirect::to('/viewkit/show')->with('message', 'Kit Created');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Respon
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	//public function store()
	//{
	//	$validator = Validator::make(Input::all());
	//	if($validation->fails())
	//	{
	//		return redirect::back()->withInput()->withErrors($validation->messages());
	//	}

	//}

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
	public function edit()
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
