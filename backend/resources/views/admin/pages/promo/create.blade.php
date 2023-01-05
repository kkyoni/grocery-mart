@extends('admin.layouts.app')
@section('title')
Promo Management - Create
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading mb-5">
	<div class="col-lg-12">
		<h2><i class="fa fa-gift" aria-hidden="true"></i> Add Promo From Management</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.dashboard') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('admin.promo.index') }}">Promo Table</a>
			</li>
			<li class="breadcrumb-item active">
				<span class="label label-success float-right all_backgroud"><strong>Add Promo Form</strong></span>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					{!! Form::open(['route'	=> ['admin.promo.store'],'id' => 'CreateForm','files' => 'true'])!!}
					@include('admin.pages.promo.form')
					<div class="hr-line-dashed"></div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<button class="btn btn-w-m btn btn-primary" type="submit">Save</button>
								<a href="{{route('admin.promo.index')}}"><button class="btn btn-w-m btn btn-danger" type="button">Cancel</button></a>
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
