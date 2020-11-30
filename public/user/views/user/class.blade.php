@extends('layouts.user.app')
@section('title','Kelas')
    
@section('style')
    <style>
        .class-section{
            margin-top:10%;
            min-height: 100vh;
        }

        .title{
            text-align: left;
            letter-spacing: 2px;
        }   

        .btn-primary{
            width: 100px;
        }

        .text-footer{
            margin-top: 1%;
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
            h2,h3{
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
            .title{
                text-align: center;
                font-size: 25px;
            }

            .class-section{
                margin-top:100px;
                margin-bottom: 30px;
            }
            .card-body p{
                font-size: 14px;
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
                <h1 class="title">Kelas</h1>
                <div class="row py-4">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card mb-3">
                            <img src="user/image/adinda.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="/kelas/preview" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>

                
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card mb-3">
                            <img src="user/image/the beatles.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card mb-3">
                            <img src="user/image/kopi.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card mb-3">
                            <img src="user/image/minder.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Judul</h4>
                                </div>
                                <p>Deskripsi</p>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">Lihat</a>
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