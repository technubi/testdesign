<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Image upload in Laravel 5.1 with Dropzone.js</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

    <link href="{{ asset('public/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/dropzone.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/basic.css') }}" media="all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/css/index.css') }}" media="all" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/css/parsley.css') }}" media="all" rel="stylesheet" type="text/css" />
        <script src="{{asset('public/js/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/js/parsley.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}" type="text/javascript"></script>



 
    @yield('head')
 
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
                    <a class="navbar-brand" href="#">Social Authentication</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('public.home')  }}">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                            @if(Auth::user()->check())
                                <li><a href="{{ route('authenticated.logout') }}">Logout</a></li>
                                <li><a href="{{ route('auth.register') }}">Poin</a></li>
                                <li><a href="{{ route('auth.register') }}">Profil</a></li>
                                <li><a href="{{ route('auth.register') }}">Reward</a></li>
                            @elseif(Auth::admin()->check())
                                <li><a href="{{ route('authenticated.logout') }}">Logout</a></li>
                                <li><a href="{{ route('auth.addadmin') }}">Tambah admin</a></li>
                                <li><a href="{{ route('adminCekPendingMember') }}">check pending</a></li>
                                <li><a href="{{ route('auth.register') }}">Reward</a></li>
                            @elseif(Auth::owner()->check())
                                <li><a href="{{ route('authenticated.logout') }}">Logout</a></li>
                                <li><a href="{{ route('auth.register') }}">Tempat</a></li>
                                <li><a href="{{ route('auth.register') }}">Pendapatan</a></li>
                                <li><a href="{{ route('auth.register') }}">Informasi User</a></li>
                                <li><a href="{{ route('auth.register') }}">Rule Poin</a></li>
                                <li><a href="{{ route('auth.register') }}">Reward</a></li>
                            @else
                                <h5>MAAF ANDA TIDAK MEMILIKI IZIN MENGKASES HALAMAN INI</h5>
                            @endif


                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
@yield('footer')
  <script src="{{asset('public/js/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/js/dropzone-config.js')}}" type="text/javascript"></script>
</html>