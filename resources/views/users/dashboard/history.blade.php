@extends('layouts.admin')
@section('title', 'Dashboard - History')

@section('page-title', 'History')

@section('breadcrumb')
    <li class="breadcrumb-item text-muted active">History</li>
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($historys as $history)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$history->class->name}}</td>
                                <td>{{$history->class->price}}</td>
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

