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
                    <div class="float-right">
                    @if ($class->price != 0)
                        Harga : <span style="font-weight: bold">Rp {{ number_format($class->price) }}</span>
                    @else
                        Harga : <span class="badge badge-primary" style="font-weight: bold">Free</span>
                    @endif
                    <button class="btn btn-success ml-4" data-toggle="modal" 
                            @if($userLogged==0) onclick="redirectLogin()" @else data-target="#modalBeli" @endif>
                        Checkout
                    </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalBeli" tabindex="-1" role="dialog" aria-labelledby="modalBeliLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalBeliLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.class.beli', $class->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        @if($class->price == 0)
                        <div class="alert alert-success fade show wow slideInDown" role="alert">
                            Ini kelas gratis, langsung klik <span class="btn btn-sm text-white bg-primary" style="cursor: default">Beli</span>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">Class Code</label>
                            <input type="text" name="invoice" class="form-control"
                                value="{{ $class->code }}" disabled>
                        </div>
                        @if($class->price != 0)
                        <div class="form-group">
                            <label for="transfer_to">Transfer Ke</label>
                            <select name="transfer_to" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="BCA - 1234567" {{old('transfer_to')=='BCA - 1234567'?'selected':''}}>
                                    BCA: 1234567 a.n Kejar Bahasa
                                </option>
                                <option value="Mandiri - 2345678" {{old('transfer_to')=='Mandiri - 2345678'?'selected':''}}>
                                    Mandiri: 2345678 a.n Kejar Bahasa
                                </option>
                                <option value="BRI - 9876543" {{old('transfer_to')=='BRI - 9876543'?'selected':''}}>
                                    BRI: 9876543 a.n Kejar Bahasa
                                </option>
                                <option value="BNI - 6789456" {{old('transfer_to')=='BNI - 6789456'?'selected':''}}>
                                    BNI: 6789456 a.n Kejar Bahasa
                                </option>
                            </select>
                            <p class="text-danger">{{ $errors->first('transfer_to') }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" value="{{$class->price}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Jumlah Transfer</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
                                        <p class="text-danger">{{ $errors->first('amount') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label>Transfer Ke</label>
                            <select class="form-control" disabled>
                                <option value="">Pilih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Transfer</label>
                            <input type="number" class="form-control" value="0" disabled>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('image-footer')        
    <img src="{{ asset('user/image/logo3.png') }}" class="img-fluid" alt=""/>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function redirectLogin(){
            let timerInterval
            Swal.fire({
                title: 'Kamu Harus Login!',
                icon: 'warning',
                timer: 1300,
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    document.location.href="{{ route('login') }}"
                }
            });
        }
    </script>
@endsection