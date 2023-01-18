<script src="<?php echo e(asset('assets/admin/js/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/inspinia.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script type="text/javascript">
    $("#example1").on('change', function() {
        if ($(this).is(':checked')) {
            $Url = "down"
            document.location.href = $Url;
        } else {
            $Url = "up"
            document.location.href = $Url;

        }
    });
</script>
<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 300);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("wrapper").style.display = "block";
    }
</script>
<?php if (isset($component)) { $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c = $component; } ?>
<?php $component = $__env->getContainer()->make(Mckenziearts\Notify\NotifyComponent::class, []); ?>
<?php $component->withName('notify-messages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c)): ?>
<?php $component = $__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c; ?>
<?php unset($__componentOriginalf6d1e1ab7a8df2de5d0bdc28df8775f180a35b0c); ?>
<?php endif; ?>
<?php echo notifyJs(); ?>
<?php echo $__env->yieldContent('scripts'); ?>
<?php /**PATH D:\Jaymin\grocery-mart\backend\resources\views/admin/includes/scripts.blade.php ENDPATH**/ ?>