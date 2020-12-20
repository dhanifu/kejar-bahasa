@extends('layouts.app')
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
            background: linear-gradient(150deg, #085f94, #20e6f1);
            border:none;
        }

        .header h1{
            font-weight: 600;
        }

        .d-flex p,i{
            font-weight: 700;
        }

        #x-btn {
            font-size: 12px;
            color: darkblue;
        }

        #x-btn:focus{
            outline: 0;
            box-shadow: 0 0 0 0;
        }
        #x-btn:hover{
            cursor: pointer;
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

            #a {
                margin-top: 17px;
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="class-section">

                <div class="card header shadow">
                    <div class="card-body">
                        <h1 class="text-white">Kelas</h1>
                        <h4 class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptates, ratione similique eum deserunt quae reprehenderit aut in consequatur culpa tenetur voluptatum animi labore.</h4>
                    </div>
                </div>

                <form action="{{ route('user.class.index') }}" method="GET" id="filterForm">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div id="accordion">
                                <div class="card p-4">
                                    <h4 style="margin-bottom: -3px">Filter</h4>
                                    <hr>
                                    <div id="headingOne">
                                        <div class="d-flex justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <p>Tipe Kelas</p>   
                                            <i class="fas fa-angle-down"></i>   
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="collapse my-auto show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="gratis" name="type" 
                                                    value="free" onclick="filterResults()" {{ request()->type=="free"?'checked':'' }}>
                                            <label class="custom-control-label" for="gratis">Gratis</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="bayar" name="type" 
                                                    value="paid" onclick="filterResults()" {{ request()->type=="paid"?'checked':'' }}>
                                            <label class="custom-control-label" for="bayar">Berbayar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="headingTwo">
                                        <div class="d-flex justify-content-between" style="cursor: pointer" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            <p>Kategori</p>
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    </div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                        @foreach($categories as $categ)
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="category" id="{{$categ->id}}"
                                                        value="{{ $categ->id }}" onclick="filterResults()"
                                                        @if (in_array($categ->id, explode(',', request()->input('filter.category'))))
                                                            checked
                                                        @endif>
                                                <label class="custom-control-label" for="{{$categ->id}}">{{ $categ->name }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-dark col-12" id="clear">Clear</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="row" id="a">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" list="classSearchList" autocomplete="off"
                                                placeholder="&nbsp;&#xF002;&nbsp;&nbsp;Search" style="font-family:FontAwesome,'Source Sans Pro', sans-serif;"
                                                value="{{ request()->keyword }}">
                                            <button type="button" class="btn bg-transparent" id="x-btn" style="margin-left: -40px; z-index: 100;">
                                                <i class="ti-close"></i>
                                            </button>
                                        </div>
                                        <div id="classSearchList" class="shadow d-none" style="position: absolute; margin-top: 1px; width: 300px; background: #ffffff; !important; z-index: 10;">
                                            <div class="list-group list-group-flush" id="list-tab" role="tablist"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="sort" id="sort" class="selectpicker form-control"
                                                data-style="border border-secondary" title="Sort">
                                            <option value="oldest"
                                                {{ request()->sort=="oldest"?'selected':'' }}>
                                                Terlama
                                            </option>
                                            <option value="newest" {{empty(request()->sort)?'selected':''}}
                                                {{ request()->sort=="newest"?'selected':'' }}>
                                                Terbaru
                                            </option>
                                            <option value="highest_price"
                                                {{ request()->sort=="highest_price"?'selected':'' }}>
                                                Harga tertinggi
                                            </option>
                                            <option value="lowest_price"
                                                {{ request()->sort=="lowest_price"?'selected':'' }}>
                                                Harga terendah
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top: 5px">
                            <div class="row">
                
                                @forelse($classes as $kelas)
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="card mb-3 shadow">
                                        <img src="{{ asset('images/class/'.$kelas->picture) }}" class="card-img-top" alt="{{ $kelas->name }}">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h4>{{ $kelas->name }}</h4>
                                            </div>
                                            <p>{{ substr($kelas->description, 0, 45) }} ...</p>
                                        </div>
                                        <div class="card-footer text-right">
                                            <a href="{{ route('user.class.class', $kelas->code) }}" class="btn btn-primary">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h3>Kelas tidak ditemukan, mohon coba kata kunci lain atau yang lebih umum</h3>
                                </div>
                                @endforelse

                                {{  $classes->links() }}
                            </div>
                        </div>
                    </div>
                </form>

        </div>
    </div>
@endsection

@section('image-footer')        
    <img src="{{ asset('user/image/logo3.png') }}" class="img-fluid" alt=""/>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/filter.js') }}"></script>
@endsection