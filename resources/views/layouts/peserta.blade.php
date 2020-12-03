<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('peserta/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('peserta/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('peserta/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/meanmenu/meanmenu.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/notika-custom-icon.css')}}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/wave/waves.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/main.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('peserta/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('peserta/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    @include('layouts.modules.header')
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    @include('layouts.modules.menu')
    <!-- Main Menu area End-->
    @yield('content')
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>
                        All Rights Reserved by Kejar Bahasa. Developed by <a
                        href="https://discord.gg/Uu6UYa5">Pos Ronda</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="{{asset('peserta/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('peserta/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('peserta/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('peserta/js/jquery-price-slider.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('peserta/js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('peserta/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('peserta/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('peserta/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('peserta/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('peserta/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('peserta/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{asset('peserta/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('peserta/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('peserta/js/jvectormap/jvectormap-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('peserta/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('peserta/js/sparkline/sparkline-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('peserta/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('peserta/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('peserta/js/flot/curvedLines.js')}}"></script>
    <script src="{{asset('peserta/js/flot/flot-active.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{asset('peserta/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('peserta/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('peserta/js/knob/knob-active.js')}}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{asset('peserta/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('peserta/js/wave/wave-active.js')}}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{asset('peserta/js/todo/jquery.todo.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('peserta/js/plugins.js')}}"></script>
	<!--  Chat JS
		============================================ -->
    <script src="{{asset('peserta/js/chat/moment.min.js')}}"></script>
    <script src="{{asset('peserta/js/chat/jquery.chat.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('peserta/js/main.js')}}"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="{{asset('peserta/js/tawk-chat.js')}}"></script>
</body>

</html>