<!doctype html>
<html lang="vi" dir="ltr">
<head>
    <?php echo $__env->make('admin.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div id="mytask-layout" class="theme-indigo">

        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-5 me-0">
            <?php echo $__env->make('admin.layout.slidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <?php echo $__env->make('admin.layout.toastr_notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layout.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /Users/trungchodie/Documents/WEB/Laravel/untitled folder/webmiquang_laravel/resources/views/admin/layout/main.blade.php ENDPATH**/ ?>