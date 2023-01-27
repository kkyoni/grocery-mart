@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-12">
            <h2><i class="fa fa-home"></i> Dashboard</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Home</strong></span>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-users_count">
                                                    <i class="fa fa-users fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-users_count white media-body">
                                                    <h3>Users</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalUser }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.user.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-blog_count bg-darken-2">
                                                    <i class="fa fa-hourglass fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-blog_count white media-body">
                                                    <h3>Blog</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalBlog }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.blog.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-cms_count bg-darken-2">
                                                    <i class="fa fa-clock-o fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-cms_count white media-body">
                                                    <h3>CMS</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalCms }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.cms.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-faq_count bg-darken-2">
                                                    <i class="fa fa-check fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-faq_count white media-body">
                                                    <h3>FAQ</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalFaq }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.faq.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-brand_count bg-darken-2">
                                                    <i class="fa fa-ban fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-brand_count white media-body">
                                                    <h3>Brand</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalBrand }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.brand.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-category_count bg-darken-2">
                                                    <i class="fa fa-money fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-category_count white media-body">
                                                    <h3>Category</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalCategories }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.categories.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-product_count bg-darken-2">
                                                    <i class="fa fa-money fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-product_count white media-body">
                                                    <h3>Product</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalProduct }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.product.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-promocode_count bg-darken-2">
                                                    <i class="fa fa-money fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-promocode_count white media-body">
                                                    <h3>PromoCode</h3>
                                                    <h5 class="text-bold-400 mb-0">{{ $TotalPromo }}</h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="{{ route('admin.promo.index') }}">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6 col-12">
                        <div class="ibox">
                            <div class="ibox-content no-padding">
                                <div id="dynamic_data"></div>
                                <div id="dashboard_div" style="margin: 2em; " style="width:250px;height:250px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div id="control3" align="center"></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="chart2" align="center"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Messages</h5>
                            </div>
                            <div class="ibox-content ibox-heading" style="">
                                <h3><i class="fa fa-envelope-o"></i> New messages</h3>
                                <small><i class="fa fa-tim"></i> You have 22 new messages and 16 waiting in draft
                                    folder.</small>
                            </div>
                            <div class="ibox-content" style="">
                                <div class="feed-activity-list">
                                    @if (sizeof($TotalConatct) > 0)
                                        @foreach ($TotalConatct as $conatct)
                                            <div class="feed-element">
                                                <div>
                                                    <small
                                                        class="float-right text-navy">{{ \Carbon\Carbon::parse($conatct->created_at)->diffForHumans() }}</small>
                                                    <strong>{{ $conatct->first_name }} {{ $conatct->last_name }}</strong>
                                                    <div>{{ $conatct->message }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div style="text-align: center">
                                            <div>Record Not Found...</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Order cron list</h5>
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>User</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (sizeof($Ordercronlist) > 0)
                                                    @foreach ($Ordercronlist as $cronelist)
                                                        <tr>
                                                            <td>
                                                                <span
                                                                    class="label label-<?php if ($cronelist->status == 'processing') {
                                                                        echo 'warning';
                                                                    } elseif ($cronelist->status == 'accepted') {
                                                                        echo 'success';
                                                                    } elseif ($cronelist->status == 'ontheway') {
                                                                        echo 'primary';
                                                                    } elseif ($cronelist->status == 'delivered') {
                                                                        echo 'info';
                                                                    } else {
                                                                        echo 'danger';
                                                                    } ?>">{{ $cronelist->status }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                @if (!empty($cronelist->date))
                                                                    <i class="fa fa-clock-o"></i>
                                                                    {{ $cronelist->date }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            <td>{{ $cronelist->user_details->first_name }}</td>
                                                            <td class="text-navy">
                                                                @if ($cronelist->status == 'processing')
                                                                    <i class="fa fa-level-up"></i> 25%
                                                                @elseif ($cronelist->status == 'accepted')
                                                                    <i class="fa fa-level-up"></i> 50%
                                                                @elseif ($cronelist->status == 'ontheway')
                                                                    <i class="fa fa-level-up"></i> 75%
                                                                @elseif ($cronelist->status == 'delivered')
                                                                    <i class="fa fa-level-up"></i> 100%
                                                                @else
                                                                    <span style="color:#ed5565"><i
                                                                            class="fa fa-level-down"></i> 0%</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" style="text-align: center">Record Not Found...
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Support list</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <ul class="todo-list m-t small-list">
                                            @if (sizeof($TotalSupport) > 0)
                                                @foreach ($TotalSupport as $support)
                                                    <li>
                                                        @if ($support->flage == 'read')
                                                            <input type="checkbox" class="check-link" checked disabled>
                                                            <span
                                                                class="m-l-xs todo-completed">{{ $support->supportmessage }}</span>
                                                        @else
                                                            <a href="javascript:void(0)" class="chnagesupport"
                                                                data-id={{ $support->id }}>
                                                                <i class="fa fa-square-o"></i>
                                                            </a>
                                                            <span class="m-l-xs">{{ $support->supportmessage }}</span>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <span class="m-l-xs">Record Not Found...</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style type="text/css">
        .wrapper-content {
            padding: 20px 10px 40px;
        }

        .white {
            color: #FFF;
        }

        .white:hover {
            color: #FFF;
        }

        .bg-users_count {
            background-color: #FF5733 !important;
        }

        .bg-gradient-x-users_count {
            background-image: linear-gradient(to right, #FF5733 0%, #ed836b 100%);
            background-repeat: repeat-x;
        }

        .bg-blog_count {
            background-color: #d8db21 !important;
        }

        .bg-gradient-x-blog_count {
            background-image: linear-gradient(to right, #d8db21 0%, #edeb6b 100%);
            background-repeat: repeat-x;
        }

        .bg-cms_count {
            background-color: #10C888 !important;
        }

        .bg-gradient-x-cms_count {
            background-image: linear-gradient(to right, #10C888 0%, #5CE0B8 100%);
            background-repeat: repeat-x;
        }

        .bg-faq_count {
            background-color: #4b5ff1 !important;
        }

        .bg-gradient-x-faq_count {
            background-image: linear-gradient(to right, #4b5ff1 0%, #6CDDEB 100%);
            background-repeat: repeat-x;
        }

        .bg-brand_count {
            background-color: #fcbe03 !important;
        }

        .bg-gradient-x-brand_count {
            background-image: linear-gradient(to right, #fcbe03 0%, #fdd868 100%);
            background-repeat: repeat-x;
        }

        .bg-category_count {
            background-color: #8803fc !important;
        }

        .bg-gradient-x-category_count {
            background-image: linear-gradient(to right, #8803fc 0%, #cf9afe 100%);
            background-repeat: repeat-x;
        }

        .bg-product_count {
            background-color: #fc7703 !important;
        }

        .bg-gradient-x-product_count {
            background-image: linear-gradient(to right, #fc7703 0%, #FF976A 100%);
            background-repeat: repeat-x;
        }

        .bg-promocode_count {
            background-color: #FF6275 !important;
        }

        .bg-gradient-x-promocode_count {
            background-image: linear-gradient(to right, #FF6275 0%, #FF9EAC 100%);
            background-repeat: repeat-x;
        }

        .card {
            color: #FFF !important;
            font-weight: 600 !important;
            font-size: 1.14rem !important;
        }

        .p-2 {
            padding: 1rem !important;
        }

        #dynamic_data {
            margin: 2em auto;
        }

        .fa-3x {
            font-size: 2em;
        }

        .mb-10 {
            margin-bottom: 10px
        }

        #container_chart {
            margin: 0 auto;
        }

        .gm-style-iw-d {
            overflow: hidden !important;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script type="text/javascript">
        $(document).on("click", "a.chnagesupport", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You want's to update this record status ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e69a2a",
                confirmButtonText: "Yes, updated it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('admin.change_support', 'replaceid') }}",
                        type: 'post',
                        data: {
                            "_method": 'post',
                            'id': id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(msg) {
                            if (msg.status == 'success') {
                                swal({
                                        title: "Status",
                                        text: "Status Record success",
                                        type: "success"
                                    },
                                    function() {
                                        location.reload();
                                    });
                            } else {
                                swal("Warning!", msg.message, "warning");
                            }
                        },
                        error: function() {
                            swal("Error!", 'Error in updated Record', "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Your Support Status is safe :)", "error");
                }
            });
            return false;
        })

        Highcharts.chart('dynamic_data', {
            chart: {
                type: 'variablepie',
                backgroundColor: null
            },
            title: {
                text: ''
            },
            exporting: {
                enabled: false
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name} : {point.y}</b><br/>'
            },
            series: [{
                minPointSize: 80,
                innerSize: '40%',
                zMin: 0,
                name: '{{ Settings::get('application_title') }}',
                data: [{
                    name: 'Users',
                    y: {{ $TotalUser }},
                    color: '#FF5733',
                }, {
                    name: 'Blog',
                    y: {{ $TotalBlog }},
                    color: '#d8db21',
                }, {
                    name: 'CMS',
                    y: {{ $TotalCms }},
                    color: '#10C888',
                }, {
                    name: 'FAQ',
                    y: {{ $TotalFaq }},
                    color: '#4b5ff1',
                }, {
                    name: 'Brand',
                    y: {{ $TotalBrand }},
                    color: '#fcbe03',
                }, {
                    name: 'Category',
                    y: {{ $TotalCategories }},
                    color: '#8803fc',
                }, {
                    name: 'Product',
                    y: {{ $TotalProduct }},
                    color: '#fc7703',
                }, {
                    name: 'Promo Code',
                    y: {{ $TotalPromo }},
                    color: '#FF6275',
                }, ]
            }]
        });
    </script>
@endsection
