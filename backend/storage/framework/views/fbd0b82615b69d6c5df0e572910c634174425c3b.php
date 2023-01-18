<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-12">
            <h2><i class="fa fa-home"></i> Dashboard</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Home</strong></span>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-users_count">
                                                    <i class="fa fa-users fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-users_count white media-body">
                                                    <h3>Users</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalUser); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.user.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-blog_count bg-darken-2">
                                                    <i class="fa fa-hourglass fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-blog_count white media-body">
                                                    <h3>Blog</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalBlog); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.blog.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-cms_count bg-darken-2">
                                                    <i class="fa fa-clock-o fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-cms_count white media-body">
                                                    <h3>CMS</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalCms); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.cms.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-faq_count bg-darken-2">
                                                    <i class="fa fa-check fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-faq_count white media-body">
                                                    <h3>FAQ</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalFaq); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.faq.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-brand_count bg-darken-2">
                                                    <i class="fa fa-ban fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-brand_count white media-body">
                                                    <h3>Brand</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalBrand); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.brand.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-category_count bg-darken-2">
                                                    <i class="fa fa-money fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-category_count white media-body">
                                                    <h3>Category</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalCategories); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.categories.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-product_count bg-darken-2">
                                                    <i class="fa fa-money fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-product_count white media-body">
                                                    <h3>Product</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalProduct); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.product.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-3 col-12 mb-10">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="media align-items-stretch">
                                                <div class="p-2 text-center bg-promocode_count bg-darken-2">
                                                    <i class="fa fa-money fa-3x icon_admin"></i>
                                                </div>
                                                <div class="p-2 bg-gradient-x-promocode_count white media-body">
                                                    <h3>PromoCode</h3>
                                                    <h5 class="text-bold-400 mb-0"><?php echo e($TotalPromo); ?></h5>
                                                    <div class="media-left media-middle mt-1">
                                                        <a class="white" href="<?php echo e(route('admin.promo.index')); ?>">View
                                                            more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6 col-12">
                        <div class="ibox">
                            <div class="ibox-content no-padding">
                                <div id="dynamic_data"></div>
                                <div id="dashboard_div" style="margin: 2em; " style="width:250px;height:250px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div id="control3" align="center"></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="chart2" align="center"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Messages</h5>
                            </div>
                            <div class="ibox-content ibox-heading" style="">
                                <h3><i class="fa fa-envelope-o"></i> New messages</h3>
                                <small><i class="fa fa-tim"></i> You have 22 new messages and 16 waiting in draft
                                    folder.</small>
                            </div>
                            <div class="ibox-content" style="">
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right text-navy">1m ago</small>
                                            <strong>Monica Smith</strong>
                                            <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum</div>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right">2m ago</small>
                                            <strong>Jogn Angel</strong>
                                            <div>There are many variations of passages of Lorem Ipsum available</div>
                                            <small class="text-muted">Today 2:23 pm - 11.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right">5m ago</small>
                                            <strong>Jesica Ocean</strong>
                                            <div>Contrary to popular belief, Lorem Ipsum</div>
                                            <small class="text-muted">Today 1:00 pm - 08.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right">5m ago</small>
                                            <strong>Monica Jackson</strong>
                                            <div>The generated Lorem Ipsum is therefore </div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>


                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right">5m ago</small>
                                            <strong>Anna Legend</strong>
                                            <div>All the Lorem Ipsum generators on the Internet tend to repeat </div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right">5m ago</small>
                                            <strong>Damian Nowak</strong>
                                            <div>The standard chunk of Lorem Ipsum used </div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <div>
                                            <small class="float-right">5m ago</small>
                                            <strong>Gary Smith</strong>
                                            <div>200 Latin words, combined with a handful</div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Order cron list</h5>
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><span class="label label-warning">Canceled</span> </td>
                                                <td><i class="fa fa-clock-o"></i> 10:40am</td>
                                                <td>Monica</td>
                                                <td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>
                                            </tr>
                                            <tr>
                                                <td><small>Pending...</small> </td>
                                                <td><i class="fa fa-clock-o"></i> 12:08am</td>
                                                <td>Damian</td>
                                                <td class="text-navy"> <i class="fa fa-level-up"></i> 23% </td>
                                            </tr>
                                            <tr>
                                                <td><span class="label label-primary">Completed</span> </td>
                                                <td><i class="fa fa-clock-o"></i> 04:10am</td>
                                                <td>Amelia</td>
                                                <td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Support list</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <ul class="todo-list m-t small-list">
                                            <li>
                                                <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                                <span class="m-l-xs todo-completed">Buy a milk</span>

                                            </li>
                                            <li>
                                                <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                                <span class="m-l-xs">Send documents to Mike</span>
                                                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                                            </li>
                                            <li>
                                                <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                                <span class="m-l-xs todo-completed">Plan vacation</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <style type="text/css">
        .wrapper-content {
            padding: 20px 10px 40px;
        }

        .white {
            color: #FFF;
        }

        .white:hover {
            color: #FFF;
        }

        .bg-users_count {
            background-color: #FF5733 !important;
        }

        .bg-gradient-x-users_count {
            background-image: linear-gradient(to right, #FF5733 0%, #ed836b 100%);
            background-repeat: repeat-x;
        }

        .bg-blog_count {
            background-color: #d8db21 !important;
        }

        .bg-gradient-x-blog_count {
            background-image: linear-gradient(to right, #d8db21 0%, #edeb6b 100%);
            background-repeat: repeat-x;
        }

        .bg-cms_count {
            background-color: #10C888 !important;
        }

        .bg-gradient-x-cms_count {
            background-image: linear-gradient(to right, #10C888 0%, #5CE0B8 100%);
            background-repeat: repeat-x;
        }

        .bg-faq_count {
            background-color: #4b5ff1 !important;
        }

        .bg-gradient-x-faq_count {
            background-image: linear-gradient(to right, #4b5ff1 0%, #6CDDEB 100%);
            background-repeat: repeat-x;
        }

        .bg-brand_count {
            background-color: #fcbe03 !important;
        }

        .bg-gradient-x-brand_count {
            background-image: linear-gradient(to right, #fcbe03 0%, #fdd868 100%);
            background-repeat: repeat-x;
        }

        .bg-category_count {
            background-color: #8803fc !important;
        }

        .bg-gradient-x-category_count {
            background-image: linear-gradient(to right, #8803fc 0%, #cf9afe 100%);
            background-repeat: repeat-x;
        }

        .bg-product_count {
            background-color: #fc7703 !important;
        }

        .bg-gradient-x-product_count {
            background-image: linear-gradient(to right, #fc7703 0%, #FF976A 100%);
            background-repeat: repeat-x;
        }

        .bg-promocode_count {
            background-color: #FF6275 !important;
        }

        .bg-gradient-x-promocode_count {
            background-image: linear-gradient(to right, #FF6275 0%, #FF9EAC 100%);
            background-repeat: repeat-x;
        }

        .card {
            color: #FFF !important;
            font-weight: 600 !important;
            font-size: 1.14rem !important;
        }

        .p-2 {
            padding: 1rem !important;
        }

        #dynamic_data {
            margin: 2em auto;
        }

        .fa-3x {
            font-size: 2em;
        }

        .mb-10 {
            margin-bottom: 10px
        }

        #container_chart {
            margin: 0 auto;
        }

        .gm-style-iw-d {
            overflow: hidden !important;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7M8IrIHnp_j4AIpVWtRE6bFcTlh7SyAo&signed_in=false&libraries=places">
    </script>
    <script type="text/javascript">
        Highcharts.chart('dynamic_data', {
            chart: {
                type: 'variablepie',
                backgroundColor: null
            },
            title: {
                text: ''
            },
            exporting: {
                enabled: false
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name} : {point.y}</b><br/>'
            },
            series: [{
                minPointSize: 80,
                innerSize: '40%',
                zMin: 0,
                name: '<?php echo e(Settings::get('application_title')); ?>',
                data: [{
                    name: 'Users',
                    y: <?php echo e($TotalUser); ?>,
                    color: '#FF5733',
                }, {
                    name: 'Blog',
                    y: <?php echo e($TotalBlog); ?>,
                    color: '#d8db21',
                }, {
                    name: 'CMS',
                    y: <?php echo e($TotalCms); ?>,
                    color: '#10C888',
                }, {
                    name: 'FAQ',
                    y: <?php echo e($TotalFaq); ?>,
                    color: '#4b5ff1',
                }, {
                    name: 'Brand',
                    y: <?php echo e($TotalBrand); ?>,
                    color: '#fcbe03',
                }, {
                    name: 'Category',
                    y: <?php echo e($TotalCategories); ?>,
                    color: '#8803fc',
                }, {
                    name: 'Product',
                    y: <?php echo e($TotalProduct); ?>,
                    color: '#fc7703',
                }, {
                    name: 'Promo Code',
                    y: <?php echo e($TotalPromo); ?>,
                    color: '#FF6275',
                }, ]
            }]
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jaymin\grocery-mart\backend\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>