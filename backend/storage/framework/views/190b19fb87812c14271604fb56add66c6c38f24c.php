<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img src="<?php echo e(url(\Settings::get('application_logo'))); ?>" alt="image" class="rounded-circle"
                        height="60px" width="60px" style="border-radius:20%!important">
                </div>
                <div class="logo-element">
                    <img alt="image" class="rounded-circle" height="60px" width="60px"
                        style="border-radius:20%!important" src="<?php echo e(url(\Settings::get('application_logo'))); ?>">
                </div>
            </li>
            <li class="<?php if(Request::segment('2') == 'dashboard'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Dashboard">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'user'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Users">
                <a href="<?php echo e(route('admin.user.index')); ?>">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Users</span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'blog'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Blog">
                <a href="<?php echo e(route('admin.blog.index')); ?>">
                    <i class="fa fa-rss"></i>
                    <span class="nav-label">
                        Blog
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'cms'): ?> active <?php endif; ?>" data-toggle="tooltip" title="CMS">
                <a href="<?php echo e(route('admin.cms.index')); ?>">
                    <i class="fa fa-file-text"></i>
                    <span class="nav-label">
                        Cms
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'contact'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Contact">
                <a href="<?php echo e(route('admin.contact.index')); ?>">
                    <i class="fa fa-phone-square"></i>
                    <span class="nav-label">
                        Contact
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'faq'): ?> active <?php endif; ?>" data-toggle="tooltip" title="FAQ">
                <a href="<?php echo e(route('admin.faq.index')); ?>">
                    <i class="fa fa-industry"></i>
                    <span class="nav-label">
                        Faq
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'brand'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Brand">
                <a href="<?php echo e(route('admin.brand.index')); ?>">
                    <i class="fa fa-first-order"></i>
                    <span class="nav-label">
                        Brand
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'categories'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Categories">
                <a href="<?php echo e(route('admin.categories.index')); ?>">
                    <i class="fa fa-list-alt"></i>
                    <span class="nav-label">
                        Categories
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'product'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Product">
                <a href="<?php echo e(route('admin.product.index')); ?>">
                    <i class="fa fa-product-hunt"></i>
                    <span class="nav-label">
                        Product
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('2') == 'promo'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Promo">
                <a href="<?php echo e(route('admin.promo.index')); ?>">
                    <i class="fa fa-gift"></i>
                    <span class="nav-label">
                        Promo Code
                    </span>
                </a>
            </li>
            <li class="<?php if(Request::segment('1') == 'settings'): ?> active <?php endif; ?>" data-toggle="tooltip" title="Setting">
                <a href="<?php echo e(url('settings')); ?>">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">Setting </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH D:\Jaymin\grocery-mart\backend\resources\views/admin/includes/sideBar.blade.php ENDPATH**/ ?>