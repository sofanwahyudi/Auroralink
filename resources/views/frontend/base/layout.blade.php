<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129762300-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-129762300-2');
  </script>

  <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '500091407156210');
      fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=500091407156210&ev=PageView&noscript=1"/>
    </noscript>
<!-- End Facebook Pixel Code -->

  <!-- Favicons -->
  <link href="{{url('asset/img/pavicon.png')}}" rel="icon">
  <link href="{{url('asset/img/pavicon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="{{url('asset/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('asset/css/wa.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{url('asset/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{url('asset/lib/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
  <link href="{{url('asset/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{url('asset/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{url('asset/lib/modal-video/css/modal-video.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
    <link href="{{url('asset/css/mediumish.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{url('asset/css/style.css')}}" rel="stylesheet">

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
        <a href="#body"><img src="{{url('asset/img/logo.png')}}" alt="" title="" /></a>
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

            <a class="navbar-brand" href="#">Segera Hadir...</a>
            <p>Auroralink Mobile App</p>
            <img src="{{url('image/comingsoon.jpg')}}" alt="about" height="150" width="300">
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Aplikasi Demo</h4>

            <ul class="list-unstyled">
              <li><a href="pos.auroralink.ic">Point Of Sale</a></li>
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

            <h4>Pusat Bantuan</h4>

            <ul class="list-unstyled">
              <li><a href="{{ url('tickets/index') }}">Tickets</a></li>
              <li><a href="#">Bantuan Remote</a></li>
              <li><a href="#">Bantuan Onsite</a></li>
              <li><a href="#">Kontak Team</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Syarat&Ketentuan</h4>

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
  <script src="{{url('asset/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{url('asset/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{url('asset/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('asset/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{url('asset/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{url('asset/lib/easing/easing.min.js')}}"></script>
  <script src="{{url('asset/lib/modal-video/js/modal-video.js')}}"></script>
  <script src="{{url('asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('asset/lib/wow/wow.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{url('asset/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{url('asset/js/main.js')}}"></script>



<!-- ================= Start WhatsApp==== -->

  <a class='fa fa-whatsapp fa-10x animated infinite rubberBand' href='javascript:void(0);' id='wa-icon' onclick='openModal()' style="font-size: 24px;"></a>
  <div class='pelajar' id='pelajar'>
        </div>
        <div id='whatsapp'>
        <span class='wa-x' onclick='closeModal()'></span>
        <p class='wa-title'>Kirim Pesan Anda Dengan Form Whatsapp</p>
        <div class='wa-body'>
        <input class='tujuan' type='hidden' value='08113045521'/>
        <!-- No. WhatsApp -->
        <input class='nama wa-input bagi' placeholder='Nama Lengkap..' type='text'/>
        <input class='email wa-input bagi' placeholder='Alamat E-mail..' type='email'/>
        <textarea class='pesan wa-input full' placeholder='Pesan..'></textarea>
        <a class='submit'>Kirim</a>
        </div>
    </div>
    <script type='text/javascript'>
        function closeModal() {
        document.getElementById('pelajar').classList.remove('active')
        document.getElementById('whatsapp').classList.remove('active')
        }
        function openModal() {
        document.getElementById('pelajar').classList.add('active')
        document.getElementById('whatsapp').classList.add('active')
        }


        // Onclick Whatsapp Sent!
        $('#whatsapp .submit').click(WhatsApp);


        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        function WhatsApp() {
            var ph = '';
            if ($('#whatsapp .nama').val() == '') { // Cek Nama
                ph = $('#whatsapp .nama').attr('placeholder');
                alert('Silahkan tulis ' + ph);
                $('#whatsapp .nama').focus();
                return false;
            } else if ($('#whatsapp .email').val() == '') { // Cek Email
                ph = $('#whatsapp .email').attr('placeholder');
                alert('Silahkan tulis ' + ph);
                $('#whatsapp .email').focus();
                return false;
            } else if (reg.test($('#whatsapp .email').val()) == false) { // Cek Validasi Email
                alert('Alamat E-mail tidak valid.');
                $('#whatsapp .email').focus();
                 return false;
            } else if ($('#whatsapp .pesan').val() == '') { // Cek Pesan
                ph = $('#whatsapp .pesan').attr('placeholder');
                alert('Silahkan tulis ' + ph);
                $('#whatsapp .pesan').focus();
                return false;
            } else {
                if (!confirm("Sudah menginstall WhatsApp?")) {
                    window.open("https://www.whatsapp.com/download/");
                } else {
                    // Check Device (Mobile/Desktop)
                    var url_wa = 'https://web.whatsapp.com/send';
                    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                        url_wa = 'whatsapp://send/';
                    }
                    // Get Value
                    var tujuan = $('#whatsapp .tujuan').val(),
                            via_url = location.href,
                            nama = $('#whatsapp .nama').val(),
                            email = $('#whatsapp .email').val(),
                            pesan = $('#whatsapp .pesan').val();
                    $(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Halo, saya *' + nama + '* (' + email + ').. %0A%0A' + pesan + '%0A%0Avia ' + via_url);
                    var w = 960,
                            h = 540,
                            left = Number((screen.width / 2) - (w / 2)),
                            tops = Number((screen.height / 2) - (h / 2)),
                            popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
                    popupWindow.focus();
                    return false;
                }
            }
        }
        </script>
        <!-- ================= End WhatsApp==== -->

</body>
</html>
