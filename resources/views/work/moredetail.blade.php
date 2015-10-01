@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">

    <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3">

    </div>
    <div class="col-md-8 title-kategori">
             <a href="{{URL::to('/admin/smallwork/detail/'.$subdata->smallwork_id) }}">
                                    <button class="btn btn-success">Back</button>
                                </a>
             <a href="{{URL::to('/admin/detailwork/addphoto/'.$subdata->id) }}">
                                                 <button class="btn btn-success">Add Photo</button>
                                             </a>

        </div>
        <div class="col-md-12 table-kategori">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 12%">Name</td>
                        <td style="width: 12%">Location</td>
                        <td style="width: 12%">Client</td>
                        <td style="width: 12%">Detail</td>
                        <td style="width: 12%">Design Complete</td>
                        <td style="width: 12%">Building Complete</td>
                        <td style="width: 8%">site area</td>
                        <td style="width: 8%">floor area</td>
                        <td style="width: 5%">floor</td>

                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td style="width: 12%">{{$subdata->nama}}</td>
                        <td style="width: 12%">{{$subdata->location}}</td>
                        <td style="width: 12%">{{$subdata->client}}</td>
                        <td style="width: 12%">{{$subdata->detail}}</td>
                        <td style="width: 12%">{{$subdata->designcom}}</td>
                        <td style="width: 12%">{{$subdata->buildcom}}</td>
                        <td style="width: 12%">{{$subdata->sitearea}} sqm</td>
                        <td style="width: 12%">{{$subdata->floorarea}} sqm</td>
                        <td style="width: 12%">{{$subdata->floor}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            @Foreach($subdata->Image as $imadata)
            <div class="col-md-3">
                                  <div class="col-md-12">
                                    <img src="{{asset('public/uploads/icon_size/'.$imadata->filename.'.jpg')}}" style="width:100%" data-src="" alt="Third slide">
                                  </div>
                                  <div class="col-md-12">
                                    <a href="{{URL::to('/admin/detailwork/delphoto/'.$imadata->id.'/'.$subdata->id) }}">
                                        <button class="btn btn-success">Delete</button>
                                    </a>
                                  </div>
                            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
  </section>
@stop