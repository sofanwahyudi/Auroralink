@extends('frontend.base.layout')


@section('title')
  Reliable IT Support Partners
@stop

{{--  ======================================================Hero Section========================================================   --}}
@section('hero')
<div class="btns">
    @foreach ($services as $data)
        <a href="{{url("/$data->slug")}}"><i class="fa fa-check-circle fa-7x"></i> {{$data->nama}}</a>
    @endforeach
  </div>
@stop

{{--  ======================================================Start Section========================================================   --}}
@section('start')
<div class="container">
    <div class="section-title text-center">

      <h2>IT Partners Solutions  </h2>
      <hr>
      <p class="separator">Bagaimana Kami Bisa Membantu Anda ?</p>

    </div>
  </div>

  <div class="container">
    <div class="row">
        @include('frontend.start')
    </div>
  </div>

@stop

{{--  ======================================================Start Section========================================================   --}}
@section('about')
<div class="container">
    <div class="row justify-content-center">

@include('frontend.about')

    </div>
  </div>
@stop

{{--  ======================================================Services Section========================================================   --}}

@section('services')
  <h1>Layanan </h1>
  <hr>
<div class="container-fluid container-full">
  <div class="section-title text-center">
    <p class="separator"> Berikut Beberapa Jenis Layanan Kami </p>
  </div>
</div>
<div class="container">
  <div class="row">

@include('frontend.services')

  </div>
</div>
@stop

{{--  ======================================================Portofolio Section========================================================   --}}

@section('portofolio')
  <div class="container-fluid container-full">
    <div class="section-title text-center">
        <h3>Portofolio</h3>
        <hr>
        <p class="separator"> Beberapa Project Yang Telah Kami Selesaikan, Silahkan Klik Untuk Detailnya </p>
    </div>
</div>
<div class="container">
        <div class="owl-carousel owl-theme">
        @include('frontend.portofolio')
    </div>
</div>

@stop


@section('team')
  <div class="container-fluid container-full">
    <div class="section-title text-center">
        <h3>Team</h3>
        <hr>
        <p class="separator"> Dari Tangan-Tangan Mereka Karya Hebat Tercipta </p>
    </div>
</div>
<div class="container">
        <div class="owl-carousel owl-theme">
        @include('frontend.team')
    </div>
</div>

@stop


{{--  @section('testimoni')
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-8">

        <div class="testimonials-content">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

@include('frontend.testimoni')

            </div>

            <div class="btm-btm">

              <ul class="list-unstyled carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ul>

            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

@stop  --}}


{{--  @section('price')

    <div class="container">
        <div class="section-title text-center">

            <h2>Pricelist</h2>
            <p class="separator">   .</p>

        </div>
        </div>

        <div class="container">
                <div class="owl-carousel owl-theme">
@include('frontend.price')
            </div>
        </div>
@stop  --}}


{{--  ======================================================blog Section========================================================  --}}
@section('blog')
    <div class="container">
        <div class="section-title text-center">

            <h2>Blog</h2>
            <p class="separator">   .</p>

        </div>
        </div>

        <div class="container">
        <div class="row">

@include('frontend.blog')
        </div>
        </div>
@stop


{{--  ======================================================newsletter Section========================================================  --}}
@section('newsletter')
  <div class="overlay padd-section">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6">
          <form class="form-inline" method="POST" action="#">

            <input type="email" class="form-control " placeholder="Email Adress" name="email">
            <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i>Subscribe</button>

          </form>

        </div>
      </div>

        <ul class="list-unstyled">
          <li><a href="https://twitter.com/id_auroralink" class="twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.facebook.com/AuroralinkDotID" class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.instagram.com/auroralinkid/" class="instagram"><i class="fa fa-instagram"></i></a></li>
          <li><a href="https://wa.me/628113190408" class="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
          <li><a href="https://t.me/auroralink" class="telegram"><i class="fa fa-telegram"></i></a></li>
          <li><a href="https://www.linkedin.com/in/auroralink-id-0a0908171/" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>


    </div>
  </div>
@endsection
  {{--  ======================================================Contact Section========================================================  --}}
@section('contact')
  <div class="container">
    <div class="section-title text-center">
      <h2>Kontak</h2>
      <p class="separator">  </p>
       @if ($message = Session::get('danger'))
      <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">
      <strong>Success: </strong>{{ Session::get('success') }}
      </div>
      @endif
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-4">
      <div class="info">
          <div>
            <i class="fa fa-map-marker"></i>
            <p>Jl Bulak setro utara VI/4C<br> Bulak Surabaya</p>
          </div>

          <div class="email">
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:auroralinkid@gmail.com">auroralink@gmail.com</a><br><a href="mailto:hi@auroralink.co.id">hi@auroralink.co.id</a></p>
          </div>

          <div>
            <i class="fa fa-phone"></i>
            <p> <a href="tel:+628113190408">+628113190408</a> <br> <a href="tel:+6282231599828">+6282231599828</a> <br> <a href="callto:+6285658192877">+6285658192877</a></p>
      </div>
  </div>

      </div>

       <div class="col-lg-5 col-md-8">
       @include('frontend.contact')
      </div>
    </div>
  </div>

@endsection
