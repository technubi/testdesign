@extends('layouts.master')


@section('content')

<section>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-4 col-md-offset-4">

        {!! Form::model($dataOwner,['method'=>'PATCH','class'=>'form-signin', 'route'=>['editOwner',$dataOwner->id],'files'=>true,'data-parsley-validate']) !!}
        {{--{!! Form::open(['url' => route('auth.register-postowner'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}--}}

                {{--@include('includes.errors')--}}


                <h3 class="form-signin-heading">EDIT OWNER</h3>

                <label for="inputEmail" class="sr-only">Email address</label>
                {!! Form::email('email', null, [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Email address',
                    'required',
                    'id'                            => 'inputEmail',
                    'data-parsley-required-message' => 'Email is required',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-type'             => 'email'
                ]) !!}
                <label for="inputFirstName" class="sr-only">Alamat</label>
                                {!! Form::text('alamat', null, [
                                    'class'                         => 'form-control',
                                    'placeholder'                   => 'Alamat',
                                    'required',
                                    'id'                            => 'inputFirstName',
                                    'data-parsley-required-message' => 'Address is required',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-minlength'        => '2',
                                    'data-parsley-maxlength'        => '32'
                ]) !!}
                <label for="inputFirstName" class="sr-only">No Telp/HP</label>
                                {!! Form::text('notelp', null, [
                                    'class'                         => 'form-control',
                                    'placeholder'                   => 'No Telp',
                                    'required',
                                    'id'                            => 'inputFirstName',
                                    'data-parsley-required-message' => 'Phone Number is required',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-pattern'          => '/^[0-9]*$/',
                                    'data-parsley-minlength'        => '2',
                                    'data-parsley-maxlength'        => '32'
                                ]) !!}
                <label for="inputFirstName" class="sr-only">First name</label>
                {!! Form::text('first_name', null, [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'First name',
                    'required',
                    'id'                            => 'inputFirstName',
                    'data-parsley-required-message' => 'First Name is required',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                    'data-parsley-minlength'        => '2',
                    'data-parsley-maxlength'        => '32'
                ]) !!}

                <label for="inputLastName" class="sr-only">Last name</label>
                {!! Form::text('last_name', null, [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Last name',
                    'required',
                    'id'                            => 'inputLastName',
                    'data-parsley-required-message' => 'Last Name is required',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                    'data-parsley-minlength'        => '2',
                    'data-parsley-maxlength'        => '32'
                ]) !!}


                <label for="inputPassword" class="sr-only">Password</label>
                {!! Form::password('password', [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Password',
                    'required',
                    'id'                            => 'inputPassword',
                    'data-parsley-required-message' => 'Password is required',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-minlength'        => '6',
                    'data-parsley-maxlength'        => '20'
                ]) !!}


                <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
                {!! Form::password('password_confirmation', [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Password confirmation',
                    'required',
                    'id'                            => 'inputPasswordConfirm',
                    'data-parsley-required-message' => 'Password confirmation is required',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-equalto'          => '#inputPassword',
                    'data-parsley-equalto-message'  => 'Not same as Password',
                ]) !!}

               <div class="g-recaptcha" data-sitekey="6LcA7QoTAAAAAC-pHIHVuPJtNYloHQ15f3gxoEit"></div>

                <button class="btn btn-lg btn-primary btn-block register-btn" type="submit">Edit Data</button>

                {{--<p class="or-social">Or Use Social Login</p>

                <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
                <a href="{{ route('social.redirect', ['provider' => 'twitter']) }}" class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a>
                <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-lg btn-primary btn-block google" type="submit">Google</a>
--}}
                {!! Form::close() !!}

                 <script type="text/javascript">
                        window.ParsleyConfig = {
                            errorsWrapper: '<div></div>',
                            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>'
                        };
                    </script>



                    <script src='https://www.google.com/recaptcha/api.js'></script>
        </div>
    </div>
</div>

</section>
@stop
@section('footer')



@stop