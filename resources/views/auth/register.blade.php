@extends('layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                                {!! Form::open(['url' => route('auth.register-post'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

                                {{--@include('includes.errors')--}}

                                <h3 class="form-signin-heading">REGISTER AS MEMBER</h3>

                                <label for="inputEmail" class="sr-only">Email address</label>
                                {!! Form::email('email', null, [
                                    'class'                         => 'form-control',
                                    'placeholder'                   => 'Email address Your Facebook',
                                    'required',
                                    'id'                            => 'inputEmail',
                                    'data-parsley-required-message' => 'Email is required',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-type'             => 'email'
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


                                <label for="inputAlamat" class="sr-only">Alamat</label>
                                                {!! Form::text('alamat', null, [
                                                    'class'                         => 'form-control',
                                                    'placeholder'                   => 'Alamat',
                                                    'required',
                                                    'id'                            => 'inputAlamat',
                                                    'data-parsley-required-message' => 'Address is required',
                                                    'data-parsley-trigger'          => 'change focusout',
                                                    'data-parsley-minlength'        => '2',
                                                    'data-parsley-maxlength'        => '32'
                                ]) !!}
                                <label for="inputNotelp" class="sr-only">No Telp/HP</label>
                                                {!! Form::text('notelp', null, [
                                                    'class'                         => 'form-control',
                                                    'placeholder'                   => 'No Telp',
                                                    'required',
                                                    'id'                            => 'inputNotelp',
                                                    'data-parsley-required-message' => 'Phone Number is required',
                                                    'data-parsley-trigger'          => 'change focusout',
                                                    'data-parsley-pattern'          => '/^[0-9]*$/',
                                                    'data-parsley-minlength'        => '2',
                                                    'data-parsley-maxlength'        => '32'
                                                ]) !!}

                               <div class="g-recaptcha" data-sitekey="6LcA7QoTAAAAAC-pHIHVuPJtNYloHQ15f3gxoEit"></div>

                                <button class="btn btn-lg btn-primary btn-block register-btn" type="submit">Register</button>

                                {{--<p class="or-social">Or Use Social Login</p>

                                <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
                                <a href="{{ route('social.redirect', ['provider' => 'twitter']) }}" class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a>
                                <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-lg btn-primary btn-block google" type="submit">Google</a>
                --}}
                                {!! Form::close() !!}

            </div>
        </div>
    </div>




                 <script type="text/javascript">
                        window.ParsleyConfig = {
                            errorsWrapper: '<div></div>',
                            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>'
                        };
                    </script>



                    <script src='https://www.google.com/recaptcha/api.js'></script>

@stop
@section('footer')



@stop