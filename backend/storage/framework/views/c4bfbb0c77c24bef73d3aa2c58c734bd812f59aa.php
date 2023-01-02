<!DOCTYPE html>
<html lang="en">	
<?php echo $__env->make('admin.includes.headAuth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body id="container">
	<div class="middle-box text-center loginscreen">
		<?php echo $__env->yieldContent('authContent'); ?>
	</div>
<?php echo $__env->make('admin.includes.scriptsAuth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH D:\backend\backend\resources\views/admin/layouts/appAuth.blade.php ENDPATH**/ ?>