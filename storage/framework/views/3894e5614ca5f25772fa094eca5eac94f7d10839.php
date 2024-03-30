<div class="form-container" id="cart-list">
    <h5>Giỏ hàng</h5>
    <?php
        $total = 0;
        $acount = 0;
    ?>
    <ul>
        <?php $__currentLoopData = $cartproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $price = $cart->price_sale != 0 ? $cart->price_sale : $cart->price;
                $priceEnd = $price * $carts[$cart->id];
                $acount += $carts[$cart->id];
                $total += $priceEnd;
            ?>
            <li class="botli">
                <figure class="botfigure">
                    <img src="<?php echo e($cart->thumb); ?>" data-src="<?php echo e($cart->thumb); ?>" alt="" width="50"
                        height="50" class="lazy loaded botimg" data-was-processed="true">
                </figure>
                <strong>
                    <span class="botspan">
                        <?php echo e($carts[$cart->id]); ?> x <?php echo e($cart->name); ?>

                    </span>
                    <br><?php echo e(number_format($priceEnd, 0, '', '.')); ?>đ
                </strong>
                <a href="<?php echo e(route('cart.destroy', $cart->id)); ?>" class="action"><i class="icon_trash_alt"></i></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="total_drop">
        <div class="clearfix add_bottom_15"><strong>Tổng giỏ hàng
            </strong><span><?php echo e(number_format($total, 0, '', '.')); ?>đ</span>
        </div>
        <a href="<?php echo e(route('cart.index')); ?>" class="btn_1 outline">Xem giỏ hàng</a>
        <a href="<?php echo e(route('checkout.index')); ?>" class="btn_1">Thanh toán</a>
    </div>
    <hr>
    <button type="button" class="btnClose nut-dong" onclick="dongForm()">Đóng</button>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/products/cart.blade.php ENDPATH**/ ?>