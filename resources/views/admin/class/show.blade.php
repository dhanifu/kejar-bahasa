@extends('layouts.admin')
@section('title', 'Lihat Kelas')

@section('page-title', 'Lihat Kelas Ini')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.class.index') }}">Kelas</a></li>
<li class="breadcrumb-item text-muted active">Lihat Kelas</li>
@endsection

@section('button')
<button class="btn btn-primary btn-sm float-right shadow"
    onclick="document.location.href='{{route('admin.class.index')}}'">
    <i class="ti-arrow-left"></i> Kembali
</button>
@endsection

@section('content')

<div class="card text-center">
    <img class="card-img img-fluid" src="{{asset('images/class/'.$classs->picture)}}" alt="Card image"
        style="object-fit: cover; max-height: 300px;">
    
    <div class="card-body">
        <h4 class="card-title">{{$classs->name}}</h4>
        <p class="card-text">{{$classs->description}}</p>
       
    </div>
    <div class="card-footer text-muted">
    Rp. {{$classs->price}}
    </div>
</div>
@endsection
