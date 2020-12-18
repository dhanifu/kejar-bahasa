@extends('layouts.app')
@section('title', 'Contact Us')

@section('style')
    <style>
        .section1{
            padding: 10%;
        }

        .section1 h1{
            letter-spacing: 2px;
        }

        .img {
            text-align: center;
        }

        .img img{
            width: 100%;
        }

        .section1 .btn{
            background: linear-gradient(150deg, #085f94, #20e6f1);
            border:none;
            border-radius: 30px;
            color: white;
        }

        .btn:hover{
            filter: brightness(85%);
            color:white;
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

        @media(max-width:1024px){
            h1{
                font-size: 25px;
            }
            .footer-2 .img-footer img{
                margin-left: 50px;
            }
        }

        @media (max-width: 767px) {
            .class-section{
                margin-top:10%;
            }

            .class-section h1{
                text-align: center;
            }

            .footer-2 .img-footer img{
                margin-left: 0;
            }
        }
        @media (max-width: 400px) {
            .class-section{
                margin-top:20%;
            }
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="class-section">
        <div class="section1">
            <h1>Contact</h1>
            <div class="row">
                <div class="col-md-6 img">
                    <img src="{{ asset('user/image/contact.png') }}" class="img-fluid" alt=""/>
                </div>
                <div class="content col-md-6">
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control" placeholder="yourmail@gmail.com">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="yourquestion..."></textarea>
                    </div>
                    <button class="btn w-100">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('image-footer')        
    <img src="{{ asset('user/image/logo3.png') }}" class="img-fluid" alt=""/>
@endsection
