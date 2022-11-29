@extends('layouts.app')
@section('title')
Admin Profile
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <span class="label label-success float-right all_backgroud"><strong> Profile Update</strong></span>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
            'route' => 'updateProfileDetail',
            'files' => true
            ]) !!}
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Profile update</h5>
                </div>

                <div class="ibox-content" id="imagePreview">
                   @if(!empty(\Auth::user()->avatar))
                   <!-- <i class="fa fa-pencil fa-2x"></i> -->
                   <img src="{!!  \Auth::user()->avatar !== '' ? url("storage/avatar/".\Auth::user()->avatar) : url('storage/default.png') !!}" alt="user-img" class="img-circle">
                   @else
                   <!-- <i class="fa fa-pencil fa-2x"></i> -->
                   <img src="{!! url('storage/avatar/default.png') !!}" name="avatar" alt="user-img" class="img-circle" accept="image/*">
                   @endif
                   <br>
                   <span >
                    <center>    <font color="red"> {{ $errors->has('avatar') ? "".$errors->first('avatar')."" : '' }} </font> </center>
                </span>
            </div>
            {!! Form::file('avatar',['id' => 'hidden','accept'=>'image/*','class'=>'user_profile_pic']) !!}

            <div class="ibox-content profile-content">
                <div class="ibox ">
                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-lg-12 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" placeholder="Name"  value="{{$user->name}}" id="name" name="name" class="form-control" maxlength="30" required>
                            <span class="help-block">
                                <font color="red"> {{ $errors->has('name') ? "".$errors->first('name')."" : '' }} </font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="col-lg-12 col-form-label">Email address <span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" placeholder="Email address"  value="{{$user->email}}" name="email" class="form-control" required>
                            <span class="help-block">
                                <font color="red"> {{ $errors->has('email') ? "".$errors->first('email')."" : '' }} </font>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-w-m btn btn-primary mr-10 mb-30">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-6">
        {!! Form::open([
        'route' => 'updatePassword',
        'files' => true
        ]) !!}

        <div class="ibox">
            <div class="ibox-title">
                <h5>Change Password</h5>
            </div>
            <div class="ibox-content">
                <div class="form-group row {{ $errors->has('old_password') ? 'has-error' : '' }}"><label class="col-lg-4 col-form-label">Current Password <span class="text-danger">*</span></label>

                    <div class="col-lg-8"><input type="password" name="old_password" id="old_password" placeholder="Current Password" class="form-control" value="{{ old('old_password') }}">
                        <span class="help-blockk">
                            <font color="red"> {{ $errors->has('old_password') ? "".$errors->first('old_password')."" : '' }} </font>
                        </span>
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}"><label class="col-lg-4 col-form-label">New Password <span class="text-danger">*</span></label>

                    <div class="col-lg-8"><input type="password" name="password" id="password" placeholder="New Password"  class="form-control">
                        <span class="help-blockk">
                            <font color="red"> {{ $errors->has('password') ? "".$errors->first('password')."" : '' }} </font>
                        </span>
                    </div>

                </div>
                <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}"><label class="col-lg-4 col-form-label">Confirm Password <span class="text-danger">*</span></label>

                    <div class="col-lg-8"><input type="password"  name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
                       <span class="help-blockk">
                        <font color="red"> {{ $errors->has('password_confirmation') ? "".$errors->first('password_confirmation')."" : '' }} </font>
                    </span>

                </div>

            </div>
            <div class="form-group row">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-w-m btn btn-primary mr-10 mb-30">Save</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
<script>
    $(".user_profile_pic").change(function() {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png': case 'jpeg':
            //alert("an image");
            break;
            default:
            $(this).val('');
            // error message here
            alert("not an image");
            break;
        }
    });

    $('#name').on('keyup onmouseout keydown keypress blur change', function (event) {
        var regex = new RegExp("^[a-zA-Z ._\\b]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    
    $('#old_password, #password, #password_confirmation').on('keyup onmouseout keydown keypress blur change', function (e) {
        var key = e.charCode || e.keyCode || 0;

        if(($(this).val().length > 20)){
            $(this).val('');
            return false;
        }
    });
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imagePreview img').on('click',function(){
            $('input[type="file"]').trigger('click');
            $('input[type="file"]').change(function() {
                readURL(this);
            });
        });
</script>
@endsection
