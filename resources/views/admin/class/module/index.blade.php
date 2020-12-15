@extends('layouts.admin')
@section('title', 'Class - List Module')

@section('page-title', 'List Module dari Kelas '.$kelas->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.class.index') }}">Kelas</a></li>
    <li class="breadcrumb-item text-muted active">Module</li>
@endsection

@section('button')
    <button class="btn btn-primary float-right shadow"
        onclick="document.location.href='{{route('admin.class.index')}}'">
        <i class="ti-arrow-left"></i> Kembali
    </button>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <center><button class="btn btn-success mb-4"
                        onclick="document.location.href='{{ route('admin.class.module.create', $id) }}'">
                    Tambah Modul
                </button></center>
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
                    <h5 class="text-primary">Anda bisa mengubah urutan dengan cara drag rownya</h5>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Modul</th>
                                <th>Tgl ditambahkan</th>
                                <th>Tgl diperbarui</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableModule">
                            @foreach($modules as $module)
                            <tr class="row1" data-id={{$module->id}}>
                                <td style="width: 1px"><i class="fa fa-sort"></i></td>
                                <td>{{$module->title}}</td>
                                <td>{{$module->created_at->format('d M Y')}}</td>
                                <td>{{$module->updated_at->format('d M Y')}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                        onclick="document.location.href='{{route('admin.class.module.show',[$id, $module->id])}}'">
                                            <i class="ti-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm"
                                                onclick="document.location.href='{{route('admin.class.module.edit',[$id, $module->id])}}'">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <form id="data-{{$module->id}}" action="{{route('admin.class.module.destroy', [$id,$module->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{$module->id}})">
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
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $('#dataTable').DataTable();
        
        function confirmDelete(id){
            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan bisa membatalkannya!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    $('#data-' + id).submit();
                }
            });
        }

        $(function() {
            
            $('#tableModule').sortable({
                items: "tr",
                cursor: "move",
                opacity: 0.6,
                update: function(){
                    sendWeightToServer();
                }
            });

            function sendWeightToServer(){
                let weight = [];
                let token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index,element) {
                    weight.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.ajax({
                    type: "POST", 
                    dataType: "json", 
                    url: "{{ route('admin.class.module.sort',$id) }}",
                    data: {
                        weight: weight,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
@endsection