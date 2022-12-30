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
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt>Status:</dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1">
                                            @if($user_detail->status == 'active')
                                            <span class="label label-primary">{{$user_detail->status}}</span>
                                            @else
                                            <span class="label label-danger">{{$user_detail->status}}</span>
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt>Created by:</dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1">Admin</dd>
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt>Messages:</dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1"> {{$messages_count}}</dd>
                                    </div>
                                </dl>

                            </div>
                            <div class="col-lg-6" id="cluster_info">

                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt>Last Updated:</dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1">{{$user_detail->updated_at}}</dd>
                                    </div>
                                </dl>

                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt>Client Name:</dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1"><a href="#" class="text-navy">
                                            {{$user_detail->first_name}} {{$user_detail->last_name}}</a>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="row mb-0">
                                    <div class="col-sm-2 text-sm-right">
                                        <dt>Completed:</dt>
                                    </div>
                                    <div class="col-sm-10 text-sm-left">
                                        <dd>
                                            <div class="progress m-b-1">
                                                <div style="width: 40%;"
                                                    class="progress-bar progress-bar-striped progress-bar-animated">
                                                </div>
                                            </div>
                                            <small>Project completed in
                                                <strong>60%</strong>. Remaining close
                                                the project, sign a contract and
                                                invoice.</small>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li><a class="nav-link active" href="#tab-1" data-toggle="tab">Users
                                                        messages</a></li>
                                                <li><a class="nav-link" href="#tab-2" data-toggle="tab">Last
                                                        activity</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <div class="feed-activity-list">
                                                    <div class="feed-element">
                                                        <a href="#" class="float-left">
                                                            <img alt="image" class="rounded-circle"
                                                                src="http://127.0.0.1:8000/storage/avatar/bharat.jpg">
                                                        </a>

                                                        <div class="media-body ">
                                                            <small class="float-right">2h
                                                                ago</small>
                                                            <strong>Mark
                                                                Johnson</strong> posted
                                                            message on <strong>Monica
                                                                Smith</strong> site.
                                                            <br>
                                                            <small class="text-muted">Today
                                                                2:10 pm -
                                                                12.06.2014</small>
                                                            <div class="well">
                                                                Lorem Ipsum is simply
                                                                dummy text of the
                                                                printing and typesetting
                                                                industry. Lorem Ipsum
                                                                has been the industry's
                                                                standard dummy text ever
                                                                since the 1500s.
                                                                Over the years,
                                                                sometimes by accident,
                                                                sometimes on purpose
                                                                (injected humour and the
                                                                like).
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="feed-element">
                                                        <a href="#" class="float-left">
                                                            <img alt="image" class="rounded-circle"
                                                                src="http://127.0.0.1:8000/storage/avatar/sagar.jpg">
                                                        </a>

                                                        <div class="media-body ">
                                                            <small class="float-right text-navy">5h
                                                                ago</small>
                                                            <strong>Chris Johnatan
                                                                Overtunk</strong>
                                                            started following
                                                            <strong>Monica
                                                                Smith</strong>. <br>
                                                            <small class="text-muted">Yesterday
                                                                1:21 pm -
                                                                11.06.2014</small>
                                                            <div class="actions">
                                                                <a href="" class="btn btn-xs btn-white"><i
                                                                        class="fa fa-thumbs-up"></i>
                                                                    Like </a>
                                                                <a href="" class="btn btn-xs btn-white"><i
                                                                        class="fa fa-heart"></i>
                                                                    Love</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab-2">

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Title</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Comments</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i
                                                                        class="fa fa-check"></i>
                                                                    Completed</span>
                                                            </td>
                                                            <td>
                                                                Create project in webapp
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Lorem Ipsum is that
                                                                    it has a
                                                                    more-or-less normal
                                                                    distribution of
                                                                    letters, as opposed
                                                                    to using 'Content
                                                                    here, content here',
                                                                    making it look like
                                                                    readable.
                                                                </p>
                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

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
@endsection
@section('scripts')
@endsection
