<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
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
                            <a href="<?php echo e(route('posts.add')); ?>">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100">
                                    <i class="icofont-plus-circle me-2 fs-6"></i>Thêm danh mục
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Hình</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($post->id); ?></td>
                                            <td><?php echo e($post->name); ?></td>
                                            <td><?php echo e($post->description); ?></td>
                                            <td>
                                                <a href="<?php echo e($post->thumb); ?>" target="_blank">
                                                    <img src="<?php echo e($post->thumb); ?>" style="height: 100px">
                                                </a>
                                            </td>

                                            <td><?php echo e(!empty($post->postCategory) ? $post->postCategory->name : ''); ?></td>
                                            <td><?php echo \App\Helpers\Helper::active($post->active); ?></td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <a href="<?php echo e(route('posts.edit', ['post'=>  $post->id])); ?> "
                                                        class="btn btn-outline-secondary">
                                                        <button class="btn btn-primary btn-sm"  type="button">
                                                            <i class="icofont-edit text-success"></i>
                                                        </button>
                                                    </a>

                                                    <a href="#" class="btn btn-outline-secondary"
                                                        onclick="removeRow(<?php echo e($post->id); ?>, '<?php echo e(route('posts.destroy')); ?>')">
                                                        <button type="button" class="btn btn-warning btn-sm" >
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/blog/list.blade.php ENDPATH**/ ?>