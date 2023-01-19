@extends('admin.layouts.app')
@section('title')
    Settings Management
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-file-text" aria-hidden="true"></i> Settings Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Settings Table</strong></span>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dt-responsive dataTable">
                                    <thead>
                                        <tr role="row">
                                            <th title="Code">Code</th>
                                            <th title="Type">Type</th>
                                            <th title="Label">Label</th>
                                            <th title="Value">Value</th>
                                            <th title="Action">Action</th>
                                        </tr>
                                        <tr role="row">
                                            <form method="get">
                                                <th>
                                                    <input class="form-control" name="search[code]" placeholder="CODE"
                                                        value="{{ $search['code'] }}" />
                                                </th>
                                                <th>
                                                    <select class="form-control" name="search[type]">
                                                        <option value=""
                                                            {{ $search['type'] == '' ? 'disabled selected' : '' }}>
                                                            SELECT TYPE</option>
                                                        @foreach ($types as $key => $type)
                                                            <option value="{{ $key }}"
                                                                {{ $search['type'] == $key ? 'selected' : '' }}>
                                                                {{ $type }}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="search[label]" placeholder="LABEL"
                                                        value="{{ $search['label'] }}" />
                                                </th>
                                                <th>
                                                    <input class="form-control" name="search[value]" placeholder="VALUE"
                                                        value="{{ $search['value'] }}" />
                                                </th>
                                                <th>
                                                    <button type="submit" class="btn btn-primary btn-circle"><i
                                                            class="fa fa-search"></i></button>
                                                    <a href="{{ url(config('settings.route')) }}"
                                                        class="btn btn-warning btn-circle">
                                                        <i class="fa fa-eraser"></i>
                                                    </a>
                                                </th>
                                            </form>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings as $setting)
                                            <tr id="tr_{{ $setting->id }}"
                                                class="{{ $setting->hidden ? 'warning' : '' }}">
                                                <td>{{ $setting->code }}</td>
                                                <td>{{ $setting->type }}</td>
                                                <td>{{ $setting->label }}</td>
                                                <td>{{ str_limit($setting->getOriginal('value'), 50) }}</td>
                                                <td><a href="{{ url(config('settings.route') . '/' . $setting->id . '/edit') }}"
                                                        class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip"
                                                        title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5"><i class="fa fa-info-circle" aria-hidden="true"></i> No
                                                    settings found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="pull-right">{{ $settings->appends(\Request::except('page'))->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function(event, element) {
                    element.trigger('confirm');
                }
            });
            $(document).on('confirm', function(e) {
                var ele = e.target;
                e.preventDefault();
                $.ajax({
                    url: ele.href,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken
                    },
                    success: function(data) {
                        if (data['success']) {
                            $.toast({
                                text: data['success'],
                                position: 'top-right',
                                loaderBg: '#e69a2a',
                                icon: 'success',
                                hideAfter: 3500,
                                stack: 6
                            });
                            $("#" + data['tr']).slideUp("slow");
                        } else if (data['error']) {
                            $.toast({
                                text: data['error'],
                                position: 'top-right',
                                loaderBg: '#e69a2a',
                                icon: 'error',
                                hideAfter: 3500,
                                stack: 6
                            });
                        } else {
                            $.toast({
                                text: "Whoops Something went wrong!!",
                                position: 'top-right',
                                loaderBg: '#e69a2a',
                                icon: 'error',
                                hideAfter: 3500,
                                stack: 6
                            });
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
