<?php

namespace App\Http\Controllers;

use App\Slideshow;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Input;
use Validator;
use File;

class SlideshowController extends Controller
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
        $dataSlideshow = Slideshow::all();
        return View('Slideshow.index',compact('dataSlideshow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        //$slideshow = Slideshow::with('Slideshow')->get();
       //var_dump($slideshow);
        return View('Slideshow.create');
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

                $inputData['gambar'] = $fileName;
                $inputData['path'] = $destinationPath.''.$fileName;
                $inputData['home_id']=1;
                Slideshow::create($inputData);

            }
            else{
                Session::flash('error','uploaded file is not valid');
                return Redirect::to('index');
            }
        }
        return Redirect('/admin/slideshow');
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
        $slideshow = Slideshow::find($id);
        return view('slideshow.edit',compact('slideshow'));
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
        $slideshowData = Input::all();
        $slideshow = Slideshow::find($id);
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
                    $slideshow->update($merchantData);
                    return Redirect('/admin/slideshow');

                } else {
                    // sending back with error message.
                    Session::flash('error', 'uploaded file is not valid');
                    return Redirect::to('upload');

                }
            }
        }
        else{
            $slideshow->update($slideshowData);
            return Redirect('/admin/slideshow');
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
        Slideshow::find($id)->delete();
        return Redirect('/admin/slideshow');
    }
}
