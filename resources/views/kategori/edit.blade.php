@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-md-6 col-md-offset-3">
        {!! Form::model($dataKategori,['method'=>'PATCH','class'=>'form-signin', 'route'=>['editKategori',$dataKategori->id],'files'=>true,'data-parsley-validate']) !!}

        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama Kategori</label>
                        {!! Form::text('nama', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Nama Kategori',
                            'required',
                            'id'                            => 'category',
                            'data-parsley-required-message' => 'nama harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::text('lat',null,['class'=>'form-control','placeholder'=>'Latitude','required'=>'required','id'=>'latbox']) !!}--}}
        </div>
         <div class="form-group">
                            <?php echo Form::submit('Edit Kategori',['class'=>'form-control',' btn btn-success']); ?>
        </div>

        </div>
    </div>
    </div>
</section>
@stop