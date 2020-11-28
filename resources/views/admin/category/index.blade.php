@extends('layouts.admin')
@section('title', 'Category Class')

@section('page-title', 'Category Class')

@section('breadcrumb')
    <li class="breadcrumb-item text-muted active">Category Class</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
            data-toggle="modal" data-target="#modalTambah">
        Tambah Kategori
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
                                <th>Nama Kategori</th>
                                <th>Tanggal Ditambahkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $ct)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ct->name}}</td>
                                <td>{{$ct->created_at->format('d M Y')}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                                data-toggle="modal" data-target="#modalEdit"
                                                onclick="editData({{$ct->id}})" data-name="{{$ct->name}}">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <form id="data-{{$ct->id}}" action="{{route('admin.category.destroy', $ct->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{$ct->id}})">
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


{{-- MODAL TAMBAH KATEGORI --}}
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="name" class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control"
                                    name="name" value="{{ old('name') }}" placeholder="Nama Kategori">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnAdd" disabled>Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL EDIT --}}
<div class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="edit_name" class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <input id="edit_name" type="text" class="form-control"
                                    name="name" placeholder="Nama Kategori">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnEdit" onclick="editSubmit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('js')
    <script>
        $('#dataTable').DataTable();

        $('#name').keyup(function(){
            if ($(this).val()) {
                $('#btnAdd').attr('disabled', false);
            }else{
                $('#btnAdd').attr('disabled', true);
            }
        });

        

        @if($errors->first('name'))
            $('.modal').modal('show');
        @endif

        $('#modalEdit').on('show.bs.modal', function(e){
            let button = $(e.relatedTarget);
                name = button.data('name');
                modal = $(this);

            modal.find('.modal-body #edit_name').val(name);

            $('#edit_name').keyup(function(){
                if ($(this).val()) {
                    $('#btnEdit').attr('disabled', false);
                }else{
                    $('#btnEdit').attr('disabled', true);
                }
            });
        });

        function editData(category_id){
            let id = category_id;
            let url = '{{ route("admin.category.update",":id") }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#editForm').attr('action', url);
        }
        function editSubmit(){
            $('#editForm').submit();
        }

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
                // else {
                //     swal("Cancelled");
                // }
            });
        }
    </script>
@endsection