<?php
namespace App\Http\Controllers;


use Redirect;



use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Bigwork;
use App\Models\Smallwork;


use Illuminate\Support\Facades\DB;
use Crypt;
use Input;
use Validator;
use File;
use Session;

class BigworkController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        //$dataMission = DB::table('missions')->select('id','mission')->get();
        $dataBig = Bigwork::all();


        return View('work.index',compact('dataBig'));
    }
    public function create()
    {
        return View('work.createbig');
    }
    public function store()
    {
        $inputData = Input::all();
        debug($inputData);
        $id = Bigwork::create($inputData);
        $id = $id['id'];
        if($inputData['smallwork']==''){}
        else {
            foreach ($inputData['smallwork'] as $data) {
                if ($data == '') {
                } else {
                    $save['nama'] = $data;
                    $save['bigwork_id'] = $id;
                    Smallwork::create($save);
                }
            }
        }
        return View('work.createbig');
        //About::create($inputData);
        //return Redirect::to('admin/about');

    }
    public function destroy($id){
        $work= Bigwork::find($id);
        $work->delete();
        return redirect('/admin/work');
    }
    public function edit($id){
        $dataBig = Bigwork::find($id);

        return View('work.editbig',compact('dataBig'));
    }
    public function update($id){
        $inputData = Input::all();
        $bigwork = Bigwork::find($id);
        $bigwork->update($inputData);
        debug($inputData);
        //debug($inputData['smallwork']);
        foreach($inputData['smallwork'] as $data=>$val){
            if($val!='')
            if(Smallwork::where('id','=',$data)->update(['nama' => $val])){

            }
            else{
                $save['nama'] = $val;
                $save['bigwork_id'] = $id;
                Smallwork::create($save);
            }

        }
        return redirect('/admin/work');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    /* public function edit($id){
         $dataMission = Mission::find($id);
         return View('mission.edit',compact('dataMission'));
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
         return redirect()->back();
     }*/
    public function detail($id){
        /*$dataPlace = Tempat::with(['Image'=>function($query){
            $query->addSelect(array('id','filename'));
        }])->where('Tempats.id','=',$id)->get();*/
        $missiones = Mission::lists('mission', 'id');
        $dataMission = DB::table('tempats')->select('nama','alamat','id','owner_id','mission_id')->where('Tempats.mission_id','=',$id)->get();
        return View('mission.detail',compact('dataMission','missiones'));
    }

}
