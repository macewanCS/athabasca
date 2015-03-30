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

	}

  public function edit2($id2)
  {
    $kitinfo = DB::table('kits')->where('barcode',$id2)->get();
    if (!count($kitinfo)){
      App::abort(404);
    }
    //To save kit notes
    if(Input::get('savenotes')){
      DB::table('kits')->where('barcode', $id2)->update(array('notes' => Input::get('notes')));
      return Redirect::to(URL::previous())->withErrors(['Note Saved']);
    }
    //To report kit is fixed
    if(Input::get('unreport')){
      DB::table('kits')->where('barcode', $id2)->update(array('damageDescription' => null));
      DB::table('kits')->where('barcode', $id2)->update(array('damaged' => null));
      return Redirect::to(URL::previous())->withErrors(['Damage Removed']);
    }
    //To report damage
    elseif(Input::get('report')){
      DB::table('kits')->where('barcode', $id2)->update(array('damaged' => 'Yes'));
      return Redirect::to(URL::previous())->withErrors(['Please Describe the Damage']);
    }
    elseif(Input::get('senddesc')){
      DB::table('kits')->where('barcode', $id2)->update(array('damageDescription' => Input::get('damage')));
      return Redirect::to(URL::previous())->withErrors(['Damage Description Saved']);
    }
    return 'error, howd you find me?';
  }


	public function getKitDataTable(){
    	return Datatable::query(DB::table('kits'))
    		->showColumns('name', 'barcode', 'notes', 'damaged')
        ->addColumn('Edit', function($model) {
          $model->barcode;
            return HTML::link('/viewkit/'.$model->barcode.'/edit/', 'View/Edit', array('class' => 'btn btn-default'));
        })
        	->searchColumns('name', 'barcode', 'notes', 'damaged')
        	->orderColumns('name', 'barcode', 'notes', 'damaged')
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
	    $users = Session::get('userdata',NULL);
	    if($users == NULL){
	        return Redirect::to('/');
	    }
    	$table = Datatable::table()
      	->addColumn('Kit Name', 'Kit Barcode', 'Notes', 'Damaged?', 'View/Edit')
      	->setUrl(route('api.kit'))
      	->setOptions('defaultContent', '')
      	->noScript();
    	return View::make('ViewKits', array('table' => $table));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $kitinfo = DB::table('kits')->where('barcode',$id)->get();
    if (!count($kitinfo)){
      App::abort(404);
    }
    $assets = DB::table('kitAssets')->where('kitBarcode', $id)->lists('assetName');
    $assettag = DB::table('kitAssets')->where('kitBarcode', $id)->lists('assetTag');
    $kitinfo = $kitinfo[0];
		return view::make('kitManage/edit')->with('kitinfo', $kitinfo)
    ->with('assets', $assets)
    ->with('assettag', $assettag);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}


}
