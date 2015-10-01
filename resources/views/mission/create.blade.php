@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route'=>'createMission','files'=>true  , 'data-parsley-validate'])!!}

        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama Misi</label>
                        {!! Form::text('mission', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Nama Misi',
                            'required',
                            'id'                            => 'mission',
                            'data-parsley-required-message' => 'misi harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::text('lat',null,['class'=>'form-control','placeholder'=>'Latitude','required'=>'required','id'=>'latbox']) !!}--}}
        </div>
         <div class="form-group">
                            <?php echo Form::submit('Create New',['class'=>'form-control',' btn btn-success']); ?>
        </div>

        </div>
    </div>
    </div>
</section>
@stop