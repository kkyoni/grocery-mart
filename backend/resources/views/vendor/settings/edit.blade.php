@extends('layouts.app')
@section('title')
Settings - Edit
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Update Setting</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('settings') }}">Setting Table</a>
            </li>
            <li class="breadcrumb-item active">
                <span class="label label-success float-right all_backgroud"><strong>Edit Setting Form</strong></span>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form method="POST" action="{{ url(config('settings.route').'/'.$setting->id) }}" accept-charset="UTF-8"
                      class="form-horizontal" enctype="multipart/form-data">
                      <div class="col-md-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT"/>
                        @include('settings::shared_input')
                    </div>
                    <div class="col-md-12">
                        @include('settings::types_value.'.strtolower($setting->type))
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12 text-left">
                                  <button class="btn btn-w-m btn btn-primary" type="submit">Save</button>
                                <a href="{{ url(config('settings.route')) }}">
                                 <button class="btn btn-w-m btn btn-danger" type="button">Cancel</button></a>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
@section('styles')
<style type="text/css">
    .btn-info {

        display: none;
    }
  /*  .help-block
    {

        display: none;
    }*/
</style>

@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var editor = document.querySelector('.ck-editor');

        if (editor != undefined) {
            CKEDITOR.replace(editor, {});
            CKEDITOR.instances['value'].on('change', function () {
                CKEDITOR.instances['value'].updateElement()
            });
            CKEDITOR.config.allowedContent = true;
        }

        $('.datepicker').datepicker({
            format: '{{ config('settings.date_format') }}',
            orientation: "bottom auto"
        });

        if ($("#values-table").length > 0) {
            $(document).on('click', '#add-value', function () {
                var index = $('#values-table tr:last').data('index');
                if (isNaN(index)) {
                    index = 0;
                } else {
                    index++;
                }
                $('#values-table tr:last').after('<tr id="tr_' + index + '" data-index="' + index + '"><td>' +
                    '<input name="{{ $setting->code }}[' + index + '][key]" type="text"' +
                    'value="" class="form-control"/></td><td>' +
                    '<input name="{{ $setting->code }}[' + index + '][value]" type="text"' +
                    'value="" class="form-control"/></td>' +
                    '<td><button type="button" class="btn btn-danger remove-value" data-index="' + index + '">'
                    + '<i class="fa fa-remove"></i></button></td>' +
                    '</tr>');
            });

            $(document).on('click', '.remove-value', function () {
                var index = $(this).data('index');
                $("#tr_" + index).remove();
            });
        }
    });
</script>
@endsection
