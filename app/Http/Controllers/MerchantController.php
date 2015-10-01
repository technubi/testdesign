<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Merchant;
use App\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;
use File;

use Session;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }

    public function index()
    {
        $dataMerchant = Merchant::all();
        return view('merchant.index',compact('dataMerchant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $Merchants = Home::with('Merchant')->get();

        return view('merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $inputData = Input::all();

        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {

        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = public_path().'/uploads/'; // upload path
                $fileName = Input::file('image')->getClientOriginalName(); // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                $inputData['logo']= $fileName;
                $inputData['home_id']= 1;
                Merchant::create($inputData);
                //return Redirect::to('/admin/merchant');

            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('index');

            }
        }


        return Redirect('/admin/merchant');
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
        $merchant = Merchant::find($id);
        return view('merchant.edit',compact('merchant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $merchantData = Input::all();
        $merchant = Merchant::find($id);
        /*$merchant->update($merchantData);
        return Redirect('/admin/merchant');*/



            if ($request->hasFile('image')){
                $file = array('image' => Input::file('image'));
                // setting up rules
                $rules = array('image' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
                // doing the validation, passing post data, rules and the messages
                $validator = Validator::make($file, $rules);
                if ($validator->fails()) {
                    // send back to the page with the input data and errors
                    //return Redirect::to('upload')->withInput()->withErrors($validator);

                    //var_dump('gagal1');
                }
                else {
                    if (Input::file('image')->isValid()) {
                        File::delete(public_path() . '/uploads/' . $merchant['logo']);
                        $destinationPath = public_path() . '/uploads/'; // upload path
                        $fileName = Input::file('image')->getClientOriginalName(); // renameing image
                        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                        $merchantData['logo'] = $fileName;
                        Session::flash('success', 'Upload successfully');
                        $merchant->update($merchantData);
                        return Redirect('/admin/merchant');

                    } else {
                        // sending back with error message.
                        Session::flash('error', 'uploaded file is not valid');
                        return Redirect::to('upload');

                    }
                }
            }
            else{
                $merchant->update($merchantData);
                return Redirect('/admin/merchant');
            }
        /*else {
            // checking file is valid.

        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Merchant::find($id)->delete();
        return Redirect('/admin/merchant');
    }
}
