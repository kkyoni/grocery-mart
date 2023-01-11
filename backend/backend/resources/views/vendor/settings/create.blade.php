@extends('admin.layouts.app')
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading mb-5">
    <div class="col-sm-4">
        <h2>Create Setting</h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ url(config('settings.route')) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="{{ $type }}"/>
                                @include('settings::shared_input')
                                <div class="form-group">
                                    <div class="col-md-12 text-left">
                                        <a href="{{ url(config('settings.route')) }}" class="btn btn-default">
                                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save & Continue </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection