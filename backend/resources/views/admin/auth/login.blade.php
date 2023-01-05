@extends('admin.layouts.appAuth')
@section('authContent')
<style type="text/css">
.ibox-content{width: 350px;height: 374px;top: 150px;position: absolute;}
</style>
@if(Session::has('message'))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-{!! Session::get('alert-type') !!}">
			{!! Session::get('message') !!}
		</div>
	</div>
</div>
@endif
<div class="ibox-content ibox-content_login">
	<center><img src="{{ url(\Settings::get('application_logo')) }}"></center>
	<h2 class="font-bold">Admin Login</h2>
	<div class="row">
		<div class="col-lg-12">
			{{-- <h3>Welcome to {{Settings::get('application_title')}}</h3> --}}
			<form method="POST" action="{{ url('admin/login') }}">
				@csrf
				<div class="form-group">
					<input id="exampleInputEmail_2" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php if(isset($_COOKIE['email_cookie'])){ ?> {{$_COOKIE['email_cookie']}} <?php }  ?>" required autocomplete="email" placeholder="Enter Email" autofocus>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<input type="password" class="form-control" value="<?php if(isset($_COOKIE['password_cookie'])){ echo $_COOKIE['password_cookie']; }  ?>" required="" id="exampleInputEmail_3" placeholder="Enter Password" name="password" autocomplete="current-password">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<input class="form-check-input" type="checkbox" id="termscheckd" value="remmeber_me" name="remmeber"   <?php if(isset($_COOKIE['email_cookie'])){ ?> checked <?php }  ?>> &nbsp;
					<label class="form-check-label" for="termscheckd">Remember me</label>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="{{ route('admin.resetPassword') }}"><small>Forgot password?</small></a>
			</form>
		</div>
	</div>
</div>
@endsection
@section('authStyles')
@endsection
@section('authScripts')
@endsection
