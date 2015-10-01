@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-6 col-md-offset-3 forminput">
        {!! Form::model($data,['method'=>'PATCH','route'=>['editDetailWork',$data->id],'files'=>true])!!}

        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('nama', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Project Name',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Location</label>
                        {!! Form::text('location', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'location',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('client', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Client',
                            'required',
                            'id'                            => 'category'
                        ]) !!}
                        {!! Form::hidden('smallwork_id', ''.$data->smallwork_id) !!}

        </div>
        <div class='form-group' style='padding:0px'>
                        <label for="nama" >Design Complete</label>
                       {!! Form::input('date', 'designcom', null, ['class' => 'form-control', 'placeholder' => 'Date']); !!}

        </div>
        <div class='form-group' style='padding:0px'>
                        <label for="nama" >Build Complete</label>
                       {!! Form::input('date', 'buildcom', null, ['class' => 'form-control', 'placeholder' => 'Date']); !!}

        </div>
    <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('sitearea', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Site Area',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
    <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('floorarea', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Floor Area',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
<div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('floor', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'floor',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
<div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('external', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'External',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>
<div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::textarea('detail', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'detail',
                            'required',
                            'id'                            => 'category'
                        ]) !!}

        </div>



        <div class='col-md-12'>

            <div class="col-md-12" id="input-place">

            </div>
        </div>
         <div class="form-group">
                   <?php echo Form::submit('Create New',['class'=>'form-control',' btn btn-success']); ?>
        </div>

        </div>
    </div>
    </div>
<script>
    $(document).ready(function(){
        var input = '<input  placeholder="Nama Project" required="required" class="form-control dyn-input" name="smallwork[]" type="text">';
        $('#addsub').click(function(){
            $('#input-place').append(input);
        });
    })
</script>
</section>
@stop