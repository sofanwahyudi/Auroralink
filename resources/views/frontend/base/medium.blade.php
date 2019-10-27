<!DOCTYPE html>
<html lang="en">
    {{--  @include('frontend.navblog')  --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/pavicon.png">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="asset/css/medium.css" rel="stylesheet">
</head>
<body>
    <!-- Begin Nav
================================================== -->

<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href="{{url('/blog')}}">
        <img src="asset/img/logo.png" alt="logo">
        </a>
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Begin Menu -->

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Semua Blog <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Teknologi</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Tutorial</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Tips & Trik</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Update</a>
                </li>
            </ul>
            <!-- End Menu -->
            <!-- Begin Search -->
            @yield('search')
            <!-- End Search -->
        </div>
    </div>
    </nav>
    <!-- End Nav
================================================== -->

<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="text-center">
        <img src="image/Auroralink.png" class="img-fluid" alt="Responsive image" width='500'>

    </div>
        {{-- <div class="mainheading">
            <a href='#' target='_blank' title='Settia Blog'>
                <img src="{{url('img/bn.jpg')}}" alt=Settia  width='500'/></a>
	</div> --}}
<!-- End Site Title
================================================== -->

	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts">
	<div class="section-title">
        <h2><span>@yield('categories')</span></h2>
	</div>
	<div class="card-columns listfeaturedtag">

		@yield('content')

	</div>
    </section>
    <section class="article-post">
        @yield('article')
    </section>
	<!-- End Featured
	================================================== -->

	<!-- Recent Posts
	================================================== -->
	<section class="recent-posts">
	<div class="section-title">
		<h2><span>@yield('judul_recent')</span></h2>
	</div>
	<div class="card-columns listrecent">

		@yield('content_recent')

	</div>
	</section>
	<!-- Recent Posts
	================================================== -->
    {{--  @include('layout.blog.footer')  --}}

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="asset/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
