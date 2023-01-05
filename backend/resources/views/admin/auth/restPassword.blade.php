@extends('admin.layouts.appAuth')
@section('authContent')
<style type="text/css">
.ibox-content{width: 350px;height: 300px;top: 150px;position: absolute;}
.alert{position:absolute;top:80px;left: 16%;}
</style>
<div class="row">
	<div class="col-md-12">
		@if(Session::has('message'))
		<div class="row">
			<div class="col-lg-12">
				<div class=" alert alert-{!! Session::get('alert-type') !!}">
					{!! Session::get('message') !!}
				</div>
			</div>
		</div>
		@endif
		<div class="ibox-content ibox-content_login">
			<center><img src="{{ url(\Settings::get('application_logo')) }}"></center>
			<h2 class="font-bold">Forgot password</h2>
			<div class="row">
				<div class="col-lg-12">
					{{-- <h3>{{Settings::get('application_title')}}</h3> --}}
					<form class="m-t" role="form" method="POST" action="{{ route('admin.sendLinkToUser') }}">
						@csrf
						<div class="form-group">
							<input type="email"  name="email" class="form-control" placeholder="Email address" required="">
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>
					</form>
					<a href="{{route('admin.login')}}">{{ __('Back to login') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('authStyles')
@endsection
@section('authScripts')
@endsection
