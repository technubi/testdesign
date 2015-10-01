<?php
namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Mission;


use Illuminate\Support\Facades\DB;
use Crypt;
use Input;
use Validator;
use File;
use Session;

class UserController extends Controller {

    public function getHome()
    {
        return view('panels.user.home');
    }

    public function index(){
        if(Request::ajax()){
            $data = Input::all();
            if($data['method']=='search'){

                $dataTempat = DB::table('users')->select('first_name','alamat','id','notelp')->where('nama','LIKE','%'.$data['text'].'%')
                    ->orwhere('alamat','LIKE','%'.$data['text'].'%')->get();
                // $kategories = Kategori::lists('nama', 'id');
                return View('user.ajaxTableUser',compact('dataUser'));
            }
        }
        $dataUser = DB::table('users')->select('first_name','last_name','id','email','alamat')->get();
        return View('user.index',compact('dataUser'));
    }
    public function edit($id){
        $dataUser = User::find($id);
        return View('user.edit',compact('dataUser'));
    }
    public function getInfo($email){
        $dataUser = DB::table('users')->select('id','first_name','last_name','alamat','notelp','point','pending')->where('email','LIKE','%'.$email)->get();

        if(!$dataUser) {
            $dataUser[0]['result'] = 'fail';
            return json_encode($dataUser);
        }
        elseif($dataUser) {
            $dataUser[0]->result = 'success';
            return json_encode($dataUser, true);
        }

    }
}