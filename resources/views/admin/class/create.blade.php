@extends('layouts.admin')
@section('title', 'Buat Kelas')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/select2@4.0.13/dist/css/select2.css">
@endsection

@section('page-title', 'Kelas Baru')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.class.index') }}">Kelas</a></li>
    <li class="breadcrumb-item text-muted active">Buat Kelas</li>
@endsection

@section('button')
    <button class="btn btn-primary btn-sm float-right shadow"
            onclick="document.location.href='{{route('admin.class.index')}}'">
        <i class="ti-arrow-left"></i> Kembali
    </button>
@endsection

@section('content')
<form action="{{ route('admin.class.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Kelas</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Nama Kelas">
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Harga">
                        <p class="text-danger">{{ $errors->first('price') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Kategori</label><br>
                        <select name="category_id" id="category_id" style="width: 100%"
                                class="custom-select @error('category_id') is-invalid @enderror">
                            <option value="">--- Pilih ---</option>
                            @foreach ($categories as $ct)
                                <option value="{{ $ct->id }}" {{ $ct->id == old('category_id') ? 'selected' : '' }}>
                                    {{ $ct->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('category_id') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="picture">Gambar</label>
                        <input type="file" name="picture" id="picture" class="form-control-file @error('picture') is-invalid @enderror">
                        <p class="text-danger">{{ $errors->first('picture') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                rows="7" placeholder="Text here...">{{old('description')}}</textarea>
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script src="https://unpkg.com/select2@4.0.13/dist/js/select2.js"></script>
    <script>
        $('#category_id').select2();
    </script>
@endsection