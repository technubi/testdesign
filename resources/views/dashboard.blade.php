@extends('layouts.master');

@section('content')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>WELCOME ADMIN</h1>
            </div>
            <div class="col-md-2">
                <h4> <a href="{{URL::to('/admin/logout') }}">LOGOUT</a></h4>
            </div>
            <div class="col-md-2">
                <h4> <a href="{{URL::to('/admin/reg') }}">NEW USER</a></h4>
                <span>*need login first</span>
             </div>
            <div class="col-md-2">
                <h4> <a href="{{URL::to('/') }}">HOME</a></h4>
            </div>
            <div class="col-md-12">
                <div class="col-md-2 col-md-offset-1">
                   <a href="{{URL::to('/admin/merchant') }}">Merchant</a>
                </div>
                <div class="col-md-2">
                    <a href="{{URL::to('/admin/what') }}">What ist</a>
                </div>
                <div class="col-md-2">
                     <a href="{{URL::to('/admin/benefit') }}">Benefit</a>
                </div>
                <div class="col-md-2">
                     <a href="{{URL::to('/admin/information') }}">Information</a>
                </div>
                <div class="col-md-2">
                      <a href="{{URL::to('/admin/slideshow') }}">Slide show</a>
                </div>
            </div>
        </div>
    </div>

</section>


@stop
