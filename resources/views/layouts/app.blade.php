<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/icons/themify-icons/themify-icons.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f38b57ad54.js" crossorigin="anonymous"></script>
        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: 'Source Sans Pro', sans-serif;
            }

            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-thumb {
                background: rgb(84, 78, 78);
                border-radius: 10px;
            }

            .navbar{
                background-color: #ffff;
            }

            h1,h2{
                font-weight: 700;
                color:#002741;
            }

            .btn{
                border:none;
            }
            
            .text-footer{
                text-align: center;
                margin-top: -2%;
            }

            .footer h2{
                font-weight: 400;
            }

            .center { 
                text-align: center; 
            }

            .center a{
                font-size: 20px;
            }

            .footer-2 {
                margin: auto;
                width: 100%;
                padding: 50px;
                border: 1px solid lightgray;
            }

            .copyright{
                width: 100%;
                padding: 2px;
                background-color:#f4f4f2;
                border: .5px solid rgb(187, 186, 186);
            }

            .copyright p{
                margin: auto;
                padding: 15px;
                text-align: center;
            }

            .sticky{
                animation: fadeIn .7s;
            }

            @media (max-width: 800px) {
                .img-footer{
                    text-align: center;
                }

                .footer-2 .img-footer img{
                    margin-left: 0;
                }

                .text-footer{
                    margin-top: 2%;
                }
                
                .navbar {
                    background: transparent;
                    backdrop-filter: blur(40px);
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: .5;
                    transform: translateY(-10%);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
        <link rel="icon" href="{{ asset('user/image/logo2.png') }}">
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand ml-4" href="/">
            <img src="{{ asset('user/image/logo1.png') }}" alt="Logo" width="185" height="50" class="d-inline-block align-top" loading="lazy">
        </a>
        <button class="navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-md-4{{ request()->is('/') ? ' active' : ''}}">
                    <a class="nav-link" href="{{ route('user.welcome') }}">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-md-4{{ request()->is('class/*') ? ' active' : ''}}">
                    <a class="nav-link" href="{{ route('user.class.index') }}">Kelas</a>
                </li>
                <li class="nav-item mr-md-4{{ request()->is('about-us') ? ' active' : ''}}">
                    <a class="nav-link" href="{{ route('user.about') }}">About Us</a>
                </li>
                <li class="nav-item mr-md-4{{ request()->is('contact') ? ' active' : ''}}">
                    <a class="nav-link" href="{{ route('user.contact') }}">Contact</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: bold" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link btn mb-2" style="color: #fff; font-weight: bold; background-color: #1c2d41;" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ request()->is('dashboard')?'active':'' }}" href="{{ route('user.home') }}">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    @yield('content')

    <div class="footer-2 mt-4">
        <div class="row">
            <div class="col-md-6 img-footer">
                @yield('image-footer')
            </div>
            <div class="content text-footer col-md-6">
                <h3>Hubungi Kami</h3>
                <p class="center">@kejarbahasa.com</p>
            </div>
        </div>
    </div>

    <div class="copyright">
        <p>copyright &copy; 2020 - Kejar Bahasa</p>
    </div>

    <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 1){  
                $('nav').addClass("sticky" + " shadow-sm");
            }
            else {
                $('nav').removeClass("sticky" + " shadow-sm");
            }
        });
    </script>
    @yield('js')
</body>
</html>
