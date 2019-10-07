<nav id="nav-menu-container">
<ul class="nav-menu">
    <li class="menu-active"><a href="#hero">Home</a></li>
    <li><a href="#about-us">About</a></li>
    <li><a href="#features">Our Service</a></li>
    <li><a href="#screenshots">Portofolio</a></li>
    <li><a href="#team">Team</a></li>
    <li><a href="#pricing">Pricing</a></li>
    <li><a href="#blog">Blog</a></li>
    <li><a href="#contact">Contact</a></li>
    @auth
    <li><a href="{{ url('/home') }}">Client Area</a></li>
    @else
    <li><a href="{{ route('login') }}">Login</a></li>
    @if (Route::has('register'))
    <li><a href="{{ route('register') }}">Register</a></li>
    @endif
    @endauth
</ul>
</nav>
<!-- #nav-menu-container -->
