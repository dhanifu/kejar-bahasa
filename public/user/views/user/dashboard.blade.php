@extends('layouts.user.app')
@section('title', 'Dashboard')

@section('style')
    <style>
        .class-section{
            margin-top:12%;
            min-height: 100vh;
        }

        .title{
            text-align: center;
            letter-spacing: 2px;
        }   

        .center { 
            text-align: center; 
        }

        .center a{
            font-size: 20px;
        }

        .text-footer{
            margin-top: 1%;
        }

        .btn-primary{
            width: 100px;
        }

        .footer-2{
            background-color: #24252a;
        }

        .text-footer{
            color: white;
        }

        .footer-2 .img-footer img{
            margin-left: 100px;
            width: 100px;
        }

        @media(max-width:1024px){
            h1{
                font-size: 25px;
            }

            h3{
                font-size: 20px;
                letter-spacing: 2px;
                margin-top: 10px;
            }
            
            h4{
                font-size: 18px;
            }

            .footer-2 .img-footer img{
                margin-left: 50px;
            }
        }

        @media (max-width: 800px) {
            .card-body p{
                font-size: 14px;
            }

            .class-section{
                margin-top:100px;
                margin-bottom: 30px;
            }

            .footer-2 .img-footer img{
                margin-left: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="class-section">
            <div class="container">
                <h1 class="title">Kelas yang diikuti</h1>
                <div class="row py-4">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card">
                            <img src="user/image/adinda.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Mulai</a>
                            </div>
                        </div>
                    </div>

                
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card">
                            <img src="user/image/the beatles.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Mulai</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card">
                            <img src="user/image/kopi.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Mulai</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card">
                            <img src="user/image/minder.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Mulai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('image-footer')        
    <img src="../user/image/logo3.png" class="img-fluid" alt=""/>
@endsection