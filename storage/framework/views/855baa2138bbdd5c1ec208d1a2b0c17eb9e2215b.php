<!-- Jquery Core Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?php echo e(asset('/teamplate/admin/assets/bundles/libscripts.bundle.js')); ?>"></script>
<!-- Plugin Js-->
<script src="<?php echo e(asset('/teamplate/admin/assets/bundles/dataTables.bundle.js')); ?>"></script>
<!-- Jquery Page Js -->
<script src="<?php echo e(asset('/teamplate/admin/js/template.js')); ?>"></script>
<!-- Ajax Js-->
<script src="<?php echo e(asset('/teamplate/admin/js/main.js')); ?>"></script>
<!-- Databse table-->
<script>
    $(document).ready(function() {
        $('#myProjectTable').addClass( 'nowrap' ).dataTable( {
            paging: false,
            info: false,
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    });
   ;
</script>
<!-- toastr message-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- token ajax-->
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<?php echo $__env->yieldContent('footer'); ?>
<!-- alert message-->
<script>
    <?php if(Session::has('message')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("<?php echo e(session('message')); ?>");
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    <?php if(Session::has('info')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>

    <?php if(Session::has('warning')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("<?php echo e(session('warning')); ?>");
    <?php endif; ?>
  </script>


<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/layout/footer.blade.php ENDPATH**/ ?>