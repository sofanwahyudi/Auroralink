@extends('frontend.base.layout')


@section('title')
    Selamat Datang di Auroralink
@stop


@section('hero')
<section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Welcome to Auroralink</h1>
      <h2>Reliable IT Support Patners</h2>
      <img src="asset/img/hero-img.png" alt="Hero Imgs">
      <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
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

        <h2>simple systeme fordiscount </h2>
        <p class="separator">Integer cursus bibendum augue ac cursus .</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="asset/img/svg/cloud.svg" alt="img" class="img-fluid">
            <h4>introducing whatsapp</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="#">read more</a>

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="asset/img/svg/planet.svg" alt="img" class="img-fluid">
            <h4>user friendly interface</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="#">read more</a>

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="asset/img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>build the app everyone love</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="#">read more</a>

          </div>
        </div>

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
    <div class="container">
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


@section('video')
<section id="video" class="text-center wow fadeInUp">
    <div class="overlay">
      <div class="container-fluid container-full">

        <div class="row">
          <a href="#" class="js-modal-btn play-btn" data-video-id="s22ViV7tBKE"></a>
        </div>

      </div>
    </div>
</section>

@stop


@section('team')
    <section id="team" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Our Teams</h2>
        <p class="separator">   .</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

@include('frontend.team')

      </div>
    </div>
  </section>

@stop


@section('testimoni')

  <section id="testimonials" class="padd-section text-center wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-8">

          <div class="testimonials-content">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner" role="listbox">

                <div class="carousel-item  active">
                  <div class="top-top">

                    <h2>Judul Testimoni</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries.</p>
                    <h4>Kimberly Tran<span>manager</span></h4>

                  </div>
                </div>

                <div class="carousel-item ">
                  <div class="top-top">

                    <h2>Our Users Speack volumes us</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries.</p>
                    <h4>Henderson<span>manager</span></h4>

                  </div>
                </div>

                <div class="carousel-item ">
                  <div class="top-top">

                    <h2>Our Users Speack volumes us</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries.</p>
                    <h4>David Spark<span>manager</span></h4>

                  </div>
                </div>

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

@stop


@section('price')
        <section id="pricing" class="padd-section text-center wow fadeInUp">

        <div class="container">
        <div class="section-title text-center">

            <h2>Judul List Harga</h2>
            <p class="separator">   .</p>

        </div>
        </div>

        <div class="container">
        <div class="row">

            <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
                <div class="table">
                <h4>basic</h4>
                <h2>$29</h2>
                <ul class="list-unstyled">
                    <li><b>4 GB</b> Ram</li>
                    <li><b>7/24</b> Tech Support</li>
                    <li><b>40 GB</b> SSD Cloud Storage</li>
                    <li>Monthly Backups</li>
                    <li>Palo Protection</li>
                </ul>
                <div class="table_btn">
                    <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
                <div class="table">
                <h4>PERSONAL</h4>
                <h2>$29</h2>
                <ul class="list-unstyled">
                    <li><b>4 GB</b> Ram</li>
                    <li><b>7/24</b> Tech Support</li>
                    <li><b>40 GB</b> SSD Cloud Storage</li>
                    <li>Monthly Backups</li>
                    <li>Palo Protection</li>
                </ul>
                <div class="table_btn">
                    <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
                <div class="table">
                <h4>BUSINESS</h4>
                <h2>$29</h2>
                <ul class="list-unstyled">
                    <li><b>4 GB</b> Ram</li>
                    <li><b>7/24</b> Tech Support</li>
                    <li><b>40 GB</b> SSD Cloud Storage</li>
                    <li>Monthly Backups</li>
                    <li>Palo Protection</li>
                </ul>
                <div class="table_btn">
                    <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
                <div class="table">
                <h4>profeesional</h4>
                <h2>$29</h2>
                <ul class="list-unstyled">
                    <li><b>4 GB</b> Ram</li>
                    <li><b>7/24</b> Tech Support</li>
                    <li><b>40 GB</b> SSD Cloud Storage</li>
                    <li>Monthly Backups</li>
                    <li>Palo Protection</li>
                </ul>
                <div class="table_btn">
                    <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

@stop


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

            <div class="col-md-6 col-lg-4">
            <div class="block-blog text-left">
                <a href="#"><img src="asset/img/blog/blog-image-1.jpg" alt="img"></a>
                <div class="content-blog">
                <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                <span>05, juin 2017</span>
                <a class="pull-right readmore" href="#">read more</a>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-lg-4">
            <div class="block-blog text-left">
                <a href="#"><img src="asset/img/blog/blog-image-2.jpg" class="img-responsive" alt="img"></a>
                <div class="content-blog">
                <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                <span>05, juin 2017</span>
                <a class="pull-right readmore" href="#">read more</a>
                </div>
            </div>
            </div>

            <div class="col-md-6 col-lg-4">
            <div class="block-blog text-left">
                <a href="#"><img src="asset/img/blog/blog-image-3.jpg" class="img-responsive" alt="img"></a>
                <div class="content-blog">
                <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                <span>05, juin 2017</span>
                <a class="pull-right readmore" href="#">read more</a>
                </div>
            </div>
            </div>

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
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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

          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
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
