@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="col-md-2 col-md-offset-2 title-kategori">
                        <a href="{{URL::to('/admin/about/create') }}">
                            <button class="btn btn-success">Add New About</button>
                        </a>

            </div>
    <div class="col-md-2 title-kategori">
                    <a href="{{URL::to('/admin/about/delete/'.$dataAbout[0]->id) }}">
                        <button class="btn btn-success">Clear</button>
                    </a>

        </div>
        <div class="col-md-8 col-md-offset-2 table-kategori">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width:33%">Introduction</td>
                        <td>Belief</td>
                        <td>Pratice</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$dataAbout[0]->intro}}</td>
                        <td>{{$dataAbout[0]->belief}}</td>
                        <td>{{$dataAbout[0]->pratice}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
  </section>
@stop