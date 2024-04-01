<div class="cart" id="cart_list">
    <div class="cartbox" id="myForm">
        <div class="form-container">
            <h5>Giỏ hàng</h5>
            <ul>
                <?php $__currentLoopData = $productsInCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="botli">
                        <figure class="botfigure">
                            <img src="<?php echo e($product->thumb); ?>" data-src="<?php echo e($product->thumb); ?>" alt="" width="50"
                                height="50" class="lazy loaded botimg" data-was-processed="true">
                        </figure>
                        <strong>
                            <span class="botspan">
                                <?php echo e($carts[$product->id]); ?>

                                x <?php echo e($product->name); ?>

                            </span>
                            <br><?php echo e(number_format($subtotal, 0, '', '.')); ?>đ
                        </strong>
                        <button type="button" data-url="<?php echo e(route('menus.destroy', ['id' => $product->id])); ?>"
                            data-id="<?php echo e($product->id); ?>" class="action action_delete">
                            <i class="icon_trash_alt"></i>
                        </button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="total_drop">
                <div class="clearfix add_bottom_15"><strong>Tổng giỏ hàng
                    </strong><span><?php echo e(number_format($total_cart, 0, '', '.')); ?>đ</span>
                </div>
                <button class="btn_1 OpentForm" onclick="CloseForm()">Đóng</button>
                <a href="<?php echo e(route('cart.index')); ?>" class="btn_1 outline">Thanh toán</a>
            </div>
            <hr>

        </div>
    </div>

    <div class="nut-mo-cartbox cart_right" onclick="OpentForm()" id="cart_shake" data-totalitems="<?php echo e($quantity_total); ?>">
        <span aria-hidden="true" class="icon_cart" style="font-size: 25px;"></span>
    </div>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/products/compoments/cart.blade.php ENDPATH**/ ?>