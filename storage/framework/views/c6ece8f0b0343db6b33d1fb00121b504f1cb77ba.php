<?php $__env->startSection('content'); ?>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">
                            <?php if($title): ?>
                                <?php echo e($title); ?>

                            <?php else: ?>
                                Quản lý
                            <?php endif; ?>
                        </h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a href="<?php echo e(route('coupons.add')); ?>">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100">
                                    <i class="icofont-plus-circle me-2 fs-6"></i>Thêm danh mục mã giảm giá
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Chi tiết mã giảm giá</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhập</th>
                                        <th>Mã</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($coupon->id); ?></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <h3 class="fw-bold">
                                                         <?php echo e($coupon->name); ?>

                                                        </h3>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-clock-time"></i>
                                                        <span><?php echo e($coupon->date_start); ?></span>
                                                       -
                                                        <span><?php echo e($coupon->date_end); ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-price"></i>
                                                        <span><?php echo e($coupon->code); ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-listing-number"></i>
                                                        <span><?php echo e($coupon->amount); ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-listing-number"></i>
                                                        <span><?php echo e($coupon->number); ?></span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><?php echo e($coupon->created_at); ?></td>
                                            <td><?php echo e($coupon->updated_at); ?></td>
                                            <td><?php echo \App\Helpers\Helper::active($coupon->condition); ?></td>
                                            <td><?php echo \App\Helpers\Helper::active($coupon->status); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-secondary"
                                                        href="<?php echo e(route('coupons.edit', ['coupon' => $coupon->id])); ?>">
                                                        <button class="btn btn-primary btn-sm" type="button">
                                                            <i class="icofont-edit text-success"></i>
                                                        </button>
                                                    </a>

                                                    <a href="#" class="btn btn-outline-secondary"
                                                        onclick="removeRow(<?php echo e($coupon->id); ?>, '<?php echo e(route('coupons.destroy')); ?>')">
                                                        <button type="button" class="btn btn-warning btn-sm">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </button>
                                                    </a>
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/coupon/list.blade.php ENDPATH**/ ?>