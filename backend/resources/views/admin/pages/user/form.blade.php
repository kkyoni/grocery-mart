<div class="form-group row {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>First Name</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('first_name',null,['class' => 'form-control','id' => 'first_name','placeholder'=>'Enter First Name','autocomplete' => 'off']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('first_name') ? "".$errors->first('first_name')."" : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Last Name</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('last_name',null,['class' => 'form-control','id' => 'last_name','placeholder'=>'Enter Last Name','autocomplete' => 'off']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('last_name') ? "".$errors->first('last_name')."" : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Email</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::email('email',null,['class' => 'form-control','id' => 'email','placeholder'=>'Enter Email','autocomplete' => 'off']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('email') ? "".$errors->first('email')."" : '' }} </font>
        </span>
    </div>
</div>
@if(empty($user->password))
<div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Password</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::password('password',['class' => 'form-control','id' => 'password','placeholder' => 'Enter Password','autocomplete' => 'off']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('password') ? "".$errors->first('password')."" : '' }} </font>
        </span>
    </div>
</div>
<div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Confirm Password</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        <input type="password"  name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
        <span class="help-block">
            <font color="red"> {{ $errors->has('password_confirmation') ? "".$errors->first('password_confirmation')."" : '' }} </font>
        </span>
    </div>
</div>
@endif

<div class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Status</strong>
    </label>
    <div class="col-sm-6 inline-block">
        <div class="col-sm-6 inline-block">
            <div class="i-checks">
                <label>{{ Form::radio('status', 'active' ,true,['id'=> 'active']) }} <i></i> Active</label>
                <label>{{ Form::radio('status', 'inactive' ,false,['id' => 'inactive']) }}<i></i> InActive</label>
            </div>
        </div>
        <span class="help-block">
            <font color="red">  {{ $errors->has('status') ? "".$errors->first('status')."" : '' }} </font>
        </span>
    </div>
</div>
@section('styles')
<link href="{{ asset('assets/admin/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" >
<link href="{{ asset('assets/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{ asset('assets/admin/js/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});
</script>
@endsection
