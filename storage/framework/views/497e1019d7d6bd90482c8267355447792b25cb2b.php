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

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh</label>
                            <input class="form-control" type="file" id="upload" name="file" multiple="">

                            <div id="image_show">
                                <a href="<?php echo e($gallery->thumb); ?>">
                                    <img src="<?php echo e($gallery->thumb); ?>" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="<?php echo e($gallery->thumb); ?>" id="thumb">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active"
                                    <?php echo e($gallery->active == 1 ? 'checked' : ''); ?>>
                                <label for="active">Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active"
                                    <?php echo e($gallery->active == 0 ? 'checked' : ''); ?>>
                                <label for="no_active">Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="<?php echo e(route('galleries.index')); ?>"><button type="button" class="btn btn-secondary">Hủy</button></a>
                            <button type="submit" class="btn btn-primary">Cập nhật hình ảnh</button>
                        </div>
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/gallery/edit.blade.php ENDPATH**/ ?>