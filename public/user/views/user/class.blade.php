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

        label{
            color: rgb(89, 79, 79);
            font-weight: 600;
            font-size: 15px;
        }

        .header{
            /* ubah sendiri kalo aneh bg-colornya */
            border:none;
        }

        .header h1{
            font-weight: 600;
        }

        .d-flex p,i{
            font-weight: 700;
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
            <div class="card header mt-4 bg-info">
                <div class="card-body">
                    <h1 class="text-white">Kelas</h1>
                    <h4 class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptates, ratione similique eum deserunt quae reprehenderit aut in consequatur culpa tenetur voluptatum animi labore. Blanditiis pariatur alias libero. Dolores, vitae?</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div id="accordion">
                        <div class="card mt-4 shadow p-3">
                            <div class="card-body">
                                <h4 class="mb-3">Filter</h4>
                                <div class="form-group">
                                    <input type="text" placeholder="&#xF002;&nbsp;&nbsp;Search" style="font-family:FontAwesome,'Source Sans Pro', sans-serif;" class="form-control"/>
                                </div>
                                <div id="headingOne">
                                    <div class="d-flex justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <p>Tipe Kelas</p>   
                                        <i class="fas fa-angle-down"></i>   
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse my-auto" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Gratis</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Berbayar</label>
                                    </div>
                                </div>

                                <div id="headingTwo">
                                    <div class="d-flex justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <p>Harga</p>    
                                        <i class="fas fa-angle-down"></i> 
                                    </div>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                        <label class="form-check-label" for="exampleCheck3">Termurah</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                        <label class="form-check-label" for="exampleCheck4">Termahal</label>
                                    </div>
                                </div>

                                <div id="headingThree">
                                    <div class="d-flex justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        <p>Upload</p>   
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                        <label class="form-check-label" for="exampleCheck5">Terbaru</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                        <label class="form-check-label" for="exampleCheck6">Terlama</label>
                                    </div>
                                </div>

                                <div id="headingFour">
                                    <div class="d-flex justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        <p>Kategori</p> 
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck7">
                                        <label class="form-check-label" for="exampleCheck7">Android</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck8">
                                        <label class="form-check-label" for="exampleCheck8">IOS</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck9">
                                        <label class="form-check-label" for="exampleCheck9">Web</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9">
                    <div class="row mt-4">
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card mb-3 shadow">
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
        
                    
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card mb-3 shadow">
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
                    
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card mb-3 shadow">
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
        
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card mb-3 shadow">
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
    </div>
@endsection

@section('image-footer')        
    <img src="../user/image/logo3.png" class="img-fluid" alt=""/>
@endsection