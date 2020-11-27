@extends('layouts.admin')
@section('title', 'Modul')

@section('page-title', 'Modul')

@section('breadcrumb')
    <li class="breadcrumb-item text-muted active">Modul</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
            onclick="document.location.href='{{route('admin.module.create')}}'">
        Modul baru
    </button>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List</h4>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>Judul</th>
                                <th>Tgl ditambahkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modules as $m)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$m->class->name}}</td>
                                <td>{{$m->title}}</td>
                                <td>{{$m->created_at->format('d M Y')}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            <i class="ti-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <form id="data-{{$m->id}}" action="{{route('admin.module.destroy', $m->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{$m->id}})">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#dataTable').DataTable();

        function confirmDelete(id){
            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan bisa membatalkannya!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $('#data-' + id).submit();
                }
            });
        }
    </script>
@endsection