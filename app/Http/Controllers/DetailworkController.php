<?php
namespace App\Http\Controllers;


use Redirect;



use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Bigwork;
use App\Models\Smallwork;
use App\Models\Detailwork;
use App\Models\Image;


use Illuminate\Support\Facades\DB;
use Crypt;
use Input;
use Validator;
use File;
use Session;

class DetailworkController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index($id)
    {
        //$dataMission = DB::table('missions')->select('id','mission')->get();
        $data = Smallwork::find($id);
        return View('work.detailwork',compact('data'));
    }
    public function create($id)
    {
        $data = Smallwork::find($id);

        return View('work.createdetail',compact('data'));
    }
    public function store(){
        $inputData = Input::all();
        Detailwork::create($inputData);
        return redirect('/admin/work');
    }
    public function destroy($id)
    {
        $data = Detailwork::find($id);
        $data->delete();
        return redirect('/admin/work');
    }

    public function edit($id){
        $data = Detailwork::find($id);
        return View('work.editdetail', compact('data'));
    }


    public function update($id){
        $inputData = Input::all();
        $detail = Detailwork::find($id);
        $detail->update($inputData);
        return redirect('/admin/work');

    }
    public function detail($id){
        $subdata = Detailwork::find($id);
        return View('work.moredetail',compact('subdata'));
    }
    public function insertImage($id){

        if($id){
            $detail = Detailwork::find($id);

            return View('work.add-image',compact('detail','id'));
        }

        else
            return View('errors.notfound');
    }
    public function deleteImage($id,$idpro){
        if($id){
            $image = Image::find($id);
            $image->delete();
            $subdata = Detailwork::find($idpro);
            return View('work.moredetail',compact('subdata'));
        }
        else{
            return View('errors.notfound');
        }
    }

}
