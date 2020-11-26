@extends('layouts.admin')
@section('title', 'Kelas')

@section('page-title', 'Kelas')

@section('breadcrumb')
    <li class="breadcrumb-item text-muted active">Kelas</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
            onclick="document.location.href='{{route('admin.class.create')}}'">
        Kelas baru
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
                                <th>Nama Kelas</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Tgl ditambahkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $kelas)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kelas->name}}</td>
                                <td>{{$kelas->category->name}}</td>
                                <td>
                                    @if($kelas->price == 0)
                                    <span class="badge badge-primary">Free</span>
                                    @else
                                    Rp {{number_format($kelas->price)}}
                                    @endif
                                </td>
                                <td>{{$kelas->created_at->format('d M Y')}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            <i class="ti-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm"
                                                onclick="document.location.href='{{route('admin.class.edit',$kelas->id)}}'">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <form id="data-{{$kelas->id}}" action="{{route('admin.class.destroy', $kelas->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{$kelas->id}})">
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
                    swal("Berhasil dihapus!", {
                        icon: "success",
                    });
                    $('#data-' + id).submit();
                }
            });
        }
    </script>
@endsection