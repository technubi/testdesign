@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">

    <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
        <h2>Category : {{$data->nama}}</h2>
    </div>
    <div class="col-md-8  title-kategori">
    <a href="{{URL::to('/admin/work') }}">
                            <button class="btn btn-warning">Back</button>
                        </a>
                    <a href="{{URL::to('/admin/smallwork/detailwork/create/'.$data->id) }}">
                        <button class="btn btn-success">Add Project</button>
                    </a>

        </div>
        <div class="col-md-12 table-kategori">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 12%">Name</td>
                        <td style="width: 12%">Location</td>
                        <td style="width: 12%">Client</td>
                        <td style="width: 12%">Option</td>
                    </tr>
                </thead>
                <tbody>
                <?php debug($data[0]);?>
                    @foreach($data->Detailwork as $subdata)
                    <tr>
                        <td style="width: 12%">{{$subdata->nama}}</td>
                        <td style="width: 12%">{{$subdata->location}}</td>
                        <td style="width: 12%">{{$subdata->client}}</td>
                        <td>
                            <a href="{{URL::to('admin/detailwork/edit/'.$subdata->id) }}">
                                 <button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button>
                            </a>
                            <a href="{{URL::to('admin/detail/delete/'.$subdata->id) }}">
                                <button class="btn btn-warning">Del</button>
                            </a>
                            <a href="{{URL::to('admin/detailwork/more/'.$subdata->id) }}">
                                <button class="btn btn-warning">Detail</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
    </div>
  </section>
@stop