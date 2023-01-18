<!DOCTYPE html>
<html>
<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    #wrapper {
        display: none;
    }
</style>
<div id="loader">
    <center>
        <img src="<?php echo e(asset('assets/admin/loader.gif')); ?>" style="padding-top: 400px">
    </center>
</div>

<body class="" onload="myFunction()" style="margin:0;">
    <div id="wrapper" style="display:none;">
        <?php echo $__env->make('admin.includes.sideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php echo $__env->make('admin.includes.topNavigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('mainContent'); ?>
            <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo $__env->make('admin.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Jaymin\grocery-mart\backend\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>