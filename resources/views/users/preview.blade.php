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

        @media (max-width:1024px){
            .footer-2 .img-footer img{
                margin-left: 50px;
            }
        }

        @media (max-width: 800px) {
            h1{
                font-size: 25px;
            }

            h2,h3{
                font-size: 20px;
                letter-spacing: 2px;
                margin-top: 10px;
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
    <div class="class-section">
        <div class="container">
            <div class="card mx-4 shadow">
                <div class="card-header bg-white" style="height: 50px;"></div>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('images/class/'.$class->picture) }}" class="card-img" alt="{{ $class->name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">{{ $class->name }}</h2>
                            <p class="card-text mt-4">{{ $class->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    @if ($class->price != 0)
                        Harga : <span style="font-weight: bold">Rp {{ number_format($class->price) }}</span>
                    @else
                        Harga : <span class="badge badge-primary" style="font-weight: bold">Free</span>
                    @endif
                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                        Checkout
                    </button>
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

@section('image-footer')        
    <img src="{{ asset('user/image/logo3.png') }}" class="img-fluid" alt=""/>
@endsection