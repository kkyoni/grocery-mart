<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{Settings::get('site_name')}}</title>
    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/dist/img/favicon.ico')}}">
    <link rel="icon" href="{{Settings::has('favicon')?asset(Settings::get('favicon')):asset('admin/assets/dist/img/favicon.ico')}}" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css " rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/dist/css/style.css') }} " rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('admin/assets/src/scss/style-dark.scss') }} " rel="stylesheet" type="text/css"> -->
    <link href="{{asset('admin/assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('admin/assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"> -->
    <link href="{{asset('admin/assets/vendors/bower_components/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('admin/assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('admin/assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>

        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                ]) !!};
            </script>
        </head>
        <body>
            <!--Preloader-->
            <div class="preloader-it">
                <div class="la-anim-1"></div>
            </div>
            <!--/Preloader-->
            @guest
            <div class="wrapper pa-0">
                @yield('content')
            </div>
            @endguest
            @auth
            <div class="wrapper theme-4-active pimary-color-red box-layout">
                <div class="page-wrapper">
                    <div class="container-fluid pt-25">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">

                            <strong>Whoops!</strong> There were some problems with your input.<br><br>

                            <ul>

                                @foreach ($errors->all() as $error)

                                <li>{{ ucwords($error) }}</li>

                                @endforeach

                            </ul>

                        </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
            @endauth
            @guest
            <!-- Scripts -->
            <script src="{{ asset('admin/assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

            <!-- Slimscroll JavaScript -->
            <script src="{{ asset('admin/assets/dist/js/jquery.slimscroll.js')}}"></script>

            <!-- Init JavaScript -->
            <script src="{{ asset('admin/assets/dist/js/init.js')}}"></script>
            @endguest
            @auth
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });

            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"
            integrity="sha256-0lDCetJx/wJYWmLR1yr17IiofI6mcH+ohE5nLOYP7ZY=" crossorigin="anonymous"></script>

            <!-- Data table JavaScript -->
            <script src="{{ asset('admin/assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

            <!-- Slimscroll JavaScript -->
            <script src="{{ asset('admin/assets/dist/js/jquery.slimscroll.js')}}"></script>

            <!-- simpleWeather JavaScript -->
            <script src="{{ asset('admin/assets/vendors/bower_components/moment/min/moment.min.js')}}"></script>
            <script src="{{ asset('admin/assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
            <script src="{{ asset('admin/assets/dist/js/simpleweather-data.js')}}"></script>

            <!-- Progressbar Animation JavaScript -->
            <script src="{{ asset('admin/assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
            <script src="{{ asset('admin/assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>

            <!-- Fancy Dropdown JS -->
            <script src="{{ asset('admin/assets/dist/js/dropdown-bootstrap-extended.js')}}"></script>



            <!-- Owl JavaScript -->
            <script src="{{ asset('admin/assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

            <!-- ChartJS JavaScript -->
            <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>

            <!-- Morris Charts JavaScript -->
            <script src="{{ asset('admin/assets/vendors/bower_components/raphael/raphael.min.js')}}"></script>
            <script src="{{ asset('admin/assets/vendors/bower_components/morris.js/morris.min.js')}}"></script>
            <script src="{{ asset('admin/assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

            <!-- Switchery JavaScript -->
            <script src="{{ asset('admin/assets/vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>

            <!-- Init JavaScript -->
            <script src="{{ asset('admin/assets/dist/js/init.js')}}"></script>
            @endauth
            @yield('scripts')

            @yield('js')
            <script src="{{asset('admin/assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
            <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
            @if(Session::has('success'))
            <script type="text/javascript">
                var message = '<?php echo ucwords(Session::get('success'));?>';
                //$.growl.notice({ title: "", message: message });
                var icon = 'success';
                $.toast({
                    //heading: 'Welcome to Doodle',
                    text: message,
                    position: 'top-right',
                    loaderBg:'#e69a2a',
                    icon: icon,
                    hideAfter: 3500,
                    stack: 6
                });
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                var message = '<?php echo ucwords(Session::get('error'));?>';
                //$.growl.error({ title: "Error!", message: message });
                var icon = 'error';
                $.toast({
                //heading: 'Welcome to Doodle',
                text: message,
                position: 'top-right',
                loaderBg:'#e69a2a',
                icon: icon,
                hideAfter: 3500,
                stack: 6
            });
        </script>
        @endif
    </body>
    </html>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"
        integrity="sha256-urCxMaTtyuE8UK5XeVYuQbm/MhnXflqZ/B9AOkyTguo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"
        integrity="sha256-0lDCetJx/wJYWmLR1yr17IiofI6mcH+ohE5nLOYP7ZY=" crossorigin="anonymous"></script>
@include('settings::layout.notifications')

@yield('js')
-->
