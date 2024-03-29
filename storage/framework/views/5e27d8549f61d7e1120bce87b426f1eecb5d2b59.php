<table class="table table-striped" id="cart_list">
    <thead>
        <tr>
            <th>SẢN PHẨM</th>
            <th>GIÁ</th>
            <th>SỐ LƯỢNG</th>
            <th>TỔNG PHỤ</th>
            <th> &nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $productsInCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="<?php echo e($product->thumb); ?>" data-src="<?php echo e($product->thumb); ?>" class="lazy" alt="Image">
                    </div>
                    <span class="item_cart"><?php echo e($product->name); ?></span>
                </td>
                <td>
                    <strong><?php echo e(number_format($product->price_sale != 0 ? $product->price_sale : $product->price, 0, '', '.')); ?>đ</strong>
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" id="quantity_<?php echo e($product->id); ?>" class="qty2 num_product"
                            name="num_product[<?php echo e($product->id); ?>]" value="<?php echo e($carts[$product->id]); ?>">
                        <div class="inc button_inc cart_increase"
                            data-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('cart.increase')); ?>">
                            +
                        </div>
                        <div class="dec button_inc cart_decrease"
                            data-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('cart.decrease')); ?>">
                            -
                        </div>
                    </div>
                </td>
                <td>
                    <strong><?php echo e(number_format(($product->price_sale != 0 ? $product->price_sale : $product->price) * $carts[$product->id], 0, '', '.')); ?>đ</strong>
                </td>

                <td class="p-r-15">
                    <button type="button" data-url="<?php echo e(route('cart.destroy', ['id' => $product->id])); ?>"
                        data-id="<?php echo e($product->id); ?>" class="action_delete">
                        <i class="icon_trash_alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/carts/compoments/cart_compoment.blade.php ENDPATH**/ ?>