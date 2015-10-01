<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Tempat;
use App\Models\Kategori;
use App\Models\Mission;


use Illuminate\Support\Facades\DB;
use Crypt;
use Input;
use Validator;
use File;
use Session;

class TempatController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $kategories = Kategori::lists('nama', 'id');

        if(Request::ajax()){
            $data = Input::all();
            if($data['method']=='search'){

                $dataTempat = DB::table('tempats')->select('nama','alamat','id','owner_id','kategori_id')->where('nama','LIKE','%'.$data['text'].'%')
                    ->orwhere('alamat','LIKE','%'.$data['text'].'%')->get();
               // $kategories = Kategori::lists('nama', 'id');
                return View('tempat.ajaxTableTempat',compact('dataTempat','kategories'));
            }
        }



        $dataPlace = DB::table('tempats')->select('nama','alamat','id','owner_id','kategori_id')->get();
        return View('tempat.index',compact('dataPlace','kategories'));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
        $idOwner = $id;
        $kategories = Kategori::lists('nama', 'id');
        $missiones = Mission::lists('mission', 'id');
        return View('tempat.create',compact('idOwner','kategories','missiones'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $inputData = Input::all();

        $validator = Validator::make($inputData, Tempat::$rules, Tempat::$messages);
        if($validator->fails())
        {
            debug($validator->fails());

        }
        //$response = $this->image->upload($photo);
        $afterSave = Tempat::create($inputData);


        return Redirect()->route('insertImage',array('id'=>$afterSave->id));
	}
    public function insertImage(){
        if(Request::all()){
            $id = Request::all();
            $place = Tempat::find($id['id']);

            return View('tempat.create-place-image',compact('place'));
        }

        else
            return View('errors.notfound');
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function detail($id){
        /*$dataPlace  = Tempat::find($id)->load('Image');*/
        //$dataPlace3 = Tempat::with('Image')->where('Tempats.id','=',$id)->get();
        $dataPlace = Tempat::with(['Image'=>function($query){
            $query->addSelect(array('id','filename'));
        }])->where('Tempats.id','=',$id)->get();


        return View('tempat.detail',compact('dataPlace'));
    }
    public function destroy($id){
        $tempat = Tempat::find($id);
        $tempat->Image()->delete();
        $tempat->delete();
        return redirect()->back();
    }

	public function edit($id)
	{
        $kategories = Kategori::lists('nama', 'id');
        $missiones = Mission::lists('mission', 'id');
		$dataTempat = Tempat::find($id);
        return View('tempat.edit',compact('dataTempat','kategories','missiones'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $tempatData = Input::all();
        $tempat = Tempat::find($id);

        $validator = Validator::make($tempatData, Tempat::$rules, Tempat::$messages);
        if($validator->fails())
        {
            debug($validator->fails());

        }
        $tempat->update($tempatData);
        return Redirect('/admin/tempat/');

    }
    public function qrcode($id){
        $data = Tempat::find($id);
        $encrypted = Crypt::encrypt($data['id']);

        //AIzaSyDveYjDmVWAamjtO07ibY55vJMyitBRRpA
        //$result= "https://gopinus.com/api/checkin/".$encrypted."/";
        $result= "http://checkin.co.id/api/checkin/".$encrypted."/";

       /* $apiKey = 'AIzaSyAtCK2RkH6bVQ1sZaLAeDuc-VG6SfiXGRs';

            //Long to Short URL

       /* $postData = array('longUrl' => 'http://checkin.co.id/api/checkin/'.$encrypted, 'key' => $apiKey);
        $curlObj = curl_init();

        $jsonData = json_encode($postData);
        curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyC-UA38qlyWbWrsFQXTdFr5KpoJH8V9B20');

        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlObj, CURLOPT_HEADER, 0);
        curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($curlObj, CURLOPT_POST, 1);
        curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

        $response = curl_exec($curlObj);

//change the response json string to object
        $json = json_decode($response);
        curl_close($curlObj);*/

        //debug($json);


        $chart = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$result;
        return View('tempat.qrcode',compact('chart'));
    }
    public function checkin($id,$userId,$lat,$long){
        //$decrypted = Crypt::decrypt($id);
        //$data = Tempat::find($decrypted);
        $data = Tempat::find($id);
        $data->visit = $data->visit -1;
        $data->save();
        $user = User::find($userId);
        $user->point = $data->visit  + 1;
        $user->save();

    }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

}
