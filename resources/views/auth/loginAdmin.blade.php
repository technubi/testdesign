@extends('layouts.master')


@section('content')
  <section>
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="col-md-8 col-md-offset-2 div-welcome">
             {!! Form::open(['url'  => route("auth.login-postadmin"), 'class' => 'form-signin' ] ) !!}
             {{--@include('includes.status')--}}
            @if(Session::has('message'))
                <div class="alert alert-{{ Session::get('status') }} status-box">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    {{ Session::get('message') }}
                </div>
            @endif
             @if(Auth::admin()->check())
                <h2>Maaf anda sudah masuk sebagai admin</h2>
             @else
                <h2 class="form-signin-heading">Please sign in as ADMIN</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}
                <label for="inputPassword" class="sr-only">Password</label>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]) !!}
                <div class="checkbox">
                <label>
                    {!! Form::checkbox('remember', 1) !!} Remember me
                </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p><a href="#">Forgot password?</a></p>
                {!! Form::close() !!}
             @endif


           </div>
         </div>
       </div>
     </div>
</section>





@stop