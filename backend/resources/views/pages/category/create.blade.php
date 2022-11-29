@extends('layouts.app')
@section('title')
Category - Create
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<h2>Add Blog</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('home') }}">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('category.index') }}">Category Table</a>
			</li>
			<li class="breadcrumb-item active">
				<span class="label label-success float-right all_backgroud"><strong>Add Category Form</strong></span>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					{!! Form::open(['route'	=> ['category.store'],'id' => 'CreateForm','files' => 'true'])!!}
					@include('pages.category.form')
					<div class="hr-line-dashed"></div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<button class="btn btn-w-m btn btn-primary" type="submit">Save</button>
								<a href="{{route('category.index')}}"><button class="btn btn-w-m btn btn-danger" type="button">Cancel</button></a>
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