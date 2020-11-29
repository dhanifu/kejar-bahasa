<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: 'Source Sans Pro', sans-serif;
            }
            .navbar{
                background-color: white;
            }

            h1,h2{
                font-weight: 700;
                color:#002741;
            }

            .btn{
                border:none;
            }
        </style>
        <link rel="icon" href="{{ asset('user/image/logo2.png') }}">
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand ml-4" href="/">
            <img src="../user/image/logo1.png" alt="Logo" width="185" height="50" class="d-inline-block align-top" loading="lazy">
        </a>
        <button class="navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-md-4{{ request()->is('kelas') ? ' active' : ''}}">
                    <a class="nav-link" href="/kelas">Kelas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-md-4{{ request()->is('kontak') ? ' active' : ''}}">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item mr-md-4{{ request()->is('about-us') ? ' active' : ''}}">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                @guest
                    <li class="nav-item mr-md-4">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    @yield('footer')
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
</body>
</html>
