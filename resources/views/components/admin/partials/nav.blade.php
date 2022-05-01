<div>
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#">
                            <i class="ficon" data-feather="menu"></i>
                        </a>
                    </li>
                </ul>

            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">

                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">
                                @auth
                                    {{ auth()->user()->name }}
                                @endauth
                            </span>
                            <span class="user-status">Admin</span>
                        </div>
                        <span class="avatar">
                            <img class="round" height="40" width="40" alt="avatar"
                                src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="page-profile.html">
                            <i class="me-50" data-feather="user"> </i>
                            Profile
                        </a>
                        {{-- <a class="dropdown-item" href="app-email.html">
                            <i class="me-50" data-feather="mail"></i>
                            messages
                        </a> --}}
                        <a class="nav-link dropdown-item"  onclick="$('#logout-form').submit()"  href="#">
                            <i class="me-50" data-feather="power"></i>
                            Logout
                        </a>
                    </div>
                </li>
                {!! Form::open(['route'=>'logout','method'=>'POST','id'=>'logout-form']) !!}
                {!! Form::close() !!}
            </ul>
        </div>
    </nav>
</div>
