<?php namespace App\Http\Controllers;

use App\Models\owner;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;


use Crypt;
use Input;
use Validator;
use File;
use Session;

class OwnerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        if(Request::ajax()){
            $data = Input::all();
            if($data['method']=='search'){

                $dataTempat = DB::table('owners')->select('first_name','alamat','id','notelp')->where('nama','LIKE','%'.$data['text'].'%')
                    ->orwhere('alamat','LIKE','%'.$data['text'].'%')->get();
                // $kategories = Kategori::lists('nama', 'id');
                return View('owner.ajaxTableOwner',compact('dataOwner'));
            }
        }
        $dataOwner = DB::table('owners')->select('first_name','alamat','id','notelp')->get();
		return View('owner.index',compact('dataOwner'));
	}
    public function detail($id){
        $dataOwner = Owner::find($id);
        return View('owner.detail',compact('dataOwner'));
    }
    public function edit($id){
        $dataOwner = Owner::find($id);
        return View('owner.edit',compact('dataOwner'));
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


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
        $owner = Owner::find($id);
foreach($owner->Tempat as $data){
    $data->Image()->delete();

}
        $owner->Tempat()->delete();
        $owner->delete();
        return redirect()->back();
        /*
        return redirect()->back();*/
	}

}
