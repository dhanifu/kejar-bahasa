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

        .copyright{
            width: 100%;
            padding: 2px;
            background-color: #f4f4f2;
            border: .5px solid rgb(187, 186, 186);
        }

        .copyright p{
            margin: auto;
            padding: 15px;
            text-align: center;
        }

        .btn-primary{
            width: 100px;
        }

        @media(max-width:1024px){
            h1{
                font-size: 25px;
            }
            h4{
                font-size: 18px;
            }
        }

        @media (max-width: 800px) {
            p, a{
                font-size: 12px;
            }

            .class-section{
                margin-top:100px;
                margin-bottom: 30px;
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
                                <a href="#" class="btn btn-primary">Lihat</a>
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
                                <a href="#" class="btn btn-primary">Lihat</a>
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
                                <a href="#" class="btn btn-primary">Lihat</a>
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
                                <a href="#" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<div class="copyright">
    <p>copyright &copy; 2020 - Kejar Bahasa</p>
</div>
@endsection