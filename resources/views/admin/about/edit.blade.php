@extends('layouts.admin')
@section('title', 'Edit About')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('page-title', 'Edit About Us')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.about.index')}}">About</a></li>
    <li class="breadcrumb-item text-muted active">Edit About</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
            onclick="back()">
        <i class="ti-arrow-left"></i> Kembali
    </button>
@endsection

@section('content')
<div class="row">
    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-6">
                        <img id="imagePreview" src="{{asset('images/about/'.$about->banner)}}"
                                style="object-fit: cover; max-height: 300px; margin-bottom: 10px;">
                    </div>
                    <div class="col-6 media-body">
                    <input type="file" name="banner" id="banner" class="form-control-file @error('banner') is-invalid @enderror">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        <p class="text-danger">{{ $errors->first('banner') }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p class="text-danger">{{$errors->first('about')}}</p>
                                    <textarea name="about" id="about" class="form-control @error('about') is-invalid @enderror" 
                                            placeholder="about...">{{$about->about}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <center>
                                    <button class="btn btn-primary mt-4">Save</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{asset('admin/assets/libs/ckeditor/ckeditor.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        CKEDITOR.replace('about');

        function back(){
            swal({
                title: "Apakah anda yakin?",
                text: "Jika kembali, perubahan saat ini tidak akan disimpan",
                icon: "warning",
                buttons: true,
            }).then((willBack)=>{
                if (willBack) {
                    return document.location.href="{{route('admin.about.index')}}"
                }
            });
        }

    const inputGambar = document.getElementById('banner');
    const tampilGambar = document.getElementById('imagePreview');


    function menerapkanGambar(){
        let reader = new FileReader();
        reader.onload = e => {
            tampilGambar.src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    }

    inputGambar.addEventListener('change', menerapkanGambar);
    </script>
@endsection

