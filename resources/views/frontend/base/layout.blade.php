<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="asset/img/pavicon.png" rel="icon">
  <link href="asset/img/pavicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="asset/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="asset/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="asset/lib/animate/animate.min.css" rel="stylesheet">
  <link href="asset/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="asset/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

<header id="header" class="header header-hide">
    <div class="container">
        <div id="logo" class="pull-left">
        <a href="#body"><img src="asset/img/logo.png" alt="" title="" /></a>
        </div>
        @include('frontend.base.navbar')
    </div>
</header>
<!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
    @yield('hero')
  <!--==========================
    Get Started Section
  ============================-->
    @yield('start')
  <!--==========================
    About Us Section
  ============================-->
    @yield('about')
  <!--==========================
    Features Section
  ============================-->
    @yield('services')
  <!--==========================
    Screenshots Section
  ============================-->
    @yield('portofolio')
  <!--==========================
    Video Section
  ============================-->
    @yield('video')
  <!--==========================
    Team Section
  ============================-->
    @yield('team')
  <!--==========================
    Testimonials Section
  ============================-->
    @yield('testimoni')
  <!--==========================
    Pricing Table Section
  ============================-->
    @yield('price')
  <!--==========================
    Blog Section
  ============================-->
    @yield('blog')
  <!--==========================
    Newsletter Section
  ============================-->
    @yield('newsletter')
  <!--==========================
    Contact Section
  ============================-->
    @yield('contact')
  <!--==========================
    Footer
  ============================-->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">AuroralinkID</a>
            <p>Auroralink is a provider of technical services engaged in information and technology since 2011, starting from making information systems (Website / Application), network and computer maintenance, laptop services and others.</p>
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Demo Apps</h4>

            <ul class="list-unstyled">
              <li><a href="#">Point Of Sale</a></li>
              <li><a href="#">WMS</a></li>
              <li><a href="#">School App</a></li>
              <li><a href="#">HR App</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Proposal</h4>

            <ul class="list-unstyled">
              <li><a href="#">MOU</a></li>
              <li><a href="#">Form Request</a></li>
              <li><a href="#">Form Example</a></li>
              <li><a href="#">Proposal</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Support Center</h4>

            <ul class="list-unstyled">
              <li><a href="#">faq</a></li>
              <li><a href="#">Remote Support</a></li>
              <li><a href="#">Onsite Support</a></li>
              <li><a href="#">Contact Team</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Term Of Services</h4>

            <ul class="list-unstyled">
              {{--  <li><a href="#">Privacy</a></li>
              <li><a href="#">Features item</a></li>
              <li><a href="#">Live streaming</a></li>  --}}
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights AuroralinkID. All rights reserved.</p>
        <div class="credits">

            {{--  All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eStartup
            --}}
          {{--  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>  --}}
        </div>
      </div>
    </div>

  </footer>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="asset/lib/jquery/jquery.min.js"></script>
  <script src="asset/lib/jquery/jquery-migrate.min.js"></script>
  <script src="asset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/lib/superfish/hoverIntent.js"></script>
  <script src="asset/lib/superfish/superfish.min.js"></script>
  <script src="asset/lib/easing/easing.min.js"></script>
  <script src="asset/lib/modal-video/js/modal-video.js"></script>
  <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="asset/lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="asset/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="asset/js/main.js"></script>

</body>
</html>
