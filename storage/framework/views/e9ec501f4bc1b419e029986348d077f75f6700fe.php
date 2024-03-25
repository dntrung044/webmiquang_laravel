<!DOCTYPE html>
<html lang="vi">
    <head>
        <?php echo $__env->make('user.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body>
        <!-- Page Preload -->
        
        <div id="preloader" style="display: none;">
            <div data-loader="circle-side" style="display: none;"></div>
        </div>
        <!-- header -->
        <?php echo $__env->make('user.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- main -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- user-bot -->
        <?php if(!empty(Auth::user())): ?>
            <div id="user-bot">
                <div class="information">
                    <div class="headbot">
                        <h3 class="timestamp">Người dùng</h3>
                    </div>
                    <div class="items">
                        <!-- item  -->
                        <div class="item">
                            <a href="<?php echo e(route('account')); ?>">
                                <div class="item_name">
                                    <h6 class="name">Thông tin tài khoản</h6>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="/updating">
                                <div class="item_name">
                                    <h6 class="name">Thông tin đơn hàng</h6>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="/updating">
                                <div class="item_name">
                                    <h6 class="name">Sản phẩm đã đánh giá</h6>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="/tai-khoan">
                                <div class="item_name">
                                    <h6 class="name">Mã giảm giá</h6>
                                </div>
                            </a>
                        </div>

                        <!-- items  -->
                    </div>

                    
                    <div style="align-items: center; margin-left: 6em; margin-top: 0.5em; margin-bottom: 1em">
                        <form action="<?php echo e(route('logout')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn_logout">
                                Đăng xuất
                            </button>
                        </form>

                    </div>
                </div>
                <div class="icon">
                    <div class="user">
                        <i class="bi bi-x-lg"></i>
                        Xin chào : <?php echo e(Auth::user()->name); ?>

                    </div>
                    <i class="bi bi-person-circle me-2"></i>
                </div>
            </div>
        <?php endif; ?>
        <!-- footer-->
        <?php echo $__env->make('user.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- layout-->
        <?php echo $__env->make('user.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('script'); ?>
    </body>

</html>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/layout/main.blade.php ENDPATH**/ ?>