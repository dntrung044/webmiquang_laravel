


<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade active show" id="Invoice-Simple">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="card p-xl-5 p-lg-4 p-0">
                    <div class="card-body">
                        <div class="mb-3 pb-3 border-bottom">
                            Hóa đơn
                            <strong><?php echo e(date('d/m/Y-H:m', strtotime($transaction->created_at))); ?></strong>
                            
                            <span class="float-end"> <strong>Tình trạng:</strong>
                                <?php echo e($transaction->status == 1 ? 'Đã giao' : 'Chưa giao'); ?></span>
                        </div>

                        <div class="row mb-4">
                            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6">
                                <h6 class="mb-3">Từ: </h6>
                                <div>Cửa hàng: <strong>Mì Quảng Bà Mua</strong></div>
                                <div>Địa chỉ: <?php echo $about->address; ?></div>
                                <div>Email: <?php echo e($about->email); ?></div>
                                <div>Số điện thoại: <?php echo e($about->phone); ?></div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <div class="col-sm-6">
                                <h6 class="mb-3">Đến:</h6>
                                <div> Tên khách hàng:<strong> <?php echo e($transaction->user->name); ?></strong></div>
                                <div>Địa chỉ:<strong><?php echo e($transaction->user->street); ?>,
                                    <?php echo e($transaction->user->ward); ?>, <?php echo e($transaction->user->district); ?>

                                </strong></div>
                                <div>Email: <strong><?php echo e($transaction->user->email); ?></strong></div>
                                <div>Số điện thoại: <strong><?php echo e($transaction->user->phone); ?></strong></div>
                                <div>Ghi chú: <strong><?php echo e($transaction->content); ?></strong></div>
                            </div>
                        </div> <!-- Row end  -->

                        <div class="table-responsive-sm">
                            <?php
                            $total = 0;
                            $ship = 10000;
                            $totalss=0
                             ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Ảnh</th>
                                        <th>Đồ uống</th>
                                        <th class="text-end">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-end">TẤT CẢ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $price = $cart->total_price * $cart->total_item;
                                            $total += $price;
                                            $totalss = $total + $ship;
                                        ?>
                                        <tr>

                                            <td class="text-center"><?php echo e($cart->id); ?></td>
                                                
                                            <td><img src="<?php echo e($cart->product->thumb); ?>" alt="IMG" style="width: 100px"></td>
                                            <td><?php echo e($cart->product->name); ?></td>
                                            <td class="text-end"><?php echo e(number_format($cart->total_price, 0, '', '.')); ?>đ</td>
                                            <td class="text-center"><?php echo e($cart->total_item); ?></td>
                                            <td class="text-end"><?php echo e(number_format($price, 0, '', '.')); ?>đ</td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5">

                            </div>

                            <div class="col-lg-6 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td><strong>Tổng phụ</strong></td>
                                            <td class="text-end"><?php echo e(number_format($total, 0, '', '.')); ?>đ</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phí ship</strong></td>
                                            <td class="text-end"> <?php echo e($ship); ?> đ</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Thành tiền</strong></td>
                                            <td class="text-end">
                                                <strong><?php echo e(number_format($totalss, 0, '', '.')); ?>đ</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Row end  -->

                        <div class="row">
                            
                            <div class="col-lg-12 text-end">

                                <button type="button" class="btn btn-outline-secondary btn-lg my-1">
                                    <i class="fa fa-print"></i>
                                    <a href="<?php echo e(route('transactions.detail', $transaction->id)); ?>?download=true">Tải xuống</a>
                                </button>

                                


                                <button type="button" class="btn btn-primary btn-lg my-1">
                                    <i class="fa fa-paper-plane-o"></i>Gửi hóa đơn
                                </button>
                            </div>
                        </div>
                        <!-- Row end  -->
                    </div>

                </div>
            </div>
        </div> <!-- Row end  -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="teamplate/admin/assets/app.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/transactions/detail.blade.php ENDPATH**/ ?>