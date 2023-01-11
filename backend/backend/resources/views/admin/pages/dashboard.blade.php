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
    <h1 class="text-center">Comming Soon...</h1>
    {{-- <div class="row">
        <div class="col-xl-3 col-lg-6 col-12 mt-3">
             <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Setting_count bg-darken-2">
                            <i class="fa fa-cog fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Setting_count white media-body">
                            <h3>Setting</h3>
                            <h5 class="text-bold-400 mb-0"> {{$totalSetting}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ url('admin/settings') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
@section('styles')
<style type="text/css">
/* .bg-Setting_count {background-color: #4b5ff1!important;}
.bg-gradient-x-Setting_count {background-image: linear-gradient(to right, #4b5ff1 0%, #6CDDEB 100%); background-repeat: repeat-x;}
h3{font-size: 13px;}
.wrapper-content{padding: 20px 10px 40px;}
.white{color:#FFF;}
.white:hover{color:#FFF;}
.card{color:#FFF!important; font-weight: 600!important; font-size: 1.14rem!important;}
.p-2 {padding: 1rem!important;}
.fa-3x {font-size: 3em;} */
</style>
@endsection
@section('scripts')
@endsection
