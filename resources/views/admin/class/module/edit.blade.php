@extends('layouts.admin')
@section('title', 'Kelas - Edit Module')

@section('page-title', 'Edit Module ')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.class.index')}}">Kelas</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.class.module.index', $id)}}">Module</a></li>
    <li class="breadcrumb-item text-muted active">Edit Module</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
            onclick="back()">
        <i class="ti-arrow-left"></i> Kembali
    </button>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                Kelas: <strong>{{$kelas->name}}</strong> <br><hr>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('admin.class.module.update', [$id, $module->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                                            placeholder="Judul" value="{{ $module->title }}">
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="content">Konten</label>
                                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" 
                                            placeholder="Konten...">{{ $module->content }}</textarea>
                                    <p class="text-danger">{{$errors->first('content')}}</p>
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('admin/assets/libs/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('admin.class.module.upload-image',['id' => $id, '_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });

        function back(){
            swal({
                title: "Apakah anda yakin?",
                text: "Jika kembali, perubahan saat ini tidak akan disimpan",
                icon: "warning",
                buttons: true,
            }).then((willBack)=>{
                if (willBack) {
                    return document.location.href="{{route('admin.class.module.index',$id)}}"
                }
            });
        }
    </script>
@endsection