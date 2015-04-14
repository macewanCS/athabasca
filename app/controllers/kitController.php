<?php

class kitController extends \BaseController {

	//Test function for loading branches from xml
	public function index()
	{
		$xml = simplexml_load_file("http://www.epl.ca/branches.xml");
		//$read = new SimpleXmlElement($xml);
		foreach ($xml as $xml_data){

        $branch = $xml_data->branchInfo->BranchId;
				echo '<pre>'; print_r($branch);
    }
	}

	//Allows for the starting of kit creation
	//passes data entered to create2 for second step
	public function create()
	{
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
	    if($users->role == "admin"){
		    $kits = DB::table('kitType')->lists('kitType');
		    return View::make('kitManage.create')->with('kits', $kits);
		}
		return Redirect::to('/')->with('errors','You must be an administrator to access this page.');
	}

	//Renders a page for adding all needed kit information based on create input

	public function create2()
	{
		$assets = Input::get('assets');
		$kitType = Input::get('kitType');
		$kits = DB::table('kitType')->lists('kitType');
		return View::make('kitManage.create2')->with('kits', $kits)->with('kitInput',$kitType)->with('assets',$assets);
	}


	//Is called when button on create2 is clicked,
	//has functions add asset, sub asset, or save kit
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
		//removes last box when remove asset is clicked
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

		//custom validation messsage returned by form
		$message = array(
			'barcode.digits' => 'Barcode must be 14 digits long and begin with 31221',
			'barcode.regex' => 'Barcode must be 14 digits long and begin with 31221',
		);

		//custom rules for validation of kit
		$rules = ['kitType' => 'required',
		'assets' => 'required',
		'barcode' => 'required|digits:14|unique:kits|regex:/^(31221)\w{9}/',];

		//creates rules and messages for a dynamic amount of assets
		//depends on how many  assets are being added for kit
		$assets = input::get('assets',NULL);
		for($i = 0; $i < $assets; $i++){
			$rules[$i] = 'required|digits:6|unique:kitAssets,assetTag';
			$message[$i.'.unique'] = 'Asset Tag Allready Taken';
			$message[$i.'.digits'] = 'Asset Tags are 6 digits';
			$message[$i.'.required'] = 'All Fields Required, Remove an asset if unneeded';
		}

		//validates data entered based on rules above
		//Otherwise saves kit to database and returns with message
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
			//Gets a list of kitTypes from database. sets $kits to chosen kittypee
			$kits = DB::table('kitType')->lists('kitType');
			$kitType = Input::get('kitType');
			$kits = $kits[$kitType];
			$assets = Input::get('assets');
			$count = DB::table('kits')->count();//select("select count(*) as cnt FROM kits WHERE names LIKE '%?%' group by ",[$kits])->get();
			$count += 1;
			$name = $kits.$count;

			//gets the rest of input
			$barcode = Input::get('barcode');
			$notes = Input::get('notes');

			//Save to kit database
			DB::table('kits')->insert(array('barcode' => $barcode,'KitType' => $kits,'assets' => $assets,'notes' => $notes, 'name' => $name));

			//Save to kit assets database
			for($i = 1; $i < $assets+1; $i++){
				$index = $i -1;
				$assetTag = Input::get($index);
				DB::table('kitAssets')->insert(array('kitBarcode' => $barcode,'assetName' => $kits.$i, 'assetTag' => $assetTag));
			}
			DB::commit();
			return Redirect::to('/viewkit/show')->with('message', 'Kit Created');
	}
}
