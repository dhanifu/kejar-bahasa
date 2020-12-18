@extends('layouts.admin')

@section('title', 'Dashboard - My Class')

@section('page-title', 'My Class')

@section('breadcrumb')
    <li class="breadcrumb-item text-muted active">MyClass</li>
@endsection

@section('content')
<div class="row">
    @forelse($purchaseds as $purchased)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{asset('images/class/'.$purchased->class->picture)}}" alt="{{$purchased->class->name}}">
            <div class="card-body">
                <h4 class="card-title">{{$purchased->class->name}}</h4>
                <p class="card-text">{{$purchased->class->description}}</p>
                <a href="javascript:void(0)" class="btn btn-primary">Pelajari</a>
            </div>
        </div>
    </div>
    @empty
    <div class="card">
        <div class="card-body collapse show">
            <p class="card-text">Ypu dont have Class</p>
        </div>
    </div>
    @endforelse
</div>
@endsection
