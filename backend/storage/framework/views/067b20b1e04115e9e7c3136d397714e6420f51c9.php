<?php $__env->startSection('title'); ?>
    Contact Management
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-phone-square" aria-hidden="true"></i> Contact Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Contact Table</strong></span>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <?php echo $html->table(['class' => 'table table-striped table-bordered dt-responsive'], true); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left" id="exampleModalLabel1">Contact Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body testdata">
                    <h3>Modal Body</h3>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/datatables/dataTables.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/datatables/datatables.min.js')); ?>"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo e(asset('assets/admin/datatables/dataTables.bootstrap4.min.js')); ?>">
    </script>
    <?php echo $html->scripts(); ?>

    <script type="text/javascript">
        $(document).on("click", "a.deletecontact", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e69a2a",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo e(route('admin.contact.delete', [''])); ?>" + "/" + id,
                        type: 'post',
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(msg) {
                            if (msg.status == 'success') {
                                swal({
                                        title: "Deleted",
                                        text: "Delete Record success",
                                        type: "success"
                                    },
                                    function() {
                                        location.reload();
                                    });
                            } else {
                                swal("Warning!", msg.message, "warning");
                            }
                        },
                        error: function() {
                            swal("Error!", 'Error in delete Record', "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Your Contact is safe :)", "error");
                }
            });
            return false;
        })
        $(document).on("click", "a.Showcontact", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo e(route('admin.contact.show')); ?>",
                type: 'get',
                data: {
                    id: id
                },
                success: function(msg) {
                    $('.testdata').html(msg);
                    $('#basicModal').modal('show');
                },
                error: function() {
                    swal("Error!", 'Error in Record Not Show', "error");
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/grocery-mart/backend/resources/views/admin/pages/contact/index.blade.php ENDPATH**/ ?>