@extends('layouts.admin')

@section('title', 'Dashboard - My Class')

@section('page-title', 'My Class')

@section('breadcrumb')
<li class="breadcrumb-item text-muted active">MyClass</li>
@endsection

@section('content')
<div class="row">
    @forelse($purchaseds as $purchased)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card mb-3 shadow">
            <img src="{{asset('images/class/'.$purchased->class->picture)}}" class="card-img-top" alt="{{$purchased->class->name}}">
            <div class="card-body">
                <div class="card-title">
                    <h4>{{$purchased->class->name}}</h4>
                </div>
                <p>{{ substr($purchased->class->name, 0, 45) }} ...</p>
            </div>
            <div class="card-footer text-right">
                <a href="javascript:void(0)" class="btn btn-primary">Pelajari</a>
            </div>
        </div>
    </div>
    @empty
    <div class="card">
        <div class="card-body collapse show">
            <p class="card-text">You dont have Class <a href="{{route('user.class.index')}}">Buy Class Now</a></p>
        </div>
    </div>
    @endforelse
</div>
@endsection
