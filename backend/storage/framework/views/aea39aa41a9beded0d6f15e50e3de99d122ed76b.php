<?php $__env->startSection('title'); ?>
Promo Management - Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<div class="row wrapper border-bottom white-bg page-heading mb-5">
	<div class="col-lg-12">
		<h2><i class="fa fa-gift" aria-hidden="true"></i> Add Promo From Management</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?php echo e(route('admin.promo.index')); ?>">Promo Table</a>
			</li>
			<li class="breadcrumb-item active">
				<span class="label label-success float-right all_backgroud"><strong>Add Promo Form</strong></span>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-content">
					<?php echo Form::open(['route'	=> ['admin.promo.store'],'id' => 'CreateForm','files' => 'true']); ?>

					<?php echo $__env->make('admin.pages.promo.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<div class="hr-line-dashed"></div>
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<button class="btn btn-w-m btn btn-primary" type="submit">Save</button>
								<a href="<?php echo e(route('admin.promo.index')); ?>"><button class="btn btn-w-m btn btn-danger" type="button">Cancel</button></a>
							</div>
						</div>
					</div>
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\backend\backend\resources\views/admin/pages/promo/create.blade.php ENDPATH**/ ?>