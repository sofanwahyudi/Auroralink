<nav id="nav-menu-container">
<ul class="nav-menu">
    <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/') }}#about-us">About</a></li>
    <li><a href="{{ url('/') }}#features">Our Service</a></li>
    <li><a href="{{ url('/') }}#screenshots">Portofolio</a></li>
    <li><a href="{{ url('/') }}#team">Team</a></li>
    {{--  <li><a href="#pricing">Pricing</a></li>  --}}
    <li><a href="{{ url('/blog') }}">Blog</a></li>
    <li><a href="{{ url('/tickets') }}">Tickets</a></li>
    <li><a href="{{ url('/') }}#contact">Contact</a></li>
    @auth
    <li><a href="{{ route('home') }}">Client Area</a></li>
    @else
    <li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span> Login</a></li>
    @if (Route::has('register'))
    <li><a href="{{ route('register') }}"><span class="fa fa-user-plus"></span> Register</a></li>
    @endif
    @endauth
</ul>
</nav>
<!-- #nav-menu-container -->
