@extends('layouts.user.app')
@section('title','Kejar Bahasa')

@section('style')
    <style>
        .section1{
            padding: 10%;
            padding-top: 0;
        }
        .section1 h1{
            margin-bottom:20px;
            letter-spacing: 2px;
        }

        .content{
            transform: translateY(30%);
        }

        .content p{
            font-size: 20px;
        }

        .content h2, h3{
            text-align: center;
            letter-spacing: 3px;
        }

        .section1 .row{
            margin-top: 10%;
        }
        .img {
            text-align: center;
        }
        .img img{
            width: 100%;
        }

        .class-section h1{
            text-align: center;
        }

        .footer {
            margin: auto;
            margin-top: 100px;
            width: 100%;
            padding: 50px;
            background-color: #24252a;
        }
        .footer h1, .footer h3 {
            margin: auto;
            width: 100%;
            text-align: center;
            color: #ffff;
            letter-spacing: 2px;
        }

        .footer h1{
            font-weight: 600;
        }

        .footer-2 .img-footer img{
            margin-left: 50px;
            width: 250px;
            height: 68px;
        }

        @media(max-width:1024px){
            h1{
                font-size: 25px;
            }
            h2,h3{
                font-size: 20px;
                letter-spacing: 2px;
                margin-top: 10px;
            }
            h4{
                font-size: 18px;
            }

            .card-footer small{
                font-size: 11px;
            }

            .card-body p{
                font-size: 13px;
            }

            .content p{
                font-size: 18px;
            }
        }

        @media (max-width: 800px) {
            .section1{
                margin-top: 100px;
            }

            .content{
                transform: translateY(0);
            }

            .content p{
                font-size: 15px;
            }

            .img-footer{
                text-align: center;
            }

            .footer-2 .img-footer img{
                margin-left: 0;
            }

            .text-footer{
                margin-top: 2%;
            }

            .center a{
                font-size: 15px;
            }
        }
 
    </style>    
@endsection

@section('content')
    <div class="section1">
        <div class="row">
            <div class="content col-md-6">
                <h1>Kejar Bahasa</h1>
                <p>Kejar Bahasa merupakan platform untuk meningkatkan kemampuan dibidang akademik dengan modul pelatihan terbaik yang ditujukan untuk pelajar, mahasiswa, dan pengajar di Indonesia</p>    
                <a class="btn btn-primary" href="#" role="button">Register</a>
            </div>
            <div class="col-md-6 img">
                <img src="user/image/landingpage.png" class="img-fluid" alt="..."/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 img">
                <img src="user/image/landingpage2.png" class="img-fluid" alt="..."/>
            </div>
            <div class="content col-md-6">
                <h2>Mulai pelajaran Anda</h2>
                <h2>from Zero to Hero</h2>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="class-section">
            <h1>Kelas Terbaru</h1>
            <div class="row mt-4">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card mb-3 shadow">
                        <img src="user/image/adinda.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Judul</h4>
                            </div>
                            <p>Deskripsi</p>
                        </div>
                        <div class="card-footer">
                            <small class="my-auto">Dibuat 1 hari yang lalu</small>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card mb-3 shadow">
                        <img src="user/image/the beatles.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Judul</h4>
                            </div>
                            <p>Deskripsi</p>
                        </div>
                        <div class="card-footer">
                            <small class="my-auto">Dibuat 1 hari yang lalu</small>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card mb-3 shadow">
                        <img src="user/image/kopi.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Judul</h4>
                            </div>
                            <p>Deskripsi</p>
                        </div>
                        <div class="card-footer">
                            <small class="my-auto">Dibuat 1 hari yang lalu</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card mb-3 shadow">
                        <img src="user/image/minder.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Judul</h4>
                            </div>
                            <p>Deskripsi</p>
                        </div>
                        <div class="card-footer">
                            <small class="my-auto">Dibuat 1 hari yang lalu</small>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>

    <div class="footer">
        <h1>Belajar Yuk!</h1>
        <h3 class="mt-4">dunia menunggu Anda untuk</h3>
        <h3>menggapai cita-cita</h3>
        <div class="center mt-4">
            <a href="#" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </div>
@endsection

@section('image-footer')        
    <img src="../user/image/logo1.png" class="img-fluid" alt=""/>
@endsection