<div class="form-group  row {{ $errors->has('brand_image') ? 'has-error' : '' }}">
    <div id="imagePreview" class="profile-image">
        <center>
            @if (!empty($brand->brand_image))
                <img src="{!! @$brand->brand_image !== '' ? url('storage/brand/' . @$brand->brand_image) : url('storage/default.png') !!}" alt="brand-img" class="img-circle">
            @else
                <img src="{!! url('storage/brand/default.png') !!}" alt="brand-img" class="img-circle" accept="image/*">
            @endif
        </center>
    </div>
    {!! Form::file('image', ['id' => 'hidden', 'accept' => 'image/*']) !!}
</div>
<div class="form-group row {{ $errors->has('brand_name') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Brand Name</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('brand_name', null, ['class' => 'form-control', 'id' => 'brand_name']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('brand_name') ? '' . $errors->first('brand_name') . '' : '' }} </font>
        </span>
    </div>
</div>
@section('styles')
@endsection
@section('scripts')
@endsection
