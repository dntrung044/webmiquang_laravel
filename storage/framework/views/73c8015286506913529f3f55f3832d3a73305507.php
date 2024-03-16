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
                                        <th style="width: 30px">#</th>
                                        <th>Tên món</th>
                                        <th>Tên tài khoản</th>
                                        <th>E-mail</th>
                                        <th>Nội dung</th>
                                        <th>số đánh giá</th>
                                        <th>Ngày viết</th>
                                        <th>Trạng thái</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $productsCMT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($cmt->id); ?></td>
                                            <td><?php echo e(!empty($cmt->product_id) ? $cmt->product->name:''); ?></td>
                                            
                                            <td><?php echo e($cmt->name); ?></td>
                                            <td><?php echo e($cmt->email); ?></td>
                                            <td><?php echo e($cmt->content); ?></td>
                                            <td>

                                                <span class="rating">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                       <i class="<?php echo e($i <= $cmt->rating ? 'icofont-star' : ''); ?>"></i>
                                                   <?php endfor; ?>
                                                <em><?php echo e($cmt->rating); ?>/5.0</em>
                                            </td>
                                            <td><?php echo e($cmt->created_at); ?></td>
                                            <td>
                                                <?php if($cmt->active == 1): ?>
                                                    <a href="<?php echo e(route('inactiveCMT', $cmt->id)); ?>"><span class="badge bg-success">Hiển thị</span></a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('activeCMT', $cmt->id)); ?>"><span class="badge bg-danger">Ẩn</span></a>
                                                <?php endif; ?>
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/productCMT/list.blade.php ENDPATH**/ ?>