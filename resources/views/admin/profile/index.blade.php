@extends('layouts.admin')
@section('title', 'Lihat Profile')

@section('page-title', 'Profile Kamu')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" />
<style>
    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

</style>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item text-muted active">Lihat Profile</li>
@endsection

@section('button')
<button class="btn btn-primary btn-sm float-right shadow" onclick="document.location.href='{{route('admin.home')}}'">
    <i class="ti-arrow-left"></i> Kembali
</button>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show wow slideInDown" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card overflow-hidden">
    <div class="card-body">
    <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pr-3">
            <div class="list-group list-group-flush account-settings-links">
                <a class="list-group-item list-group-item-action active" data-toggle="list"
                    href="#account-general">General</a>
                <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="#account-change-password">Change password</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">

                <div class="tab-pane fade active show" id="account-general">
                    
                    <div class="card-body media align-items-center">
                        @if (!empty(Auth::user()->picture))
                        <div id="tempat-gambar">
                            <img id="image_preview" src="{{asset('images/profile/'.Auth::user()->picture)}}"
                            alt="{{Auth::user()->name}}" class="rounded-circle"
                            style="object-fit: cover; max-height: 100px;">
                        </div>
                        @else
                        <img id="picture-null" src="{{asset('admin/assets/images/users/d3.jpg')}}"
                            class="rounded-circle" style="object-fit: cover; max-height: 100px;">
                        <div id="tempat-gambar"></div>
                        @endif
                        <div class="media-body ml-4">
                                <button type="button" class="btn btn-outline-info"
                                    data-toggle="modal" data-target="#modalImage">Upload new photo</button>
                        </div>
                    </div>

                    <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control mb-1" name="email" value="{{Auth::user()->email}}"
                                    readonly>
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary">Save changes</button>&nbsp; 
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="account-change-password">
                <form id="form" action="{{ route('admin.profile.changePassword') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                    <div class="card-body pb-2">
                        <div class="form-group">
                            <label class="form-label">Current password</label>
                            <input type="password" name="password" id="currentpass" class="form-control @error('password') is-invalid @enderror">
                            <small>{{$errors->first('password')}}</small>
                        </div>
                        <div class="form-group">
                            <label class="form-label">New password</label> 
                            <input type="password" name="new-password" id="password"class="form-control @error('new-password') is-invalid @enderror'">
                            <small>{{$errors->first('new-password')}}</small>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Repeat new password</label>
                            <input type="password" name="new-password-confirmation" id="password2" class="form-control @error('new-password-confirmation') is-invalid @enderror">
                            <small>{{$errors->first('new-password-confirmation')}}</small>
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp; 
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- MODAL CHANGE IMAGE --}}
<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalImageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImageTitle">Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="upload-demo"></div>
                <div style="padding: 3%; margin-top: -15px">
                    <strong>Select image to crop:</strong>
                    <input type="file" id="image">
                    <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js" integrity="sha512-vUJTqeDCu0MKkOhuI83/MEX5HSNPW+Lw46BA775bAWIp1Zwgz3qggia/t2EnSGB9GoS2Ln6npDmbJTdNhHy1Yw==" crossorigin="anonymous"></script>
<script>
    // const inputGambar = document.getElementById('image');
    // const tampilGambar = document.getElementById('image_preview');


    // function menerapkanGambar(){
        
    //     let reader = new FileReader();
    //     reader.onload = e => {
    //         tampilGambar.src = e.target.result;
    //     }
    //     reader.readAsDataURL(this.files[0]);
    // }

    // inputGambar.addEventListener('change', menerapkanGambar);

    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: { 
            width: 300,
            height: 300
        },
        boundary: {
            width: 350,
            height: 350
        }
    });

    $('#image').on('change', function () { 
        var reader = new FileReader();
        reader.onload = function (e) {
            resize.croppie('bind',{
                url: e.target.result
            }).then(function(){
                console.log('berhasil memasukan gambar');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-image').on('click', function (ev) {
        resize.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('admin.profile.change-image')}}",
                type: "POST",
                data: {image:img,_token:token},
                dataType: 'json',
                success: function (data, response) {
                    console.log('gambar profile berhasil diubah');
                    $('#picture-null').hide();
                    $('#modalImage').modal('hide');
                    html = `<img id="image_preview" src="${img}" class="rounded-circle"
                            style="object-fit: cover; max-height: 100px;">`;
                    $("#tempat-gambar").html(html);
                    $('#user-image').attr('src', img);
                }
            });
        });
    });

</script>
@endsection
