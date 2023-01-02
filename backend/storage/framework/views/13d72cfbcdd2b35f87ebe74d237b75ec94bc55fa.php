<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary bars them" href="#"><i
                    class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo e(Settings::get('application_title')); ?>

                    Admin
                    Panel</span>
            </li>
            <?php
                $oredr_list = App\Models\Order::with(['user_details'])
                    ->where('status', 'processing')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
                $oredr_count_list = App\Models\Order::where('status', 'processing')->count();
            ?>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i> <span class="label label-warning"><?php echo e($oredr_count_list); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                    <?php $__currentLoopData = $oredr_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle"
                                        src=<?php echo e(url('storage/avatar/' . $val['user_details']['avatar'])); ?>>
                                </a>
                                <div class="media-body">
                                    <strong><?php echo e($val['user_details']['first_name']); ?>

                                        <?php echo e($val['user_details']['last_name']); ?></strong> started Order
                                    <strong><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></strong>.
                                    <br>
                                    <small class="text-muted"><?php echo e($val->updated_at); ?></small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="text-center link-block">
                            <a href="<?php echo e(route('admin.order.index')); ?>" class="dropdown-item">
                                <strong>Read All Messages</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold"><?php echo e(\Auth::user()->first_name); ?>

                        <?php echo e(\Auth::user()->last_name); ?><b class="caret"></b></span>
                </a>
                <ul class="dropdown-menu animated fadeInLeft m-t-xs">
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.user.profile')); ?>">Profile</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>">Logout</a></li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
<?php /**PATH D:\backend\backend\resources\views/admin/includes/topNavigation.blade.php ENDPATH**/ ?>