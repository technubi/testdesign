@extends('layouts.master')


@section('content')
  <section>
     <div class="row">
       <div class="container-fluid">
         <div class="col-md-12">
           <div class="col-md-4 col-md-offset-4 div-welcome">
             {!! Form::open(['url'  => route('auth.login-post'), 'class' => 'form-signin' ] ) !!}
             {{--@include('includes.status')--}}
             <?php debug(Auth::owner()->check()); ?>
             @if(Auth::owner()->check())
                <h1>Anda sudah masuk sebagai owner</h1>
             @elseif(Auth::user()->check())
                <h1>Maaf anda tidak boleh masuk</h1>
            @elseif(Auth::admin()->check())
                <h2>Maaf anda sudah masuk sebagai admin</h2>
             @else
                <h2 class="form-signin-heading">Please sign in</h2>
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