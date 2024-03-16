    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <title>
        <?php if( $title): ?>
            <?php echo e($title); ?>

        <?php else: ?>
             Quản lý
        <?php endif; ?>
    </title>
    <!-- plugin css file  -->
    <link rel="stylesheet" href="<?php echo e(asset('/teamplate/admin/assets/plugin/datatables/responsive.dataTables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/teamplate/admin/assets/plugin/datatables/dataTables.bootstrap5.min.css')); ?>">
    <!-- project css file  -->
    <link rel="stylesheet" href="<?php echo e(asset('/teamplate/admin/assets/css/my-task.style.min.css')); ?>">
    <!-- add css file  -->
    <link href="<?php echo e(asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<?php echo $__env->yieldContent('head'); ?>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/layout/head.blade.php ENDPATH**/ ?>