
@extends('layouts.master')


@section('content')


<section>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-12'>
				<div class='col-md-12'>
					<div class='col-md-12 text'>

					</div>
					<div class='col-md-12' id='map-canvas'></div>
					<div class='col-md-8 col-md-offset-2 form-set' id='input' >
                    {!! Form::open(['route'=>'createPlace','files'=>true  , 'data-parsley-validate'])!!}
                    {!! Form::hidden('owner_id', $idOwner, array('id' => 'invisible_id')) !!}
                    <div class='form-group' style='padding:0px'>
                        <label for="lat" class="sr-only">Latitude</label>
                        {!! Form::text('lat', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Lattitude',
                            'required',
                            'id'                            => 'latbox',
                            'data-parsley-required-message' => 'Latitude harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::text('lat',null,['class'=>'form-control','placeholder'=>'Latitude','required'=>'required','id'=>'latbox']) !!}--}}
                    </div>
                    <div class='form-group' style='padding:0px'>
                        <label for="long" class="sr-only">Longitude</label>
                        {!! Form::text('long', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'longitude',
                            'required',
                            'id'                            => 'lngbox',
                            'data-parsley-required-message' => 'Longitude harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::text('longi',null,['class'=>'form-control','placeholder'=>'longitude','required'=>'required','id'=>'lngbox']) !!}--}}
                    </div>

                    <div class='form-group' style='padding:0px'>
                        <label for="alamat" class="sr-only">Alamat</label>
                        {!! Form::text('alamat', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Alamat tempat',
                            'required',
                            'id'                            => 'address',
                            'data-parsley-required-message' => 'Alamat Tempat harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::text('alamat',null,['class'=>'form-control','placeholder'=>'alamat','required'=>'required','id'=>'address']) !!}--}}
                    </div>
                    <div class='form-group' style='padding:0px'>
                        <label for="nama" class="sr-only">Nama Tempat</label>
                        {!! Form::text('nama', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Nama tempat',
                            'required',
                            'id'                            => 'namatempat',
                            'data-parsley-required-message' => 'Nama Tempat harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::text('nama',null,['class'=>'form-control','placeholder'=>'nama','required'=>'required']) !!}--}}
                    </div>
                    <div class='form-group' style='padding:0px'>
                        <label for="akunfb" class="sr-only">Page Facebook</label>
                        {!! Form::text('akunfb', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Page Facebook',
                         ]) !!}
                        {{--{!! Form::text('nama',null,['class'=>'form-control','placeholder'=>'nama','required'=>'required']) !!}--}}
                    </div>
                    <div class='form-group' style='padding:0px'>
                        <label for="kategori" >Kategori</label>
                    {!! Form::select('kategori_id', $kategories,null, ['class'=>'form-control']) !!}
                    </div>
                    <div class='form-group' style='padding:0px'>
                        <label for="kategori" >Misi *isi dengan None jika tidak menggunakan paket misi</label>
                    {!! Form::select('mission_id', $missiones,null, ['class'=>'selectpicker form-control']) !!}
                    </div>

                    <div class='form-group' style='padding:0px'>
                        <label for="akunfb" class="sr-only">Akun IG</label>
                        {!! Form::text('akunig', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Account Instagram',
                         ]) !!}
                        {{--{!! Form::text('nama',null,['class'=>'form-control','placeholder'=>'nama','required'=>'required']) !!}--}}
                    </div>
                    <div class='form-group' style='padding:0px'>
                        <label for="deskripsi" class="sr-only">Cerita Tempat</label>
                        {!! Form::textarea('deskripsi', null, [
                            'class'                         => 'form-control',
                            'placeholder'                   => 'Cerita Tempat',
                            'required',
                            'id'                            => 'ceritatempat',
                            'data-parsley-required-message' => 'Cerita Tempat harus di isi',
                            'data-parsley-trigger'          => 'change focusout'

                        ]) !!}
                        {{--{!! Form::textarea('desc',null,['class'=>'form-control','placeholder'=>'deskripsi tempat','required'=>'required','id'=>'address']) !!}--}}
                    </div>
                    <div class="form-group">
                            <?php echo Form::submit('add new!',['class'=>'form-control',' btn btn-success']); ?>
                    </div>







					</div>
				</div>
			</div>
		</div>
	</div>
</section>


 <style type="text/css">
      #map-canvas {
        height: 200px;
        width: 100%;
      }
</style>
<script type="text/javascript">
                        window.ParsleyConfig = {
                            errorsWrapper: '<div></div>',
                            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>'
                        };
                    </script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){



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
		    var latitude = position.coords.latitude;
		    var longitude = position.coords.longitude;
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


		    		document.getElementById("latbox").value = latitude;
				    document.getElementById("lngbox").value = longitude;
				    getAddress(coords);

		        map = new google.maps.Map(
		            document.getElementById("map-canvas"), mapOptions
		            );
		        var marker = new google.maps.Marker({
		                position: coords,
		                map: map,
		                title: "ok",
		                draggable: true
		        });
		        google.maps.event.addListener(marker, 'dragend', function (event) {
				    document.getElementById("latbox").value = this.getPosition().lat();
				    document.getElementById("lngbox").value = this.getPosition().lng();
				    coords = new google.maps.LatLng(this.getPosition().lat(), this.getPosition().lng());
				    	getAddress(coords);
				});

		    },function error(msg){alert('Please enable your GPS position future.');

		  }, {maximumAge:600000, timeout:5000, enableHighAccuracy: true});

		}else {
		    alert("Geolocation API is not supported in your browser.");
		}


        function getAddress(latLng) {
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
        }




    }


    google.maps.event.addDomListener(window, 'load', init);
	});
</script>
@stop

