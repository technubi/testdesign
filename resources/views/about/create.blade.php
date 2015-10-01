@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route'=>'createAbout','files'=>true])!!}

        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Belief</label>
                        {!! Form::textarea('belief', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Belief',
                            'required',
                            'id'                            => 'category'
                        ]) !!}
        </div>
        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Introduction</label>
                        {!! Form::textarea('intro', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Introduction',
                            'required',
                            'id'                            => 'category'
                        ]) !!}
        </div>
        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Pratice</label>
                        {!! Form::textarea('pratice', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Pratice',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
        </div>
         <div class="form-group">
                   <?php echo Form::submit('Create New',['class'=>'form-control',' btn btn-success']); ?>
        </div>

        </div>
    </div>
    </div>
</section>
@stop