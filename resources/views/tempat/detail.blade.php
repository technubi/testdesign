@extends('layouts.master')


@section('content')
<section>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <a href="{{URL::to('admin/tempat/qrcode/'.$dataPlace[0]['id']) }}">
                                   <button class="btn btn-success">QRcode</button>
                                </a>
    <a href="{{URL::to('admin/tempat/storeImage?id='.$dataPlace[0]['id']) }}">
           <button class="btn btn-info">Tambah Photo</button>
    </a>
    </div>

        <div class="col-md-12 detail-map-box" id="map-canvas">

        </div>
        <?php
            debug($dataPlace[0]->Owner);
        ?>
        <div class="col-md-12 wrap-detail-place-box ">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="col-md-12 detail-place-box">
                    <div class="col-md-2"><span>NAMA</span></div>
                    <div class="col-md-10"><span>: {{$dataPlace[0]['nama']}}</span></div>
                </div>
                <div class="col-md-12 detail-place-box">
                    <div class="col-md-2"><span>ALAMAT</span></div>
                    <div class="col-md-10"><span>: {{$dataPlace[0]['alamat']}}</span></div>
                </div>
                <div class="col-md-12 detail-place-box">
                    <div class="col-md-2"><span>TYPE</span></div>
                    <div class="col-md-10"><span>: {{$dataPlace[0]->Kategori->nama}}</span></div>
                </div>
                <div class="col-md-12 detail-place-box">
                    <div class="col-md-2"><span>OWNER</span></div>
                    <div class="col-md-10"><span>: {{$dataPlace[0]->Owner->first_name}}</span></div>
                </div>
                <div class="col-md-12 detail-place-box">
                    <div class="col-md-2"><span>DESKRIPSI</span></div>
                    <div class="col-md-10"><span>: {{$dataPlace[0]['deskripsi']}}</span></div>
                </div>
                <div class="col-md-12 detail-place-box">
                    <div class="col-md-2"><span>MISSION</span></div>
                    <div class="col-md-10"><span>: {{$dataPlace[0]->Mission->mission}}</span></div>
                </div>


            </div>

        </div>

        <div class="col-md-12 photo-place-box">

        
        @foreach($dataPlace[0]->image as $data)
            <div class="col-md-2">
            <a href="{{URL::to('admin/image/delete/'.$data->id) }}">
                                <button class="btn btn-warning btn-sm">Hapus Foto</button>
                            </a>
                <img src="{{asset('public/uploads/icon_size/'.$data->filename.'.jpg')}}" style="width:100%" data-src="" alt="Third slide">

            </div>
        @endforeach

    </div>
</div>
</section>

<style type="text/css">
      #map-canvas {
        height: 200px;
        width: 100%;
      }
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
         <?php

                echo "var lat = ".$dataPlace[0]->lat.";";
                echo "var long = ".$dataPlace[0]->long.";";
                ?>


        var coords;
		function init() {
        var mapDiv = document.getElementById('map-canvas');
        /*map = new google.maps.Map(mapDiv, { // default location
          center: new google.maps.LatLng(-7.3354209,110.5077895),
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
           disableDefaultUI: false
        });*/
		var map;
		var geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position){
		    var latitude = lat;
		    var longitude = long;
		    var accuracy = position.coords.accuracy;
		    coords = new google.maps.LatLng(latitude, longitude);
		    var mapOptions = {
		        zoom: 15,
		        center: coords,
		        mapTypeControl: true,
		        navigationControlOptions: {
		            style: google.maps.NavigationControlStyle.SMALL
		        },
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		        };


		    		/*document.getElementById("latbox").value = latitude;
				    document.getElementById("lngbox").value = longitude;*/
				    //getAddress(coords);

		        map = new google.maps.Map(
		            document.getElementById("map-canvas"), mapOptions
		            );
		        var marker = new google.maps.Marker({
		                position: coords,
		                map: map,
		                title: "ok",
		                draggable: true
		        });
		        /*google.maps.event.addListener(marker, 'dragend', function (event) {
				    document.getElementById("latbox").value = this.getPosition().lat();
				    document.getElementById("lngbox").value = this.getPosition().lng();
				    coords = new google.maps.LatLng(this.getPosition().lat(), this.getPosition().lng());
				    	getAddress(coords);
				});*/

		    },function error(msg){alert('Please enable your GPS position future.');

		  }, {maximumAge:600000, timeout:5000, enableHighAccuracy: true});

		}else {
		    alert("Geolocation API is not supported in your browser.");
		}


        /*function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }*/




    }


    google.maps.event.addDomListener(window, 'load', init);
	});
</script>
@stop