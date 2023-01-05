@extends('admin.layouts.app')
@section('title')
Categories Management - Edit
@endsection
@section('mainContent')
@if(Session::has('message'))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-{{ Session::has('alert-type') }}">
			{!! Session::get('message') !!}
		</div>
	</div>
</div>
@endif
<div class="row wrapper border-bottom white-bg page-heading mb-5">
	<div class="col-lg-12">
		<h2><i class="fa fa-list-alt" aria-hidden="true"></i> Edit Categories From Management</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.dashboard') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('admin.categories.index') }}">Categories Table</a>
			</li>
			<li class="breadcrumb-item active">
				<span class="label label-success float-right all_backgroud"><strong>Edit Categories Form</strong></span>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					{!!Form::model($categories,array('method'=>'post','files'=>true,'route'=>array('admin.categories.update',$categories->id)))!!}
					@include('admin.pages.categories.form')
					<div class="hr-line-dashed"></div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<button class="btn btn-w-m btn btn-primary" type="submit">Save changes</button>
								<a href="{{route('admin.categories.index')}}"><button class="btn btn-w-m btn btn-danger" type="button">Cancel</button></a>
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
