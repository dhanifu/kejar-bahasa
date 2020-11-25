<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{asset('admin/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        @include('layouts.modules.topbar')
       
        @include('layouts.modules.sidebar')
        
        <div class="page-wrapper"> 
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-8 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">@yield('page-title')</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-4">
                        @yield('button')
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                @yield('content')
            </div>
           
            <!-- footer -->
            <footer class="footer text-center text-muted shadow">
                All Rights Reserved by Kejar Bahasa. Developed by <a
                    href="https://discord.gg/Uu6UYa5">Pos Ronda</a>.
            </footer>
            <!-- End footer -->
        </div>
       
    </div>
    
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{asset('admin/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('admin/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{asset('admin/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @yield('js')
</body>

</html>