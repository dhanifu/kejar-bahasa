<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                {{-- DASHBOARD --}}
                <li class="sidebar-item @if(request()->routeIs('admin.home')) selected @endif"> 
                    <a class="sidebar-link @if(request()->routeIs('admin.home')) active @endif"
                        href="{{route('admin.home')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Applications</span>
                </li>

                {{-- CATEGORY CLASS --}}
                <li class="sidebar-item @if(request()->routeIs('admin.category.*')) selected @endif">
                    <a class="sidebar-link @if(request()->routeIs('admin.category.*')) active @endif" href="{{route('admin.category.index')}}"
                        aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span
                            class="hide-menu">Category Class
                        </span>
                    </a>
                </li>
                
                {{-- KELAS --}}
                <li class="sidebar-item @if(request()->routeIs('admin.class.*')) selected @endif">
                    <a class="sidebar-link @if(request()->routeIs('admin.class.*')) active @endif" href="{{route('admin.class.index')}}"
                        aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span
                            class="hide-menu">Class
                        </span>
                    </a>
                </li>

                {{-- Module --}}
                <li class="sidebar-item @if(request()->routeIs('admin.module.*')) selected @endif">
                    <a class="sidebar-link @if(request()->routeIs('admin.module.*')) active @endif" href="{{route('admin.module.index')}}"
                        aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span
                            class="hide-menu">Module
                        </span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Profile</span>
                </li>

                {{-- About --}}
                <li class="sidebar-item @if(request()->routeIs('admin.about.*')) selected @endif">
                    <a class="sidebar-link @if(request()->routeIs('admin.about.*')) active @endif" href="{{route('admin.about.index')}}"
                        aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span
                            class="hide-menu">About
                        </span>
                    </a>
                </li>

                {{-- Contact --}}
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="#"
                        aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span
                            class="hide-menu">Contact
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
