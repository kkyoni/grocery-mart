<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<title><?php echo e(Settings::get('application_title')); ?>  - <?php echo $__env->yieldContent('title'); ?></title>
<?php echo notifyCss(); ?>
<link rel="icon" href="<?php echo e(url(\Settings::get('favicon_logo'))); ?>" type="<?php echo e(url(\Settings::get('favicon_logo'))); ?>" sizes="16x16">
<link href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/admin/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/admin/css/style.css')); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<style>
.all_backgroud{background-color: #5A8DEE;}
.help-blockk{display: inline-block;margin-top:0px;margin-bottom: 0px;margin-left: 4px;}
.help-block {display: inline-block;margin-top: 5px;margin-bottom: 0px;margin-left: 5px;}
.form-group {margin-bottom: 10px;}
.form-control {font-size: 14px;font-weight: 500;}
#imagePreview{width: 100%;height: 100%;text-align: center;margin: 0 auto;position: relative;}
#hidden{display: none !important;}
#imagePreview img {height: 150px;width: 150px;border: 3px solid rgba(0,0,0,0.4);padding: 3px;}
#imagePreview i{position: absolute;right: -18px;background: rgba(0,0,0,0.5);padding: 5px;border-radius: 50%;width: 30px;height: 30px;color: #fff;font-size: 18px;}
table.dataTable {clear: both;margin-top: 6px !important;margin-bottom: 6px !important;max-width: none !important;border-collapse: separate !important;width: 100% !important;}
.op-btn{margin-right:22px;}
table tfoot{display: none;}
.disabled {pointer-events: none; cursor: default;}
.google_translate_element{margin-top:9px;}
.goog-te-gadget-simple{background-color: #fff !important; border-left: 1px solid #DDD !important; border-top: 1px solid #DDD !important; border-bottom: 1px solid #DDD !important; border-right: 1px solid #DDD !important; font-size: 10pt !important; display: inline-block !important; padding-top: 0px !important; padding-bottom: 0px !important; cursor: pointer !important; zoom: 1 !important;}
.goog-te-gadget img{display: none;}
.goog-te-gadget-simple .goog-te-menu-value span{color: #676a6c !important; font-size: 13px; border-left:0px !important; font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;}
.goog-te-banner-frame{display: none !important;}
body{top: 0px !important;}
</style>
<?php echo $__env->yieldContent('styles'); ?>
</head>
<?php /**PATH D:\Jaymin\grocery-mart\backend\resources\views/admin/includes/head.blade.php ENDPATH**/ ?>