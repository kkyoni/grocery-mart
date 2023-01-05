@extends('admin.layouts.app')
@section('title')
    Order Management
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-product-hunt" aria-hidden="true"></i> Order Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Order Table</strong></span>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="start_date">Date added</label>
                        <div class="input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input id="start_date" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="end_date">Date modified</label>
                        <div class="input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input id="end_date" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <span class="input-group-append">
                            <button class="btn btn-primary btn-sm" id="report" style="margin-top: 35px">Filter</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        {{-- Table Start --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary btn-sm pull-right mb-3 op-btn them" href="">
                                <i class="icon-plus fa-fw"></i>Apply Filter</a>
                            <div class="clearfix"></div>
                        </div>
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
    <link href="{{ asset('assets/admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/footable/footable.all.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/admin/datatables/dataTables.bootstrap4.min.js') }}">
    </script>
    {!! $html->scripts() !!}
    <script type="text/javascript">
        $(document).on('click', '#report', function(event) {
            window.LaravelDataTables["dataTableBuilder"].ajax.reload();
        });
        $(document).ready(function() {
            $('#start_date').datepicker({
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('#end_date').datepicker({
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });
    </script>
@endsection
