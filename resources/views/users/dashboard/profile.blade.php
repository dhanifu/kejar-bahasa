@extends('layouts.admin')
@section('title', 'Lihat Profile')

@section('page-title', 'Profile Kamu')
@section('css')
<style>
    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

</style>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item text-muted active">Lihat Profile</li>
@endsection

@section('button')
<button class="btn btn-primary btn-sm float-right shadow" onclick="document.location.href='{{route('user.home')}}'">
    <i class="ti-arrow-left"></i> Kembali
</button>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show wow slideInDown" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card overflow-hidden">
    <div class="card-body">
    <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pr-3">
            <div class="list-group list-group-flush account-settings-links">
                <a class="list-group-item list-group-item-action active" data-toggle="list"
                    href="#account-general">General</a>
                <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="#account-change-password">Change password</a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social
                    links</a>
                <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="#account-connections">Connections</a>
                <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="#account-notifications">Notifications</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">

                <div class="tab-pane fade active show" id="account-general">
                    <form action="{{ route('user.dashboard.profile.update', Auth::user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body media align-items-center">
                            @if (Auth::user()->picture)
                            <img id="image_preview" src="{{asset('images/profile/'.Auth::user()->picture)}}"
                                alt="{{Auth::user()->name}}" class="rounded-circle"
                                style="object-fit: cover; max-height: 100px;">
                            @else
                            <img id="image_preview" src="{{asset('admin/assets/images/users/d3.jpg')}}"
                                alt="{{Auth::user()->name}}" class="rounded-circle"
                                style="object-fit: cover; max-height: 100px;">
                            @endif
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-info"> Upload new photo
                                    <input type="file" id="image" class="account-settings-fileinput" name="picture">
                                </label>&nbsp;
                                <div class="text-light small mt-1">Allowed JPG, JPEG, PNG</div>
                                <p class="text-danger">{{ $errors->first('picture') }}</p>
                            </div>

                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control mb-1" name="email" value="{{Auth::user()->email}}"
                                    readonly>
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary">Save changes</button>&nbsp; 
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="account-change-password">
                <form id="form" action="{{ route('user.dashboard.profile.changePassword') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                    <div class="card-body pb-2">
                        <div class="form-group">
                            <label class="form-label">Current password</label>
                            <input type="password" name="password" id="currentpass" class="form-control @error('password') is-invalid @enderror">
                            <small>{{$errors->first('password')}}</small>
                        </div>
                        <div class="form-group">
                            <label class="form-label">New password</label> 
                            <input type="password" name="new-password" id="password"class="form-control @error('new-password') is-invalid @enderror'">
                            <small>{{$errors->first('new-password')}}</small>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Repeat new password</label>
                            <input type="password" name="new-password-confirmation" id="password2" class="form-control @error('new-password-confirmation') is-invalid @enderror">
                            <small>{{$errors->first('new-password-confirmation')}}</small>
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp; 
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection

@section('js')
<script>
    const inputGambar = document.getElementById('image');
    const tampilGambar = document.getElementById('image_preview');


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
