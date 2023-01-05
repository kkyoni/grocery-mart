<?php $__env->startSection('authContent'); ?>
<style type="text/css">
.ibox-content{width: 350px;height: 374px;top: 150px;position: absolute;}
</style>
<?php if(Session::has('message')): ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-<?php echo Session::get('alert-type'); ?>">
			<?php echo Session::get('message'); ?>

		</div>
	</div>
</div>
<?php endif; ?>
<div class="ibox-content ibox-content_login">
	<center><img src="<?php echo e(url(\Settings::get('application_logo'))); ?>"></center>
	<h2 class="font-bold">Admin Login</h2>
	<div class="row">
		<div class="col-lg-12">
			
			<form method="POST" action="<?php echo e(url('admin/login')); ?>">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<input id="exampleInputEmail_2" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php if(isset($_COOKIE['email_cookie'])){ ?> <?php echo e($_COOKIE['email_cookie']); ?> <?php }  ?>" required autocomplete="email" placeholder="Enter Email" autofocus>
					<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
					<span class="invalid-feedback" role="alert">
						<strong><?php echo e($message); ?></strong>
					</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" value="<?php if(isset($_COOKIE['password_cookie'])){ echo $_COOKIE['password_cookie']; }  ?>" required="" id="exampleInputEmail_3" placeholder="Enter Password" name="password" autocomplete="current-password">
					<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
					<span class="invalid-feedback" role="alert">
						<strong><?php echo e($message); ?></strong>
					</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<input class="form-check-input" type="checkbox" id="termscheckd" value="remmeber_me" name="remmeber"   <?php if(isset($_COOKIE['email_cookie'])){ ?> checked <?php }  ?>> &nbsp;
					<label class="form-check-label" for="termscheckd">Remember me</label>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="<?php echo e(route('admin.resetPassword')); ?>"><small>Forgot password?</small></a>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('authStyles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('authScripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.appAuth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/grocery-mart/backend/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>