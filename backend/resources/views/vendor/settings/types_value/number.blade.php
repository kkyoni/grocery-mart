<div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
    <label class="control-label col-md-2" for="value">VALUE <sup class="text-danger">*</sup></label>
    <div class="col-md-10">
        <input class="form-control" name="value" id="value" type="number" placeholder="VALUE" step="{{ config('settings.number_step') }}" value="{{ old('value',$setting->value) }}"/>
        <span class="help-block"> the value that assigned to this setting.<br/>you can change <b>number_step</b> attribute from settings config file.</span>
    </div>
</div>