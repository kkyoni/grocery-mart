<!-- <script src="{{ asset('assets/admin/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/pace/pace.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script> -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/js/jquery-3.1.1.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="{{ asset('assets/admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<!-- Image cropper -->
<script src="{{ asset('assets/admin/js/plugins/cropper/cropper.min.js') }}"></script>
<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{ asset('assets/admin/js/plugins/fullcalendar/moment.min.js') }}"></script>
<!-- Date range picker -->
<script src="{{ asset('assets/admin/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<!-- Tags Input -->
<script src="{{ asset('assets/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- Dual Listbox -->
<script src="{{ asset('assets/admin/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>
<script type="text/javascript" src="http://demos.codexworld.com/multi-select-dropdown-list-with-checkbox-jquery/multiselect/jquery.multiselect.js">
</script>
<link href="{{ asset('assets/admin/js/plugins/iCheck/icheck.min.js')}}" rel="stylesheet">

<x:notify-messages />
@notifyJs
@yield('scripts')
