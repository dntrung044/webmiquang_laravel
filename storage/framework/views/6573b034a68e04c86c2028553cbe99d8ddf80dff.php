<!DOCTYPE html>
<html lang="vi">

<head>
    <?php echo $__env->make('user.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>
    <div id="preloader" style="display: none;">
        <div data-loader="circle-side" style="display: none;"></div>
    </div>
    <?php echo $__env->make('user.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- main -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- main -->
    <?php if(!empty(Auth::user())): ?>
        <?php echo $__env->make('user.layout.userbot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('user.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH /Users/trungchodie/Documents/WEB/Laravel/webmiquang/resources/views/User/layout/main.blade.php ENDPATH**/ ?>