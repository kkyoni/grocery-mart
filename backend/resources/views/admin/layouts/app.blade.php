<!DOCTYPE html>
<html>
@include('admin.includes.head')
<style>
    #wrapper {
        display: none;
    }
</style>
<div id="loader">
    <center>
        <img src="{{ asset('assets/admin/loader.gif') }}" style="padding-top: 400px">
    </center>
</div>

<body class="" onload="myFunction()" style="margin:0;">
    <div id="wrapper" style="display:none;">
        @include('admin.includes.sideBar')
        <div id="page-wrapper" class="gray-bg">
            @include('admin.includes.topNavigation')
            @yield('mainContent')
            @include('admin.includes.footer')
        </div>
    </div>
    @include('admin.includes.scripts')
</body>

</html>
