<script src="{{ asset('assets/admin/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<x:notify-messages />
@notifyJs
@yield('scripts')
