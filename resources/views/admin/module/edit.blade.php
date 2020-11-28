@extends('layouts.admin')
@section('title', 'Edit Modul')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('page-title', 'Edit Modul')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.module.index')}}">Modul</a></li>
    <li class="breadcrumb-item text-muted active">Edit Modul</li>
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
                <h4 class="card-title">List</h4>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('admin.module.update', $module->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class_id">Kelas</label>
                                    <select name="class_id" id="class_id" style="width: 100%"
                                        class="custom-select @error('class_id') is-invalid @enderror">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($categories as $category)
                                            <optgroup label="{{$category->name}}">
                                                @foreach ($category->class as $class)
                                                    <option value="{{$class->id}}" {{$module->class_id == $class->id ? 'selected' : ''}}>
                                                        {{$class->name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{$errors->first('class_id')}}</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                                            placeholder="Judul" value="{{$module->title}}">
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="content">Konten</label>
                                    <p class="text-danger">{{$errors->first('content')}}</p>
                                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" 
                                            placeholder="Konten...">{{$module->content}}</textarea>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $('#class_id').select2();
        CKEDITOR.replace('content');

        function back(){
            swal({
                title: "Apakah anda yakin?",
                text: "Jika kembali, perubahan saat ini tidak akan disimpan",
                icon: "warning",
                buttons: true,
            }).then((willBack)=>{
                if (willBack) {
                    return document.location.href="{{route('admin.module.index')}}"
                }
            });
        }
    </script>
@endsection