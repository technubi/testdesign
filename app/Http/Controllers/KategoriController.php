<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Redirect;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Tempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Validator;
use File;
use Session;

class KategoriController extends Controller {

    public function index()
    {
        $dataKategori = DB::table('kategoris')->select('id','nama')->get();
        return View('kategori.index',compact('dataKategori'));
    }

    public function edit($id){
        $dataKategori = Kategori::find($id);
        return View('kategori.edit',compact('dataKategori'));
    }

    public function create()
    {
        return View('kategori.create');
    }

    public function store()
    {
        $inputData = Input::all();
        Kategori::create($inputData);
        return Redirect::to('admin/kategori');

    }

    public function update($id)
    {
        $dataKategori = Input::all();
        $kategori = Kategori::find($id);

        $kategori->update($dataKategori);
        return Redirect('/admin/kategori/');

    }


    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        foreach($kategori->Tempat as $data){
            $data = Tempat::find($data['id']);
            $data->kategori_id = 0;
            $data->save();

        }
        $kategori->delete();
        return View('admin.index');
        //$kategori->delete();
        //return redirect()->back();
        /*
        return redirect()->back();*/
    }
    public function detail($id){
        /*$dataPlace = Tempat::with(['Image'=>function($query){
            $query->addSelect(array('id','filename'));
        }])->where('Tempats.id','=',$id)->get();*/
        $kategories = Kategori::lists('nama', 'id');
        $dataPlace = DB::table('tempats')->select('nama','alamat','id','owner_id','kategori_id')->where('Tempats.kategori_id','=',$id)->get();
        return View('kategori.detail',compact('dataPlace','kategories'));
    }

}
