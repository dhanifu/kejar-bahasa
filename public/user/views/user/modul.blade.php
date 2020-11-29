@extends('layouts.user.app')
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

        @media (max-width: 800px) {
            h2{
                font-size: 20px;
                margin-top: 10px;
            }

            p, a{
                font-size: 12px;
            }

            .card-footer a{
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
            <div class="row">
                <div class="col-md-3">
                    <div class="card mt-4">
                        <div class="card-header">
                            Judul modul
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="">Bab 1</a></li>
                            <li class="list-group-item"><a href="">Bab 2</a></li>
                            <li class="list-group-item"><a href="">Bab 3</a></li>
                            <li class="list-group-item"><a href="">Bab 4</a></li>
                            <li class="list-group-item"><a href="">Bab 5</a></li>
                            <li class="list-group-item"><a href="">Bab 6</a></li>
                            <li class="list-group-item"><a href="">Bab 7</a></li>
                            <li class="list-group-item"><a href="">Bab 8</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card mt-4">
                        <div class="card-body px-4">
                            <h2 class="card-title">Judul</h2>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At explicabo cumque sit, facilis dolor non similique quia impedit tenetur eveniet ab sapiente maiores, dolorem nulla! Excepturi voluptate consequuntur impedit quos?</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia sint, vel nobis recusandae placeat nulla similique vitae ad voluptas porro, modi obcaecati illo commodi cumque. Consequuntur deleniti nesciunt eum illo!</p>
                        </div>
                        <div class="card-footer text-right bg-white">
                            <a href="#" class="btn btn-success">Selanjutnya</a>
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