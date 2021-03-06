<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        @role('admin')
                        <a href="{{route('admin.home')}}">
                            <b class="logo-icon">
                                <img src="{{asset('admin/assets/images/kejarbahasa.png')}}" alt="homepage" class="dark-logo"  width="200" />
                               
                            </b>
                            <!--End Logo icon -->
                        </a>
                        @elserole('user')
                        <a href="{{route('user.home')}}">
                            <b class="logo-icon">
                                <img src="{{asset('admin/assets/images/kejarbahasa.png')}}" alt="homepage" class="dark-logo"  width="200" />
                               
                            </b>
                            <!--End Logo icon -->
                        </a>
                        @endrole
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        @yield('searchBox')
                    </ul>
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                @if (empty(Auth::user()->picture))
                                    <img id="user-image" src="{{asset('admin/assets/images/users/d3.jpg')}}" alt="user" class="rounded-circle"
                                        width="40">
                                @else
                                    <img id="user-image" src="{{asset('images/profile/'.Auth::user()->picture)}}" alt="user" class="rounded-circle"
                                        width="40">
                                @endif
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{Auth::user()->name}}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                @role('admin')
                                <a class="dropdown-item" href="{{route('admin.profile.index')}}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                @elserole('user')
                                <a class="dropdown-item" href="{{route('user.dashboard.profile.index')}}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                @endrole
                                <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>