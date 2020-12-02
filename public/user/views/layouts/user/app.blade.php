<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../user/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../user/js/bootstrap.bundle.min.js"></script>
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
        <link rel="icon" href="../user/image/logo2.png">
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
                <li class="nav-item mr-md-4">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <div class="footer-2">
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
</body>
</html>