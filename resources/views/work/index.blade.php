@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="col-md-8 col-md-offset-2 title-kategori">
                    <a href="{{URL::to('/admin/bigwork/create') }}">
                        <button class="btn btn-success">Add Work</button>
                    </a>

        </div>
        <div class="col-md-12 table-kategori">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 12%">Nama</td>



                    </tr>
                </thead>
                <tbody>
                    @foreach($dataBig as $data)
                    <tr>
                        <td >{{$data->name}}</td>
                        <td style="width: 15%">
                          <a href="{{URL::to('admin/bigwork/edit/'.$data->id) }}">
                                                        <button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    </a>
                                                    <a href="{{URL::to('admin/bigwork/delete/'.$data->id) }}">
                                                        <button class="btn btn-warning">Del</button>
                                                    </a>

                        </td>
                            <tr>
                            <td ><span>SUB</span></td>

                            @foreach($data->Smallwork as $subdata)

                            <td style="width: 15%"><span>{{$subdata->nama}}</span>
                            <a href="{{URL::to('admin/smallwork/detail/'.$subdata->id) }}">
                            <button class="btn btn-info"><span class="glyphicon glyphicon-th-large"></span></button>
                            </a>
                            </td>

                            @endforeach
                            </tr>





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