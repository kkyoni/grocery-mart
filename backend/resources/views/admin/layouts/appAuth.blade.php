<!DOCTYPE html>
<html>
@include('admin.includes.headAuth')
<body id="container">
	<div class="middle-box text-center loginscreen">
		@yield('authContent')
	</div>
@include('admin.includes.scriptsAuth')
</body>
</html>
