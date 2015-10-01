<!DOCTYPE html>
<html lang="en">
	<head>
		<title>DEONTIC ARCHITECTS</title>


		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="_token" content="{!! csrf_token() !!}"/>

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<!-- Bootstrap CSS -->

		<link href="{{ asset('public/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/css/app.css') }}" media="all" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/css/index.css') }}" media="all" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/css/parsley.css') }}" media="all" rel="stylesheet" type="text/css" />
        <script src="{{asset('public/js/jquery.js')}}" type="text/javascript"></script>

        <script src="{{asset('public/js/animatescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/js/bootstrap.min.js')}}" type="text/javascript"></script>

	</head>
	<body>
	    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        </script>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">DEONTIC ARCHITECTS</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                            {{--@if(Auth::user()->check())--}}
                                {{--<li><a href="{{ route('authenticated.logout') }}">Logout</a></li>
                                <li><a href="{{ route('auth.register') }}">Poin</a></li>
                                <li><a href="{{ route('auth.register') }}">Profil</a></li>
                                <li><a href="{{ route('auth.register') }}">Reward</a></li>--}}
                                <li><a href="{{URL::to('/admin/manajemen') }}">ADMIN</a></li>
                                <li><a href="{{URL::to('/admin/about') }}">ABOUT</a></li>
                                <li><a href="{{URL::to('/admin/work') }}">OUR WORKS</a></li>
                            {{--@endif--}}


                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        @yield('content')


	</body>
</html>