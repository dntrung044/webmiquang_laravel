<ul id="cart_total">
    <li>
        <span>Giỏ hàng (<?php echo e($quantity_total); ?> món):</span>
        <?php echo e(number_format($total_cart, 0, '', '.')); ?>đ
    </li>
    <li>
        <span>Phí giao hàng</span>
        <?php echo e(number_format($feeship, 0, '', '.')); ?>đ
    </li>
    <li>
        <?php if(!empty(Session::get('coupon'))): ?>
            <?php if($condition == 1): ?>
                <span>Mã giảm giá (- <?php echo e($number); ?> %) :</span>
            <?php elseif($condition == 2): ?>
                <span>Mã giảm giá (-<?php echo e(number_format($number, 0, '', '.')); ?>đ) :</span>
            <?php endif; ?>
            <p>-<?php echo e(number_format($total_coupon, 0, '', '.')); ?>đ </p>
        <?php endif; ?>
    </li>
    <hr>
    <?php
        if (empty(Auth::user()->fee)) {
            if (empty(Auth::user())) {
                echo '(
            <a href="/dang-nhap" style="color: #f8da45;" >
                Thêm vào địa chỉ
            </a>để được giảm phí giao hàng )';
            } else {
                echo '(
                <a href="/tai-khoan/thay-doi-thong-tin/' .
                    Auth::user()->id .
                    '" style="color: #f8da45;" >
                    Thêm vào địa chỉ
                </a>để được giảm phí giao hàng )';
            }
        }
    ?>
    <hr>
    <li class="total">
        <?php echo e(number_format($total_payment, 0, '', '.')); ?> đ
        <span>Tổng thanh toán</span>
    </li>
</ul>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/carts/compoments/payment_compoment.blade.php ENDPATH**/ ?>