@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="col-md-8 col-md-offset-2 title-kategori">
                    <a href="{{URL::to('/admin/kategori/create') }}">
                        <button class="btn btn-success btn-lg">Add New Category</button>
                    </a>

        </div>
        <div class="col-md-8 col-md-offset-2 table-kategori">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Nama</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataKategori as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        <td>
                            <a href="{{URL::to('admin/kategori/edit/'.$data->id) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <a href="{{URL::to('admin/kategori/delete/'.$data->id) }}">
                                <button class="btn btn-warning">Delete</button>
                            </a>
                            <a href="{{URL::to('admin/kategori/detail/'.$data->id) }}">
                                <button class="btn btn-info">Used By</button>
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