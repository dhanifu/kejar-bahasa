@extends('layouts.admin')
@section('title', 'Show About')

@section('page-title', 'Show About Us')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.about.index')}}">About</a></li>
    <li class="breadcrumb-item text-muted active">Show About</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
    onclick="document.location.href='{{route('admin.about.index')}}'">
        <i class="ti-arrow-left"></i> Kembali
    </button>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img id="imagePreview" src="{{asset('images/about/'.$about->banner)}}"
                                style="object-fit: cover; max-height: 300px; margin-bottom: 10px;">
                    </div>
                    <div class="col-lg-6">
                        {{$about->about}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

