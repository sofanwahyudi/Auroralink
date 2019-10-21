@extends('frontend.base.layout')


@section('title')
    Selamat Datang di Auroralink
@stop


@section('hero')
<section id="hero" class="wow fadeIn">
    <div class="hero-container top_left_cont zoomIn wow animated animated">
      <h1>Welcome to Auroralink</h1>
      <h2>Reliable IT Support Patners</h2>
      <img src="image/dis.png" alt="Hero Imgs">
      <a href="https://wa.me/628113190408" class="btn-get-started scrollto">Get Started</a>
      <div class="btns">
        <a href="#"><i class="fa fa-laptop fa-3x"></i> Laptop Repair</a>
        <a href="#"><i class="fa fa-support fa-3x"></i> Support Troubleshooting</a>
        <a href="#"><i class="fa fa-code fa-3x"></i> Aplication Development</a>
        <a href="#"><i class="fa fa-user-secret fa-3x"></i> IT Infrastructur Consulting</a>
      </div>
    </div>
</section>
  <!-- #hero -->
@stop


@section('start')
    <section id="get-started" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>IT Partners Solutions </h2>
        <p class="separator">How To Work ? .</p>

      </div>
    </div>

    <div class="container">
      <div class="row " >

@include('frontend.start')

      </div>
    </div>

  </section>
@stop

 {{--  ======================================================About Section========================================================   --}}
@section('about')
    <section id="about-us" class="about-us padd-section wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

@include('frontend.about')

      </div>
    </div>
  </section>
@stop

{{--  ======================================================Services Section========================================================   --}}

@section('services')
      <section id="features" class="padd-section text-center wow fadeInUp">
      <h1>Services </h1>
    <div class="container-fluid container-full">
      <div class="section-title text-center">
        <p class="separator"> Our Services </p>
      </div>
    </div>
    <div class="container">
      <div class="row">

@include('frontend.services')

      </div>
    </div>
  </section>
@stop

{{--  ======================================================Portofolio Section========================================================   --}}

@section('portofolio')
    <section id="screenshots" class="padd-section text-center wow fadeInUp">
        <div class="container-fluid container-full">
            <div class="section-title text-center">
                <h3>Portofolio</h3>
                <p class="separator"> Click for Watch Detail </p>
            </div>
        </div>
        <div class="container">
                <div class="owl-carousel owl-theme">
                @include('frontend.portofolio')
            </div>
        </div>
  </section>

@stop


{{--  @section('video')
<section id="video" class="text-center wow fadeInUp">
    <div class="overlay">
      <div class="container-fluid container-full">

        <div class="row">
          <a href="#" class="js-modal-btn play-btn" data-video-id="s22ViV7tBKE"></a>
        </div>

      </div>
    </div>
</section>

@stop  --}}


@section('team')
    <section id="team" class="padd-section text-center wow fadeInUp">
<div class="container-fluid container-full">
            <div class="section-title text-center">
                <h3>Team</h3>
                <p class="separator"> Our teams has grown and delivered numerous masterpiece. </p>
            </div>
        </div>
        <div class="container">
                <div class="owl-carousel owl-theme">
                @include('frontend.team')
            </div>
        </div>
  </section>

@stop


{{--  @section('testimoni')

  <section id="testimonials" class="padd-section text-center wow fadeInUp">
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
  </section>

@stop  --}}


{{--  @section('price')
        <section id="pricing" class="padd-section text-center wow fadeInUp">

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
    </section>

@stop  --}}


{{--  ======================================================blog Section========================================================  --}}
@section('blog')
        <section id="blog" class="padd-section wow fadeInUp">

        <div class="container">
        <div class="section-title text-center">

            <h2>Latest posts</h2>
            <p class="separator">   .</p>

        </div>
        </div>

        <div class="container">
        <div class="row">

@include('frontend.blog')

        </div>
        </div>
    </section>
@stop


{{--  ======================================================newsletter Section========================================================  --}}
@section('newsletter')
      <section id="newsletter" class="newsletter text-center wow fadeInUp">
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
  </section>
@endsection
  {{--  ======================================================Contact Section========================================================  --}}
@section('contact')
      <section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Contact</h2>
        <p class="separator">  </p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          @include('frontend.contact')

          {{--  <div class="social-links">
            <a href="https://twitter.com/id_auroralink" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/AuroralinkDotID" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/auroralinkid/" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
            <a href="#" class="telegram"><i class="fa fa-telegram"></i></a>
            <a href="https://www.linkedin.com/in/auroralink-id-0a0908171/" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>  --}}

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <form action="{{ route('leads.store') }}" method="post" role="form" class="contactForm">
            {{ csrf_field() }}
              <div class="form-group">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Phone" data-rule="minlen:4" data-msg="Please enter your phone" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="komentar" id="komentar" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #contact -->

@endsection
