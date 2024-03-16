<?php if(Session::has('message')): ?>
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.success("<?php echo e(session('message')); ?>");
<?php endif; ?>

<?php if(Session::has('error')): ?>
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.error("<?php echo e(session('error')); ?>");
<?php endif; ?>

<?php if(Session::has('info')): ?>
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.info("<?php echo e(session('info')); ?>");
<?php endif; ?>

<?php if(Session::has('warning')): ?>
toastr.options = {
    "closeButton": true,
    "progressBar": true
}
toastr.warning("<?php echo e(session('warning')); ?>");
<?php endif; ?>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/layout/toastr_notifications.blade.php ENDPATH**/ ?>