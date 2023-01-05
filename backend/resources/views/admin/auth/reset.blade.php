@extends('admin.layouts.appAuth')
@section('authContent')
    <style type="text/css">
        .ibox-content {
            width: 350px;
            height: 320px;
            top: 150px;
            position: absolute;
        }
    </style>
    @if (Session::has('message'))
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
        <h2 class="font-bold">Reset password</h2>
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('admin.resetPassword_set') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $passwordReset->token }}">
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            placeholder="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Conform password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Reset Password') }}</button>
                </form>
                <br>
                <a href="{{ route('admin.login') }}">{{ __('Back to login') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('authStyles')
@endsection
@section('authScripts')
@endsection
