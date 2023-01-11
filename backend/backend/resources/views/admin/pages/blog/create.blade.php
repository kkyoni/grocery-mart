@extends('admin.layouts.app')
@section('title')
Blog Management - Create
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading mb-5">
	<div class="col-lg-12">
		<h2><i class="fa fa-rss" aria-hidden="true"></i> Add Blog From Management</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.dashboard') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('admin.blog.index') }}">Blog Table</a>
			</li>
			<li class="breadcrumb-item active">
				<span class="label label-success float-right all_backgroud"><strong>Add Blog Form</strong></span>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					{!! Form::open(['route'	=> ['admin.blog.store'],'id' => 'CreateForm','files' => 'true'])!!}
					@include('admin.pages.blog.form')
					<div class="hr-line-dashed"></div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<button class="btn btn-w-m btn btn-primary" type="submit">Save</button>
								<a href="{{route('admin.blog.index')}}"><button class="btn btn-w-m btn btn-danger" type="button">Cancel</button></a>
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
