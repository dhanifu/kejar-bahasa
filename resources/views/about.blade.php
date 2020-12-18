@extends('layouts.app')
@section('title', 'About Us')

@section('style')
    <style>
        .class-section{
            margin-top:6%;
            min-height: 100vh;
        }

        .title{
            text-align: center;
            letter-spacing: 2px;
        }   

        h1{
            color:#000000;
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

        .card{
            background-color: #B5B5B5;
            border-radius: 0;
            border:none;
        }

        @media(max-width:1024px){
            h1{
                font-size: 25px;
            }
            h4{
                font-size: 18px;
            }

            .footer-2 .img-footer img{
                margin-left: 50px;
            }

            .class-section{
                margin-top:80px;
            }
        }

        @media (max-width: 800px) {
            .title{
                text-align: center;
                font-size: 25px;
            }

            .class-section{
                margin-top:70px;
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
    <div class="card py-5">
        <h1 class="title">Tentang Kami</h1>
    </div>
    <div class="container-fluid">
        <div class="content py-5 mx-3">
            <h4 class="mb-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KejarBahasa adalah sebuah media yang menyediakan tutorial, informasi yang berkaitan dengan teknologi dan informasi 
                seperti pemograman web, dan mobile. Topik yang kami cakup lumayan bervariasi dari PHP, Javascript, Java maupun Kotlin 
                adapun keperluan kantor seperti Microsoft Word, Power Point dan Excel.</h4>
            <h4 class="mb-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selain menyediakan modul/artikel tutorial gratis, kami juga menyediakan modul premium untuk teman teman yang 
                membutuhkan materi yang lebih terstuktur dan komprensif serta bimbingan selama belajar.</h4>
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk teman-teman yang sempat mampir pada website kami, jika merasa apa yang ada di dalam website kami 
                bermanfaat, bantu kami menyebarluaskan manfaat ini. Kedepannya dengan dukungan teman-teman semua, modul yang 
                ada di KejarBahasa akan semakin lengkap, yang gratis maupun premium.</h4>   
        </div>
    </div>
</div>
@endsection

@section('image-footer')        
    <img src="{{ asset('user/image/logo3.png') }}" class="img-fluid" alt=""/>
@endsection