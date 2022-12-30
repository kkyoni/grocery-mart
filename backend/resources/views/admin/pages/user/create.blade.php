@extends('admin.layouts.app')
@section('title')
Users Management - Create
@endsection
@section('mainContent')
@if(Session::has('message'))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-{{ Session::has('alert-type') }}">{!! Session::get('message') !!}</div>
	</div>
</div>
@endif
<div class="row wrapper border-bottom white-bg page-heading mb-5">
	<div class="col-lg-12">
		<h2><i class="fa fa-users" aria-hidden="true"></i> Add Users From Management</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.dashboard') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('admin.user.index') }}">Users Table</a>
			</li>
			<li class="breadcrumb-item active">
				<span class="label label-success float-right all_backgroud">Add Users</span>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					{!! Form::open(['route'	=> ['admin.user.store'],'id' => 'userCreateForm','files' => 'true']) !!}
					@include('admin.pages.user.form')
					<div class="hr-line-dashed"></div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<button class="btn btn-primary btn-sm" type="submit">Save</button>
								<a href="{{route('admin.user.index')}}" class="btn btn-danger btn-sm">Cancel</a>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
