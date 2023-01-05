<div class="form-group  row {{ $errors->has('promocodeimages') ? 'has-error' : '' }}">
    <div id="imagePreview" class="profile-image">
        <center>
            @if (!empty($promocode->promocodeimages))
                <img src="{!! @$promocode->promocodeimages !== ''
                    ? url('storage/promocode/' . @$promocode->promocodeimages)
                    : url('storage/promocode/default.png') !!}" alt="promocode-img" class="img-circle">
            @else
                <img src="{!! url('storage/promocode/default.png') !!}" alt="promocode-img" class="img-circle" accept="image/*">
            @endif
        </center>
    </div>
    {!! Form::file('image', ['id' => 'hidden', 'accept' => 'image/*']) !!}
</div>
<div class="form-group row {{ $errors->has('code') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>code</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('code', null, ['class' => 'form-control', 'id' => 'code']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('code') ? '' . $errors->first('code') . '' : '' }} </font>
        </span>
    </div>
</div>
<div class="form-group row {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>User Email</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::select('user_id[]', $user_list, $promo_list, [
            'class' => 'select2_demo_2 form-control',
            'id' => 'user_id',
            'multiple' => 'multiple',
            'data-width' => '100%',
        ]) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('user_id') ? '' . $errors->first('user_id') . '' : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">
        <strong>Date</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        <div class="form-group" id="data_5">
            <div class="input-daterange input-group" id="datepicker">
                {!! Form::text('start_date', null, [
                    'class' => 'form-control-sm form-control',
                    'id' => 'start_date',
                    'autocomplete' => 'off',
                ]) !!}
                <span class="input-group-addon">to</span>
                {!! Form::text('end_date', null, [
                    'class' => 'form-control-sm form-control',
                    'id' => 'end_date',
                    'autocomplete' => 'off',
                ]) !!}
                <span class="help-block">
                    <font color="red"> {{ $errors->has('start_date') ? '' . $errors->first('start_date') . '' : '' }}
                    </font>
                </span>
                <span class="help-block">
                    <font color="red"> {{ $errors->has('end_date') ? '' . $errors->first('end_date') . '' : '' }}
                    </font>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row {{ $errors->has('discount') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Discount</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('discount', null, ['class' => 'form-control', 'id' => 'discount']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('discount') ? '' . $errors->first('discount') . '' : '' }} </font>
        </span>
    </div>
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Description</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control ', 'id' => 'description']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('description') ? '' . $errors->first('description') . '' : '' }}
            </font>
        </span>
    </div>
</div>
<div class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Status</strong>
    </label>
    <div class="col-sm-6 inline-block">
        <div class="col-sm-6 inline-block">
            <div class="i-checks">
                <label>{{ Form::radio('status', 'active', true, ['id' => 'active']) }} <i></i> Active</label>
                <label>{{ Form::radio('status', 'inactive', false, ['id' => 'inactive']) }}<i></i> InActive</label>
            </div>
        </div>
        <span class="help-block">
            <font color="red"> {{ $errors->has('status') ? '' . $errors->first('status') . '' : '' }} </font>
        </span>
    </div>
</div>


@section('styles')
    <link href="{{ asset('assets/admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <style>
        .select2-container .select2-search--inline .select2-search__field {
            width: 140px !important;
        }
    </style>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
        var selectedValuesTest = ["all"];
        $(document).ready(function() {
            $(".select2_demo_2").select2({
                theme: 'bootstrap4',
                placeholder: "Select a User Email",
                dropdownAutoWidth: true,
                allowClear: true
            });
            $('#data_5 .input-daterange').datepicker({
                format: 'yyyy-mm-dd',
                tags: "true",
                allowClear: true,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
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
        $('#imagePreview img').on('click', function() {
            $('input[type="file"]').trigger('click');
            $('input[type="file"]').change(function() {
                readURL(this);
            });
        });
    </script>
@endsection
