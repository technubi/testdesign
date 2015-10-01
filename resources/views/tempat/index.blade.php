

@extends('layouts.master')


@section('content')
<section id="index-tempat">
<div class="container-fluid">
    <div class="row bottom-line-bar">
            <div class="col-md-10 col-md-offset-1 form-search">
                <div class="col-md-10">
                    <input class="form-control input-lg" id="inputUser" type="text" placeholder="Masukan nama Tempat/Alamat">
                </div>
                <div class="cold-md-2">
                    <button class="btn-info btn btn-lg btn-cari">Cari</button>
                </div>

            </div>


    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-8 col-md-offset-2 title-tempat">
                {{--<a href="{{URL::to('/admin/tempat/create') }}">
                    <button class="btn btn-success btn-lg">Tambah Baru</button>
                </a>--}}

            </div>

        </div>
        <div class="col-md-10 col-md-offset-1 table-tempat">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 10%">Nama</td>
                        <td style="width: 10%">Owner</td>
                        <td style="width: 40%">Alamat</td>
                        <td style="width: 10%">Kategori</td>
                        <td>Pilihan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPlace as $data)

                     <tr>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->owner_id}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$kategories[$data->kategori_id]}}</td>


                        <td>
                            <a href="{{URL::to('admin/tempat/detail/'.$data->id) }}">
                                <button class="btn btn-info">Detail</button>
                            </a>
                            <a href="{{URL::to('admin/tempat/edit/'.$data->id) }}">
                               <button class="btn btn-info">Edit</button>
                            </a>
                            <a href="{{URL::to('admin/tempat/delete/'.$data->id) }}">
                               <button class="btn btn-warning">Delete</button>
                            </a>
                            <a href="{{URL::to('admin/tempat/qrcode/'.$data->id) }}">
                               <button class="btn btn-success">QRcode</button>
                            </a>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.btn-cari',function(){
       var text = $('#inputUser').val();
       $.ajax({
               url: '/admin/tempat',
               type: "post",
               data: {'text':text,'method':'search'},
               success: function(data){
                 $('.table-tempat').html(data);
               }
       });
    });
});
</script>
@stop
