<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="{{ route('home') }}">
            <div class="bold" style="font-family: 'Trebuchet MS', sans-serif;">SIMRS</div>
        </a>
    </div>

    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth">
                <i class="lnr lnr-arrow-left-circle"></i>
            </button>
        </div>

        <form class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary">Go</button>
                </span>
            </div>
        </form>

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('vendor/page/img/user.png') }}" class="img-circle" alt="Avatar">
                        <span>
                            @auth
                                {{ Auth::user()->name }}
                            @else
                                Guest
                            @endauth
                        </span>
                        <i class="icon-submenu lnr lnr-chevron-down"></i>
                    </a>

                    @auth
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="lnr lnr-exit"></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('login') }}"><i class="lnr lnr-enter"></i> <span>Login</span></a></li>
                        </ul>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
