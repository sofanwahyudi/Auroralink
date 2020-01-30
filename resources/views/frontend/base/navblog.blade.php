            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-user"></span> {{ Auth::user()->name }}</a></li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> logout </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                </li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ url('member/login') }}"><span class="fa fa-sign-in"></span> Login</a></li>
                @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link" href="{{ url('member/register') }}"><span class="fa fa-user-plus"></span> Register</a></li>
                @endif
                @endauth
            </ul>
