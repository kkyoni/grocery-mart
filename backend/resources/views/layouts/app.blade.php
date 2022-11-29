<!DOCTYPE html>
<html>
    @include('includes.header')
    <body class="">
        <div id="wrapper">
            @include('includes.sidemenu')
            <div id="page-wrapper" class="gray-bg">
                @include('includes.topmenu')
                 @yield('mainContent')
                @include('includes.footer')
            </div>
        </div>
        @include('includes.footer_script')
    </body>
</html>
