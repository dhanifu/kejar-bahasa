@extends('layouts.app')
@section('title', 'Modul')

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
            h2{
                font-size: 20px;
                margin-top: 10px;
            }

            h3{
                font-size: 20px;
                letter-spacing: 2px;
                margin-top: 10px;
            }

            .card-body p{
                font-size: 14px;
            }

            .card-footer a{
                font-size: 12px;
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
            <div class="row">
                <div class="col-md-3">
                    <div class="card mt-4 shadow">
                        <div class="card-header">
                            Judul modul
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($bab as $m)
                                <li class="list-group-item {{ $module == $m->code ? 'active':'' }}"
                                    onclick="document.location.href='{{ route('user.class.module', [$class, $m->code]) }}'"
                                    style="cursor: pointer">
                                    {{ $m->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card mt-4 shadow">
                        <div class="card-body px-4">
                            <h2 class="card-title">{{ $modul->title }}</h2>
                            {!! $modul->content !!}
                        </div>
                        <div class="card-footer text-right bg-white">
                            <button onclick="" class="btn btn-success">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('image-footer')        
    <img src="{{ asset('user/image/logo3.png') }}" class="img-fluid" alt=""/>
@endsection