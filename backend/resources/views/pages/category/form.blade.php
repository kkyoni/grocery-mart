<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Name</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('name',null,['class' => 'form-control','id'    => 'name']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('name') ? "".$errors->first('name')."" : '' }} </font>
        </span>
    </div>
</div>
@section('styles')
@endsection
@section('scripts')
@endsection