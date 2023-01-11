@extends('admin.layouts.appAuth')
@section('authContent')
    @if (Session::has('message'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{!! Session::get('alert-type') !!}">
                    {!! Session::get('message') !!}
                </div>
            </div>
        </div>
    @endif
    {!! Form::open(['route' => 'resetPassword', 'id' => 'loginform', 'class' => 'form-horizontal form-material']) !!}
    <input type="hidden" name="token" value="{{ $passwordReset->token }}">
    <center><img src="{{ url(\Settings::get('application_logo')) }}" style="height: auto;width: 20%;"></center>
    <h3 class="box-title m-b-20 text-center">Reset password</h3>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <div class="col-xs-12">
            {!! Form::email('email', $passwordReset->email !== null ? $passwordReset->email : old('email'), [
                'class' => 'form-control ',
                'placeholder' => 'Email Address',
                'required',
                'autofocus',
            ]) !!}
            <span class="help-block">
                @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
                @endif
            </span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <div class="col-xs-12">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            <span class="help-block">
                @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
                @endif
            </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            {!! Form::password('password_confirmation', [
                'class' => 'form-control',
                'placeholder' => 'Confirm Password',
                'required',
                'id' => 'password-confirm',
            ]) !!}
        </div>
    </div>
    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset
                Password</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
