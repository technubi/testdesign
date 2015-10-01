<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Image upload in Laravel 5.1 with Dropzone.js</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

    <link href="{{ asset('public/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/dropzone.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/basic.css') }}" media="all" rel="stylesheet" type="text/css" />

    <script src="{{asset('public/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}" type="text/javascript"></script>


 
    @yield('head')
 
</head>
 
<body>
<section id="image-upload">
<div class="container-fluid">
 
    {{--<div class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Upload</a></li>
            </ul>
        </div>
    </div>--}}
    


@yield('content')
    
</div>
</body>
</section>
@yield('footer')
  <script src="{{asset('public/js/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/js/dropzone-config.js')}}" type="text/javascript"></script>
</html>