<?php $__env->startSection('content'); ?>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> <?php echo e($title); ?></h3>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Liên hệ </th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tình trạng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($transaction->id); ?></td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <i class="icofont-tags-squared"></i>
                                                        <span><?php echo e($transaction->user->name); ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-phone"></i>
                                                        <span><?php echo e($transaction->user->phone); ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-email"></i>
                                                        <span><?php echo e($transaction->user->email); ?></span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><?php echo e($transaction->created_at); ?></td>
                                            <td>
                                                <?php if($transaction->status == "DEFAULT"): ?>
                                                <a href="<?php echo e(route('transactions.active', $transaction->id)); ?>" class="btn btn-outline-secondary">
                                                    <span class="badge bg-danger text-primary">Chưa giao hàng</span>
                                                </a>
                                                <a href="<?php echo e(route('transactions.cancel', $transaction->id)); ?>" class="btn btn-outline-secondary">
                                                    <span class="badge bg-danger text-warning">Hủy đơn</span>
                                                </a>
                                                <?php elseif($transaction->status == "DELIVERING"): ?>
                                                   <span class="badge bg-warning">Đang giao hàng</span>

                                                <?php elseif($transaction->status == "DONE"): ?>
                                                   <span class="badge bg-success">Đã thành công</span>
                                                <?php elseif($transaction->status == "CANCELLED"): ?>
                                                    <span class="badge bg-success text-danger">Đã hủy!!!</span>
                                                    <a href="" class="btn btn-outline-secondary">
                                                        <span class="badge bg-danger">chi tiết</span>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="<?php echo e(route('transactions.detail', $transaction->id)); ?>">
                                                            <i class="icofont-eye-alt text-success"></i>
                                                        </a>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-info btn-sm"
                                                            href="<?php echo e(route('transactions.index', $transaction->id)); ?>?pdf=true">
                                                            <i class="fa fa-print text-warning"></i>
                                                        </a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-secondary deleterow">
                                                        <a href="#"
                                                            onclick="removeRow(<?php echo e($transaction->id); ?>, '/admin/transactions/destroy')">
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/transactions/list.blade.php ENDPATH**/ ?>