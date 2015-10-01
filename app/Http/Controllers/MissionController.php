<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Redirect;

use App\Http\Controllers\Controller;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Validator;
use File;
use Session;


class MissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $dataMission = DB::table('missions')->select('id','mission')->get();

        return View('mission.index',compact('dataMission'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function edit($id){
        $dataMission = Mission::find($id);
        return View('mission.edit',compact('dataMission'));
    }

    public function create()
    {
        return View('mission.create');
    }

    public function store()
    {
        $inputData = Input::all();
        Mission::create($inputData);
        return Redirect::to('admin/mission');

    }

    public function update($id)
    {
        $datamission = Input::all();
        $mission = mission::find($id);

        $mission->update($datamission);
        return Redirect('/admin/mission/');

    }


    public function destroy($id)
    {
        $mission = Mission::find($id);
        foreach($mission->Tempat as $data){
            $data = Tempat::find($data['id']);
            $data->mission_id = 0;
            $data->save();

        }
        $mission->delete();
        return Redirect::to('admin/mission');
        //$mission->delete();
        //return redirect()->back();
        /*
        return redirect()->back();*/
    }
    public function detail($id){
        /*$dataPlace = Tempat::with(['Image'=>function($query){
            $query->addSelect(array('id','filename'));
        }])->where('Tempats.id','=',$id)->get();*/
        $missiones = Mission::lists('mission', 'id');
        $dataMission = DB::table('tempats')->select('nama','alamat','id','owner_id','mission_id')->where('Tempats.mission_id','=',$id)->get();
        return View('mission.detail',compact('dataMission','missiones'));
    }

}
