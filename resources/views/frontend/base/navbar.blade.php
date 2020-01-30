@section('style')
.pemisah {
    position: absolute;
    top: 20px;
    left: 890px;
    width: 0;
    height: 50%;
    border-right: 1px solid #e1e1e1;
    border-right-width: 1px;
    border-right-style: solid;
    border-right-color: rgb(225, 225, 225);
}
@endsection
<nav id="nav-menu-container">
<ul class="nav-menu">
    <li><a href="{{ url('/') }}"><span class="fa fa-home"></span> Beranda</a></li>
    <li><a href="{{ url('/') }}#about-us"><span class="fa fa-building"></span> Tentang Kami</a></li>
    <li><a href="{{ url('/') }}#features"><span class="fa fa-bullhorn"></span> layanan</a></li>
    <li><a href="{{ url('/') }}#screenshots"><span class="fa fa-folder-open-o"></span> Portofolio</a></li>
    <li><a href="{{ url('/') }}#team"><span class="fa fa-users"></span> Team</a></li>
    {{--  <li><a href="#pricing">Pricing</a></li>  --}}
    {{--  <li><a href="{{ url('/blog') }}">Blog</a></li>  --}}
    <li><a href="{{ url('/') }}#contact"><span class="fa fa-phone"></span> Kontak</a></li>
    @auth
    <li><a href="{{ url('/member/clientarea') }}">Area Pelanggan</a></li>
    @else
    <li><a href="#"><span class="fa fa-sign-in"></span><b> Login</b></a></li>
    @if (Route::has('register'))
    <li><a href="#"><span class="fa fa-user-plus"></span><b> Register</b></a></li>
    @endif
    @endauth
</ul>
</nav>
<!-- #nav-menu-container -->
