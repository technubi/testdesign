<?php

namespace App\Http\Controllers;

use DebugBar\DebugBar;
use Request;
use App\Information;
use Illuminate\Contracts\Encryption\DecryptException;
use Crypt;
use Input;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['logout','member']]);
    }
    public function index()
    {
        $dataInformation= Information::all();
        return view('Information.index',compact('dataInformation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {



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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
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
        Information::find($id)->delete();
        return Redirect('/admin/information');
    }

    public function verifikasi($id){
        $information= Information::find($id);
        $data['lunas'] = 1;
        $information->update($data);
        return Redirect('/admin/information');
    }
    public function member(){

        if(Request::ajax()) {
            $data = Input::all();
            $datax=  json_decode($data['json'],true);
            $result = Information::where('username',$datax[0]['username'])->first();
            if($result){
                $secret = $result['password'];
                $decrypted_secret = Crypt::decrypt($secret);

                if($decrypted_secret == $datax[0]['kode'] ){
                    $response['nama'] = $result['nama'];
                    $response['email'] = $result['email'];
                    $response['lunas'] = $result['lunas'];
                    $response['alamat'] = $result['alamat'];
                    $response['result']= 'ok';

                    return $response;
                }
                else{
                    $response['result']= 'fail';
                    return $response;
                }
            }
            else{
                $response['result']= 'notfound';
                return $response;
            }






        }
        return view('Information.member');
    }


/*$.ajax({
url:"member",
method:"post",
cache: false,
contentType: "application/json; charset=utf-8",
dataType:"json",
data: {json:JSON.stringify(jsonitem)},
success:function(data){
    alert(data);
}
});*/
}
