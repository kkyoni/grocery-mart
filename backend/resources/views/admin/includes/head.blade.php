<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ Settings::get('application_title') }} - @yield('title')</title>
    <link rel="icon" href="{{ url(\Settings::get('favicon_logo')) }}" type="{{ url(\Settings::get('favicon_logo')) }}"
        sizes="16x16">
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    @notifyCss
    <link href="{{ asset('assets/admin/css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href="{{ asset('assets/admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style type="text/css">
        .all_backgroud {
            background-color: #5A8DEE;
        }

        .help-blockk {
            display: inline-block;
            margin-top: 0px;
            margin-bottom: 0px;
            margin-left: 4px;
        }

        .help-block {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 0px;
            margin-left: 5px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            font-size: 14px;
            font-weight: 500;
        }

        #imagePreview {
            width: 100%;
            height: 100%;
            text-align: center;
            margin: 0 auto;
            position: relative;
        }

        #hidden {
            display: none !important;
        }

        #imagePreview img {
            height: 150px;
            width: 150px;
            border: 3px solid rgba(0, 0, 0, 0.4);
            padding: 3px;
        }

        #imagePreview i {
            position: absolute;
            right: -18px;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            color: #fff;
            font-size: 18px;
        }

        table.dataTable {
            clear: both;
            margin-top: 6px !important;
            margin-bottom: 6px !important;
            max-width: none !important;
            border-collapse: separate !important;
            width: 100% !important;
        }

        .op-btn {
            margin-right: 22px;
        }

        table tfoot {
            display: none;
        }

        .disabled {
            pointer-events: none;
            cursor: default;
        }

        .google_translate_element {
            margin-top: 9px;
        }

        .goog-te-gadget-simple {
            background-color: #fff !important;
            border-left: 1px solid #DDD !important;
            border-top: 1px solid #DDD !important;
            border-bottom: 1px solid #DDD !important;
            border-right: 1px solid #DDD !important;
            font-size: 10pt !important;
            display: inline-block !important;
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            cursor: pointer !important;
            zoom: 1 !important;
        }

        .goog-te-gadget img {
            display: none;
        }

        .goog-te-gadget-simple .goog-te-menu-value span {
            color: #676a6c !important;
            font-size: 13px;
            border-left: 0px !important;
            font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f0f4f7;
        }

        table.dataTable {
            color: #212529;
            font-family: "Poppins", sans-serif;
        }

        .table {
            color: #212529;
            font-family: "Poppins", sans-serif;
        }

        .table-responsive {
            overflow-x: hidden
        }

        input {
            border-width: 2px;
            border-style: inset;
        }

        .dataTables_wrapper .dataTables_filter input {
            background-color: #FFFFFF;
            background-image: none;
            border: 1px solid #e5e6e7;
            border-radius: 1px;
            color: inherit;
            padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }

        .dataTables_wrapper .dataTables_length select {
            height: 2.05rem;
            width: 75px;
            font-size: 14px;
            font-weight: 500;
            background-color: #FFFFFF;
            background-image: none;
            border: 1px solid #e5e6e7;
            border-radius: 1px;
            color: inherit;
            padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
    </style>
    @yield('styles')
</head>
