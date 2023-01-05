<div class="form-group row {{ $errors->has('brand_id') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Brand Name</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::select('brand_id', $brand_list, null, [
            'class' => 'form-control',
            'id' => 'brand_id',
            'placeholder' => 'Select Brand Name',
        ]) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('brand_id') ? '' . $errors->first('brand_id') . '' : '' }} </font>
        </span>
    </div>
</div>
<div class="form-group row {{ $errors->has('categories_name') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Categories Name</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('categories_name', null, ['class' => 'form-control', 'id' => 'categories_name']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('categories_name') ? '' . $errors->first('categories_name') . '' : '' }} </font>
        </span>
    </div>
</div>
@section('styles')
@endsection
@section('scripts')
@endsection
