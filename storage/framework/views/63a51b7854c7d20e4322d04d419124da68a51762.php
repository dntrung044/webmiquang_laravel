<!-- List Product -->
<div class="row clearfix g-3">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-body" id="table-display">
                <table id="myProjectTable" class="table table-hover align-middle mb-0 zero-configuration"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 50px">#</th>
                            <th style="width: 220px">Chi tiết món ăn </th>
                            <th>Danh mục</th>
                            <th>Hình</th>
                            <th>Trạng thái</th>
                            <th>Xử lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $age = 0;
                                if ($product->total_rating) {
                                    $age = round($product->total_number / $product->total_rating, 2);
                                }
                            ?>
                            <tr>
                                <td><?php echo e($product->id); ?></td>
                                <td><?php echo e($product->name); ?>

                                    <ul>
                                        <li>
                                            <i class="icofont-price"></i>
                                            <span><?php echo e(number_format($product->price, 0, '', '.')); ?>đ</span>
                                        </li>
                                        <li>
                                            <i class="icofont-sale-discount"></i>
                                            <span><?php echo e(number_format($product->price_sale, 0, '', '.')); ?>đ</span>
                                        </li>
                                        <li>
                                            <span class="rating">
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <i class="<?php echo e($i <= $age ? 'icofont-star ' : ''); ?>"></i>
                                                <?php endfor; ?>
                                                <em><?php echo e($age); ?>/5.0</em>
                                            </span>
                                        </li>

                                    </ul>
                                </td>
                                <td><?php echo e(!empty($product->productcategory) ? $product->productcategory->name : ''); ?>

                                </td>
                                <td>
                                    <a href="<?php echo e($product->thumb); ?>" target="_blank">
                                        <img src="<?php echo e($product->thumb); ?>" style="height:50px;">
                                    </a>
                                </td>
                                <td><?php echo \App\Helpers\Helper::active($product->active); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <button data-url=" " ​ type="button" data-target="#show" data-toggle="modal"
                                            class="btn btn-info btn-show">Detail
                                        </button>

                                        <button href="#" class="btn btn-outline-secondary" data-toggle="tooltip"
                                            data-placement="top" onclick="GetData('<?php echo e($product->id); ?>')" title=""
                                            data-original-title="Edit">
                                            <i class="icofont-edit text-success"></i>
                                        </button>

                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#EditProduct">
                                            <i class="icofont-edit text-success"></i>
                                        </button>

                                        <button type="button" class="btn btn-outline-secondary deleterow">
                                            <a href="#"
                                                onclick="removeRow(<?php echo e($product->id); ?>, '/admin/products/destroy')">
                                                <i class="icofont-ui-delete text-danger"></i>
                                            </a>
                                        </button>
                                    </div>

                                    <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="/admin/products/edit/<?php echo e($product->id); ?>">
                                                            <i class="icofont-edit text-success"></i>
                                                        </a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-secondary deleterow">
                                                        <a href="#"
                                                            onclick="removeRow(<?php echo e($product->id); ?>, '/admin/products/destroy')">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/products/list.blade.php ENDPATH**/ ?>