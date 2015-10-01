@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2" id="addsub">
                <span>Tambah Sub Work</span>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 forminput">
        {!! Form::open(['route'=>'createBigwork','files'=>true])!!}

        <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama</label>
                        {!! Form::text('name', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Nama Big Work',
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