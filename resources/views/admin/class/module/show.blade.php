@extends('layouts.admin')
@section('title', 'Kelas - Preview Modul')

@section('page-title', 'Preview Modul')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.class.index')}}">Kelas</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.class.module.index', $id)}}">Module</a></li>
<li class="breadcrumb-item text-muted active">Preview Module</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
            onclick="document.location.href='{{route('admin.class.module.index', $id)}}'">
        <i class="ti-arrow-left"></i> Kembali
    </button>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                Kelas: {{$module->class->name}} <br>
                judul: {{$module->title}} <br>
                <hr>
                {!! $module->content !!}
            </div>
        </div>
    </div>
</div>
@endsection