<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{Settings::get('application_title')}}  - @yield('title')</title>
@notifyCss
<link rel="icon" href="{{ url(\Settings::get('favicon_logo')) }}" type="{{ url(\Settings::get('favicon_logo')) }}" sizes="16x16">
<link href="{{ asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{ asset('assets/admin/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<style>
.all_backgroud{background-color: #5A8DEE;}
.help-blockk{display: inline-block;margin-top:0px;margin-bottom: 0px;margin-left: 4px;}
.help-block {display: inline-block;margin-top: 5px;margin-bottom: 0px;margin-left: 5px;}
.form-group {margin-bottom: 10px;}
.form-control {font-size: 14px;font-weight: 500;}
#imagePreview{width: 100%;height: 100%;text-align: center;margin: 0 auto;position: relative;}
#hidden{display: none !important;}
#imagePreview img {height: 150px;width: 150px;border: 3px solid rgba(0,0,0,0.4);padding: 3px;}
#imagePreview i{position: absolute;right: -18px;background: rgba(0,0,0,0.5);padding: 5px;border-radius: 50%;width: 30px;height: 30px;color: #fff;font-size: 18px;}
table.dataTable {clear: both;margin-top: 6px !important;margin-bottom: 6px !important;max-width: none !important;border-collapse: separate !important;width: 100% !important;}
.op-btn{margin-right:22px;}
table tfoot{display: none;}
.disabled {pointer-events: none; cursor: default;}
</style>
@yield('styles')
</head>
