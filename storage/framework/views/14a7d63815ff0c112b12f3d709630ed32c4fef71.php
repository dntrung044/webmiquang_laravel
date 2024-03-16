<?php $__env->startSection('content'); ?>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> <?php echo e($title); ?></h3>

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
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Hiện thị</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($menu->id); ?></td>
                                            <td><?php echo e($menu->name); ?></td>
                                            <td><?php echo e($menu->description); ?></td>
                                            <td>
                                                <a href="<?php echo e($menu->thumb); ?>" target="_blank">
                                                    <img src="<?php echo e($menu->thumb); ?>" style="height:100px;" >
                                                </a>
                                            </td>
                                            <td><?php echo \App\Helpers\Helper::active($menu->active); ?></td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                        href="<?php echo e(route('banners.edit', ['menu'=> $menu->id ])); ?>">
                                                        <i class="icofont-edit text-success"></i>
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/menu/list.blade.php ENDPATH**/ ?>