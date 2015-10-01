@extends('layouts.master')

@section('content')
<section>
    <div class="container-fluid">
        <div class="row bottom-line-bar">
                    <div class="col-md-10 col-md-offset-1 form-search">
                        <div class="col-md-10">
                            <input class="form-control input-lg" id="inputUser" type="text" placeholder="Masukan nama Member">
                        </div>
                        <div class="cold-md-2">
                            <button class="btn-info btn btn-lg btn-cari">Cari</button>
                        </div>

                    </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="col-md-2 boxUserOption">
                    <div class="col-md-12 UserOption UserOptionAct">
                        <a href="{{ route('adminCekPendingMember') }}">
                            <span class="active">
                                Member
                            </span>
                        </a>
                    </div>
                    <div class="col-md-12 UserOption">
                        <a href="{{ route('adminCekPendingOwner') }}">
                            <span>
                                Owner
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-9  col-md-offset-1 table-User">
                    <table class="table-bordered table">
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>No Telp</td>
                                <td>Poin</td>
                                <td>Status</td>
                                <td>Option</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $data)
                                <tr>
                                    <td>{{$data->first_name}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->notelp}}</td>
                                    <td>0</td>
                                    @if($data->pending == 0)
                                    <td class="text-pending">Pending</td>
                                        <td>
                                        <button class="btn btn-success btn-aprove" id="{{$data->id}}">Aprove</button>
                                        <button class="btn btn-warning btn-del" id="{{$data->id}}">Delete</button>

                                    </td>
                                    @elseif($data->pending == 1)
                                        <td class="text-pending">Non Active</td>
                                        <td>
                                        <button class="btn btn-success btn-activate" id="{{$data->id}}">Activate</button>
                                        <button class="btn btn-warning btn-del" id="{{$data->id}}">Delete</button>

                                    </td>
                                    @elseif($data->pending == 2)
                                        <td class="text-pending">Active</td>
                                        <td>
                                        <button class="btn btn-danger btn-deactive" id="{{$data->id}}">Deactivate</button>
                                        <button class="btn btn-warning btn-del" id="{{$data->id}}">Delete</button>

                                    </td>
                                    @endif

                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.btn-activate',function(){
    var id = $(this).attr('id');
    var btn = $(this);
    $.ajax({
      url: '/admin/cekMember',
      type: "post",
      data: {'id':id,'method':'activate'},
      success: function(data){
                    btn.addClass('btn-danger btn-deactive');
                   btn.removeClass('btn-success btn-activate');
                    btn.parent().prev().html('Active');
                   btn.html('Decativate');

        alert(data);

      }
    });
  });
     $(document).on('click','.btn-aprove',function(){
      var id = $(this).attr('id');
      var btn = $(this);
      $.ajax({
        url: '/admin/cekMember',
        type: "post",
        data: {'id':id,'method':'needaprove'},
        success: function(data){
                      btn.addClass('btn-danger btn-deactive');
                      btn.removeClass('btn-success btn-aporve');
                      btn.parent().prev().html('Active');
                      btn.html('Decativate');

          alert(data);

        }
      });
    });
  $(document).on('click','.btn-deactive',function(){
      var id = $(this).attr('id');
      var btn = $(this);
      $.ajax({
        url: '/admin/cekMember',
        type: "post",
        data: {'id':id,'method':'deactive'},
        success: function(data){

                        btn.removeClass('btn-danger btn-deactive');
                           btn.addClass('btn-success btn-activate');
                            btn.parent().prev().html('Non Active');
                           btn.html('Activate');
          alert(data);

        }
      });
    });
    $(document).on('click','.btn-cari',function(){
       var text = $('#inputUser').val();
       $.ajax({
               url: '/admin/cekMember',
               type: "post",
               data: {'text':text,'method':'search'},
               success: function(data){
                 $('.table-User').html(data);

               }
       });
    });
    $(document).on('click','.btn-del',function(){
           var id = $(this).attr('id');

           $.ajax({
                   url: '/admin/cekMember',
                   type: "post",
                   data: {'id':id,'method':'delete'},
                   success: function(data){
                   alert('data dihapus');
                     $('.table-User').html(data);

                   }
           });
     });

});
</script>
@stop
