<!DOCTYPE html>
<html>
@include('admin.includes.head')
<body class="">
    <div id="wrapper">
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