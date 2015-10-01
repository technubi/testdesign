<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Owner;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;

use Session;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    /*PERLU DI INGAT*/


    public function index()
    {
        if(!Auth::admin()->check()){
            return View('errors.RestrictedArea');
        }
        $dataAdmin = Admin::all();
        return view('admin.index',compact('dataAdmin'));
    }
    public function edit($id){
        if(!Auth::admin()->check()){
            return View('errors.RestrictedArea');
        }
        $user = Admin::where('id','=', Auth::admin()->get('admin.id'))->first();

        $dataAdmin = Admin::find($id);
        return View('admin.edit',compact('dataAdmin'));
    }
    public function delete($id){
        Admin::find($id)->delete();
        $dataAdmin = Admin::all();
        return view('admin.index',compact('dataAdmin'));
    }



}
