<div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
    <label class="control-label col-md-2" for="value">VALUE <sup class="text-danger">*</sup></label>
    <div class="col-md-10">
        <input class="form-control" name="value" id="value" type="text" placeholder="VALUE" value="{{ old('value',$setting->value) }}"/>
        <span class="help-block">the value that assigned to this setting</span>
    </div>
</div>