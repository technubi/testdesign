

@extends('layouts.master')


@section('content')
<section id="detail-owner">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3 owner-photo-box">

            </div>
            <div class="col-md-8 col-md-offset-2 owner-desc-box ">
            <div class="col-md-12 inline-desc">
                <div class="col-md-3 col-md-offset-3"><span>Nama : </span></div>
                <div class="col-md-3"><span>{{$dataOwner['first_name']}}</span></div>
            </div>
            <div class="col-md-12 inline-desc">
                <div class="col-md-3 col-md-offset-3"><span>Alamat : </span></div>
                <div class="col-md-3"><span>{{$dataOwner['alamat']}}</span></div>
            </div>
            <div class="col-md-12 inline-desc">
                <div class="col-md-3 col-md-offset-3"><span>No Telepon : </span></div>
                <div class="col-md-3"><span>{{$dataOwner['notelp']}}</span></div>
            </div>
            <div class="col-md-12 inline-desc">
                <div class="col-md-3 col-md-offset-3"><span>Email : </span></div>
                <div class="col-md-3"><span>{{$dataOwner['email']}}</span></div>
            </div>
            <div class="col-md-12 inline-desc">
                <div class="col-md-3 col-md-offset-3"><span>Tanggal Daftar : </span></div>
                <div class="col-md-3"><span>{{$dataOwner['created_at']}}</span></div>
            </div>
            </div>
            <div class="col-md-12 place-box">
            <div class="col-md-8 col-md-offset-2 title-tempat">
                                    <a href="{{URL::to('/admin/tempat/create/'.$dataOwner['id']) }}">
                                        <button class="btn btn-success btn-md">Tambah Baru</button>
                                    </a>

                                </div>
                @foreach($dataOwner->Tempat as $data)
                <div class="col-md-3 desc-place-box">
                    <div class="col-md-8 inline-desc-place">
                        <span>
                            {{$data->nama}}
                        </span>
                    </div>
                    <div class="col-md-2">
                        <a href="{{URL::to('/admin/tempat/detail/'.$data->id) }}">
                            <button class="btn btn-info">Detail</button>
                        </a>
                    </div>

                    <div class="col-md-12 inline-photo-place">
                    @foreach($data->Image as $datafoto)
                    <?php if (!$datafoto['filename']) echo "x"; ?>
                        <img src="{{asset('public/uploads/icon_size/'.$datafoto['filename'].'.jpg')}}" style="width:100%" data-src="" alt="Third slide">
                        <?php break; ?>
                    @endforeach

                    </div>


                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
</section>
@stop