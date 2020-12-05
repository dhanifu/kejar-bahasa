@extends('layouts.admin')
@section('title', 'Report')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('page-title', 'Report Transaction')

@section('breadcrumb')
<li class="breadcrumb-item text-muted active">Report</li>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show wow slideInDown" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif (session('error'))
<div class="alert alert-danger alert-dismissible fade show wow slideInDown" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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

                <form action="{{ route('admin.report.index') }}" method="GET">
                    <div class="input-group mb-3 col-md-6 float-right">
                        <input type="text" id="created_at" name="date" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Filter</button>
                        </div>
                        <a target="_blank" class="btn btn-primary ml-2 text-white {{ count($purchaseds)==0?'disabled':'' }}" id="exportpdf">Export PDF</a>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Pelanggan</th>
                                <th>Harga</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchaseds as $p)
                                <tr>
                                    <td>{{ $p->class->name }}</td>
                                    <td>{{ $p->user->name }}</td>
                                    <td>Rp {{ number_format($p->class->price) }}</td>
                                    <td>{{ $p->class->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            let start = moment().startOf('month');
            let end = moment().endOf('month');
            let det = start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD');

            $('#exportpdf').attr('href', `/admin/reports/pdf/${det}`);

            $('#created_at').daterangepicker({
                startDate: start,
                endDate: end
            }, function(first,last){
                let dut = first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD');
                $('#exportpdf').attr('href', `/admin/reports/pdf/${dut}`);
            });
        });
    </script>
@endsection