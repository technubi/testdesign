<?php
namespace App\Http\Controllers;

use App\Benefit;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Home;
use App\What;
use App\Merchant;
use App\Information;
use Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;

use Session;
use Auth;
class HomeController extends Controller
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
    
    /*public function __construct()
    {
        $data = \Auth::User()->roles;
        //debug($data[0]['name']);
        $currentRoles = $data[0]['name'];

        if($currentRoles=='user'){
            debug('home controller dapat'.$currentRoles);
            $this->middleware('auth', ['except' => ['logout','indexall','index']]);
        }


    }*/
	public function index()
	{
        return view('home.index');
    }
    public function indexadmin(){
        return view('home.admin');
    }
    public function indexowner(){
        return view('home.owner');
    }
    public function indexall(){
        return view('home.all');
    }


}