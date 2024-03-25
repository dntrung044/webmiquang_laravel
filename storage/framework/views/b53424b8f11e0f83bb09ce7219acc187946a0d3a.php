	<!-- COMMON SCRIPTS -->
    <script src="<?php echo e(asset('teamplate/js/common_scripts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('teamplate/js/common_func.js')); ?>"></script>
    
    <!-- Home -->
    <script src="<?php echo e(asset('teamplate/js/wizard/wizard_func.js')); ?>"></script>

    <script src="<?php echo e(asset('teamplate/js/slider.js')); ?>"></script>

    <script src="<?php echo e(asset('teamplate/js/sticky_sidebar.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('teamplate/js/shop_order_func.js')); ?>"></script>
    
    <script src="<?php echo e(asset('teamplate/js/specific_shop.js')); ?>"></script>
    
    <script src="<?php echo e(asset('teamplate/js/RangeSlider/jQuery.UI.js')); ?>"></script>
    
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    
    <script type="text/javascript">
        const user_btn = $("#user-bot .icon");
        const user_box = $("#user-bot .information");

        user_btn.click(() => {
            user_btn.toggleClass("expanded");
            setTimeout(() => {
                user_box.toggleClass("expanded");
            }, 100);
        });
    </script>






<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/layout/script.blade.php ENDPATH**/ ?>