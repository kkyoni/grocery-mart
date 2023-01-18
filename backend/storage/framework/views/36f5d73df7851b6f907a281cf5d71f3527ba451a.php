<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo e(Settings::get('application_title')); ?> - Coming Soon</title>
<link rel="icon" href="<?php echo e(url(\Settings::get('favicon_logo'))); ?>" type="<?php echo e(url(\Settings::get('favicon_logo'))); ?>" sizes="16x16">
<style>
body, html {height: 100%;margin: 0;}
.bgimg {background-image: url('assets/front/img/upcoming.jpg');height: 100%;background-position: center;background-size: cover;position: relative;color: white;font-family: "Courier New", Courier, monospace;font-size: 25px;}
.topleft {position: absolute;top: 0;left: 16px;}
.middle {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);text-align: center;}
</style>
</head>
<body>
<div class="bgimg">
  <div class="topleft">
    <p><img src="<?php echo e(url(\Settings::get('application_logo'))); ?>" style="height:100px;width:100px;"></p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
  </div>
</div>
</body>
</html><?php /**PATH D:\Jaymin\grocery-mart\backend\resources\views/home.blade.php ENDPATH**/ ?>