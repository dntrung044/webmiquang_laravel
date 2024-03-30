<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<?php if(Session::has('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(Session::get('error')); ?>

    </div>
<?php endif; ?>

<?php if(session('confirmation')): ?>
    <div class="alert alert-info" role="alert">
        <?php echo session('confirmation'); ?>

    </div>
<?php endif; ?>

<?php if($errors->has('confirmation') > 0 ): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $errors->first('confirmation'); ?>

    </div>
<?php endif; ?>


<?php if(Session::has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('message')): ?>
    <div class="alert alert-message">
        <?php echo e(Session::get('message')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/layout/alert.blade.php ENDPATH**/ ?>