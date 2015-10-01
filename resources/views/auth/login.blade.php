@extends('layouts.master')


@section('content')
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-4 div-welcome">

                            <?php debug(Auth::owner()->check()); ?>
                            @if(Auth::owner()->check())
                                    <h1>Anda sudah masuk sebagai owner</h1>

                            @elseif(Auth::user()->check())
                                    <h1>Anda sudah masuk ke member</h1>
                            @elseif(Auth::admin()->check())
                                    <h2>Maaf anda sudah masuk sebagai admin</h2>
                            @else
                                    <p class="or-social">Use Social Login</p>
                                    <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
                                    <a href="#" class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a>
                            @endif

            </div>
        </div>
    </div>
  </div>
</section>





@stop

