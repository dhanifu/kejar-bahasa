@extends('layouts.admin')

@section('title', 'Dashboard - My Class')

@section('searchBox')
<li class="nav-item d-md-block">
    <form action="{{ route('user.dashboard.myclass') }}">
        <div class="input-group">
            <input type="search" name="search" placeholder="Search" aria-label="Search"
                class="form-control custom-shadow custom-radius border-0 bg-white"
                autocomplete="off" value="{{ request()->q }}">
            <button class="btn bg-white custom-shadow ml-2">
                <i class="form-control-icon" data-feather="search"></i>
            </button>
        </div>
    </form>
</li>
@endsection

@section('page-title', 'My Class')

@section('breadcrumb')
<li class="breadcrumb-item text-muted active">MyClass</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Row -->
        <div class="row">
            @forelse ($purchaseds as $class)
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <center>
                    <img class="img-fluid pt-2" src="{{ asset('images/class/'.$class->picture) }}"
                        alt="Card image cap" width="150px">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">{{ $class->name }}</h4>
                        <p class="card-text">
                            {{ strlen($class->description) > 47 ? substr($class->description, 0, 47) . ' ...' : $class->description }}
                        </p>
                        <a href="{{ route('user.class.module',[$class->code,$class->module[0]['code']]) }}"
                            class="btn btn-primary {{ strlen($class->description)<47?'mt-4':'' }}">Pelajari</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
            @empty
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body collapse show">
                        <p class="card-text">You dont have Class. <a href="{{route('user.class.index')}}">Buy Class Now</a></p>
                    </div>
                </div>
            </div>
            <!-- column -->
            @endforelse
        </div>
        <!-- Row -->
    </div>
</div>
@endsection


@section('js')
    <script src="{{ asset('js/search-myclass.js') }}"></script>
@endsection