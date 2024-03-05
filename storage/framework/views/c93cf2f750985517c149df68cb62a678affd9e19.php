<!-- Add Permission-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold"> Thêm quyền</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Tên quyền:</label>
                        <select class="form-select choose name">
                            <option selected="">Chọn phân quyền danh mục</option>
                            <?php $__currentLoopData = $permissioncats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionCatItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($permissionCatItem->name); ?>"><?php echo e($permissionCatItem->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mô tả tên quyền</label>
                        <input type="text" class="form-control description" placeholder="Nhập mô tả">
                    </div>
                </div>

                

                <div class="mt-2">
                    <div class="form-group">
                        <label class="form-label">Chức năng</label>
                        <div class="row">
                            <?php $__currentLoopData = config('permissions.module_childrent'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionCatItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 parent_id" name="parent_id" id="parent_id">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" class="checkbox_functions" name="checkbox_functions[]" value="<?php echo e($permissionCatItem); ?>">
                                    <?php echo e($permissionCatItem); ?>

                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <label class="fancy-checkbox" style="font-size: 18px; text-align: center;color: rgb(0, 0, 0); margin-top: 10px;">
                                <input type="checkbox" id="function-all">
                                <span>Tất cả</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                <button type="button" class="btn btn-primary" id="add_data">Tạo</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/permission/add.blade.php ENDPATH**/ ?>