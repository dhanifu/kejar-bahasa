@extends('layouts.app')
@section('title', 'Kelas Preview')

@section('style')
   <style>
       .class-section{
            margin-top:10%;
            min-height: 100vh;
        }

        .card-body h2{
            letter-spacing: 2px;
        }

        .copyright{
            width: 100%;
            padding: 2px;
            background-color: #f4f4f2;
            border: .5px solid rgb(187, 186, 186);
            margin-top: -4.5%;
        }

        .copyright p{
            margin: auto;
            padding: 15px;
            text-align: center;
        }

        @media (max-width: 800px) {
            h1{
                font-size: 25px;
            }

            h2{
                font-size: 20px;
                letter-spacing: 2px;
                margin-top: 10px;
            }

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
    <div class="class-section">
        <div class="container">
            <div class="card mx-4">
                <div class="card-header bg-white" style="height: 50px;"></div>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../user/image/adinda.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Judul</h2>
                            <p class="card-text mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis aliquam voluptatum culpa eius laudantium modi! Non, provident quisquam blanditiis ratione cumque laudantium veritatis et consequatur accusamus pariatur ad maiores sint!</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right bg-white" data-toggle="modal" data-target="#exampleModal">
                    <a href="#" class="btn btn-success">Rp.5000</a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
    
                </div>
                <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Beli</button>
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