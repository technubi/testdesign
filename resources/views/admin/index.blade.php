@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="col-md-8 col-md-offset-2 title-kategori">
                    <a href="{{URL::to('/addadmin') }}">
                        <button class="btn btn-success">Add New Admin</button>
                    </a>

        </div>
        <div class="col-md-8 col-md-offset-2 table-kategori">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Email</td>
                        <td>Nama</td>
                        <td>No Telp</td>
                        <td>Alamat</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataAdmin as $data)
                    <tr>
                        <td>{{$data->email}}</td>
                        <td>{{$data->first_name}}</td>
                        <td>{{$data->notelp}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>
                            <a href="{{URL::to('admin/edit/'.$data->id) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <a href="{{URL::to('admin/delete/'.$data->id) }}">
                                <button class="btn btn-warning">Delete</button>
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