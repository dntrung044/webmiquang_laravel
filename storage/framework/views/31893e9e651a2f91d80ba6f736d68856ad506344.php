<?php $__env->startSection('content'); ?>
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    <h6 class="m-0 fw-bold">Thống kê</h6>
                </div>
                <div class="card-body" style="position: relative;">
                    <div
                        class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 row-cols-xxl-4">
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-binary fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Tổng số hóa đơn</h6>
                                        <span class="text-white"><?php echo e($order_count); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-spoon-and-fork fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Tổng số món </h6>
                                        <span class="text-white"><?php echo e($product_count); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-livejournal fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Tổng số bài viết</h6>
                                        <span class="text-white"><?php echo e($post_count); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-users fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Tổng số người dùng</h6>
                                        <span class="text-white"><?php echo e($acc_count); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Thông tin mới</h3>
                    </div>
                </div>
            </div>

            <div class="row clearfix  g-2">
                <div class="col-lg-12 col-md-12 flex-column">
                    <div class="row g-2 row-deck">

                        <div class="col-md-12 col-lg-5 col-xl-6 col-xxl-6">
                            <div class="card">
                                <div class="d-flex align-items-center justify-content-between mt-5">
                                    <div class="lesson_name">
                                        <div class="project-block bg-lightgreen">
                                            <i class="icofont-ui-messaging"></i>
                                        </div>
                                        <h6 class="project_name fw-bold"> Thông tin liên hệ mới nhất </h6>
                                    </div>
                                </div>

                                <div class="card-body mem-list">
                                    <div class="progress_task">
                                        <?php $__currentLoopData = $contactNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cnew): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="fade show alert-light">
                                                <div class="toast-header  bg-primary text-light">
                                                    <img class="avatar rounded-circle"
                                                        src="<?php echo e(asset('teamplate/admin/assets/images/xs/avatar4.jpg')); ?>" alt="">
                                                    <div class="flex-fill ms-3 text-truncate">
                                                        <h6 class="d-flex justify-content-between mb-0">
                                                            <span class="badge alert-primary text-end">
                                                                <?php echo e($cnew->name); ?>

                                                            </span>
                                                        </h6>
                                                        <a href="mailto: <?php echo e($cnew->email); ?>">
                                                            <i class="icofont-email"></i>
                                                            <span class="ms-1">0<?php echo e($cnew->email); ?></span>
                                                            <a href=""><i class="icofont-reply"></i></a>
                                                        </a>
                                                        <h2>
                                                            <a href="tel:+ 0<?php echo e($cnew->phone); ?>">
                                                                <i class="icofont-ui-dial-phone"></i>
                                                                <span class="ms-1">0<?php echo e($cnew->phone); ?></span>
                                                                <i class="icofont-reply"></i>
                                                            </a>
                                                        </h2>
                                                        <div class="text-end">
                                                            <i class="icofont-clock-time"></i>
                                                            <span class="ms-1">
                                                                <?php echo e($cnew->created_at); ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="toast-body alert-info">
                                                    <p class="py-2 mb-0 ">
                                                        <i class="icofont-ui-text-chat"></i>
                                                        <?php echo e($cnew->content); ?>

                                                    </p>
                                                </div>
                                            </div>

                                            <div class="tikit-info row g-3 align-items-center">
                                                <div class="col-sm">
                                                    <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                        <li>
                                                            <div class="d-flex align-items-center ">
                                                                <?php if($cnew->status == 1): ?>
                                                                    <div role="alert" class="text-success">

                                                                        <h5 class="alert-link">
                                                                            <i class="icofont-checked"></i>
                                                                            <span class="ms-1">Đã được xử
                                                                                lý.</span>
                                                                        </h5>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div role="alert" class="text-warning">
                                                                        <i class="icofont-ban"></i>
                                                                        <a href="<?php echo e(route('admin.activeContact', $cnew->id)); ?>"
                                                                            class="alert-link">
                                                                            <span class="ms-1">Chờ xử lý.</span>
                                                                        </a>
                                                                    </div>

                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-5 col-xl-6 col-xxl-6">
                            <div class="card">
                                <div class="d-flex align-items-center justify-content-between mt-5">
                                    <div class="lesson_name">
                                        <div class="project-block bg-lightgreen">
                                            <i class="icofont-dining-table"></i>
                                        </div>
                                        <h6 class="project_name fw-bold"> Thông tin đặt bàn mới nhất </h6>
                                    </div>
                                </div>
                                <div class="card-body mem-list">
                                    <?php $__currentLoopData = $reservationNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resNew): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="fade show alert-light">
                                            <div class="toast-header bg-primary text-light">
                                                <img class="avatar rounded-circle"
                                                    src="<?php echo e(asset('teamplate/admin/assets/images/xs/avatar4.jpg')); ?>" alt="">
                                                <div class="flex-fill ms-3 text-truncate">
                                                    <h6 class="d-flex justify-content-between mb-0">
                                                        <span class="badge alert-primary text-end">
                                                            <?php echo e($resNew->name); ?>

                                                        </span>
                                                    </h6>
                                                   <a href="mailto: <?php echo e($resNew->email); ?>">
                                                    <i class="icofont-email"></i>
                                                    <span class="ms-1">0<?php echo e($resNew->email); ?></span>
                                                    <a href=""><i class="icofont-reply"></i></a>
                                                   </a>

                                                    <h2>
                                                       <a href="tel:+ 0<?php echo e($resNew->phone); ?>">
                                                        <i class="icofont-ui-dial-phone"></i>
                                                        <span class="ms-1">0<?php echo e($resNew->phone); ?></span>
                                                        <i class="icofont-reply"></i>
                                                       </a>
                                                    </h2>
                                                    <div class="text-end">
                                                        <i class="icofont-clock-time"></i>
                                                        <span class="ms-1">
                                                            <?php echo e($resNew->created_at); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="toast-body alert-info">
                                                <p class="py-2 mb-0 ">
                                                    <i class="icofont-ui-text-chat"></i>
                                                    <?php echo e($resNew->content); ?>

                                                </p>
                                                <p class="py-2 mb-0 ">
                                                    <i class="icofont-people"></i>
                                                    <?php echo e($resNew->people); ?> Người
                                                </p>

                                                <p class="py-2 mb-0 ">
                                                    <i class="icofont-stopwatch"></i>
                                                    <?php echo e($resNew->date); ?> - <?php echo e($resNew->time); ?>

                                                </p>
                                            </div>

                                        </div>
                                        <div class="tikit-info row g-3 align-items-center">
                                            <div class="col-sm">
                                                <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                    <li>
                                                        <div class="d-flex align-items-center">
                                                            <?php if($resNew->status == 1): ?>
                                                                <div role="alert" class="text-success">
                                                                    <h5 class="alert-link">
                                                                        <i class="icofont-checked"></i>
                                                                        <span class="ms-1">Đã được xử
                                                                            lý.</span>
                                                                    </h5>
                                                                </div>
                                                            <?php else: ?>
                                                                <div role="alert" class="text-warning">
                                                                    <i class="icofont-ban"></i>
                                                                    <a href="<?php echo e(route('admin.activeReservation', $resNew->id)); ?>"
                                                                        class="alert-link">
                                                                        <span class="ms-1">Chờ xử lý</span>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <br><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- timeline item end  -->
                                </div>
                            </div> <!-- .card: My Timeline -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungchodie/Documents/WEB/Laravel/untitled folder/webmiquang_laravel/resources/views/admin/home.blade.php ENDPATH**/ ?>