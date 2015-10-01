<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Benefit;
use Illuminate\Support\Facades\DB;

use Input;
use Validator;
use File;
use Session;
class BenefitController extends Controller
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
        $dataBenefit = Benefit::all();
        return View('Benefit.index',compact('dataBenefit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return View('Benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $inputData = Input::all();
        $file = array('image'=>Input::file('image'));
        $rules = array('image'=>'required');
        $validator = Validator::make($file,$rules);
        if($validator->fails()){

        }
        else{
            if(Input::file('image')->isValid()){
                $destinationPath = public_path().'/uploads';
                $fileName = Input::file('image')->getClientOriginalName();
                Input::file('image')->move($destinationPath,$fileName);

                $inputData['logo'] = $fileName;
                $inputData['home_id']=1;
                Benefit::create($inputData);

            }
            else{
                Session::flash('error','uploaded file is not valid');
                return Redirect::to('index');
            }
        }
        return Redirect('/admin/benefit');

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
        $benefit = Benefit::find($id);
        return View('Benefit.edit',compact('benefit'));
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
        $benefitData = Input::all();
        $benefit = Benefit::find($id);
            if($request->hasFile('image')){
                $file = array('image'=>Input::file('image'));
                $rules = array('image'=>'required');
                $validator = Validator::make($file,$rules);
                if($validator->fails()){

                }
                else{
                    if(Input::file('image')->isValid()){
                        File::delete(public_path().'/uploads/'.$benefit['logo']);
                        $destinationPath = public_path().'/uploads/';
                        $fileName = Input::file('image')->getClientOriginalName();
                        Input::file('image')->move($destinationPath,$fileName);

                        $benefitData['logo'] = $fileName;
                        Session::flash('succsess','Upload successfully');
                        $benefit->update($benefitData);
                        return Redirect('/admin/benefit');

                    }
                    else{
                        Session::flash('error','upload file is not valid');
                        return Redirect::to('uploads');
                    }
                }
            }
            else{
                $benefit->update($benefitData);
                return Redirect('/admin/benefit');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Benefit::find($id)->delete();
        return Redirect('/admin/benefit');
    }
}
