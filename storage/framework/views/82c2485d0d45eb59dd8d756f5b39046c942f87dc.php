<?php $__env->startSection('content'); ?>
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> <?php echo e($title); ?></h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a href="<?php echo e(route('products.add')); ?>">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100">
                                    <i class="icofont-plus-circle me-2 fs-6"></i>Thêm sản phẩm
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/products/index.blade.php ENDPATH**/ ?>