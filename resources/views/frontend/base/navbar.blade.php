<nav id="nav-menu-container">
<ul class="nav-menu">
    <li><a href="{{ url('/') }}">Beranda</a></li>
    <li><a href="{{ url('/') }}#about-us">Tentang Kami</a></li>
    <li><a href="{{ url('/') }}#features">layanan</a></li>
    <li><a href="{{ url('/') }}#screenshots">Portofolio</a></li>
    <li><a href="{{ url('/') }}#team">Team</a></li>
    {{--  <li><a href="#pricing">Pricing</a></li>  --}}
    <li><a href="{{ url('/blog') }}">Blog</a></li>
    <li><a href="{{ url('/') }}#contact">Kontak</a></li>
    @auth
    <li><a href="{{ route('home') }}">Area Pelanggan</a></li>
    @else
    <li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span> Login</a></li>
    @if (Route::has('register'))
    <li><a href="{{ route('register') }}"><span class="fa fa-user-plus"></span> Register</a></li>
    @endif
    @endauth
</ul>
</nav>
<!-- #nav-menu-container -->
