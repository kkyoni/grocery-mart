@extends('admin.layouts.app')
@section('title')
    Users Activity Log Management
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-users" aria-hidden="true"></i> Users Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud">Users Activity Log</span>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                {!! $html->table(['class' => 'table table-striped table-bordered dt-responsive'], true) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/admin/datatables/dataTables.bootstrap4.min.js') }}">
    </script>
    {!! $html->scripts() !!}
@endsection
