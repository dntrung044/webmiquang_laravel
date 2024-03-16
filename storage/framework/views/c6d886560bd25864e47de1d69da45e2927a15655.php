<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/teamplate/admin/assets/css/select2.min.css')); ?>">
    <style>
        #active_2 * {
            border-radius: 15px;
            background-color: red;
        }

        .select2-container--default .select2-results__option[data-class="bg-success"] {
            background-color: #28a745;
            color: #fff;
        }

        .select2-container--default .select2-results__option[data-class="bg-danger"] {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
<?php $__env->stopSection(); ?>

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
                        <div id="success_message"></div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Thông tin</th>
                                        <th>Vai trò</th>
                                        <th>Cấp bậc</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->id); ?></td>
                                            <td>
                                                <li><?php echo e($user->name); ?></li>
                                                <li><?php echo e($user->email); ?></li>
                                                <li><?php echo e($user->phone); ?></li>
                                                <li><?php echo e($user->address); ?></li>
                                            </td>
                                            <td>
                                                <select class="form-select custom-select roles-select">
                                                    <option value="" <?php echo e($user->roles->isEmpty() ? 'selected' : ''); ?>>
                                                        Chọn vai trò
                                                    </option>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->id); ?>"
                                                            <?php echo e($user->roles->contains('id', $role->id) ? 'selected' : ''); ?>>
                                                            <?php echo e($role->name); ?> (<?php echo e($role->description); ?>)
                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>

                                            <td>
                                                <select class="form-select custom-select level-select">
                                                    <option value="1" <?php echo e($user->level == 1 ? 'selected' : ''); ?>>
                                                        Quản trị
                                                    </option>
                                                    <option value="0" <?php echo e($user->level != 1 ? 'selected' : ''); ?>>
                                                        Người dùng
                                                    </option>
                                                </select>
                                            </td>

                                            <td>
                                                <select class="form-select custom-select  active-select">
                                                    <option value="1" <?php echo e($user->active == 1 ? 'selected' : ''); ?>>
                                                        <span class="badge bg-success">
                                                            Hoạt động
                                                        </span>
                                                    </option>

                                                    <option value="0" <?php echo e($user->active != 1 ? 'selected' : ''); ?>>
                                                        <span class="badge bg-danger">
                                                            Tắt hoạt động
                                                        </span>
                                                    </option>
                                                </select>
                                            </td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" value="<?php echo e($user->id); ?>"
                                                        class="btn btn-outline-secondary btn_save">
                                                        <i class="icofont-save text-success"></i>
                                                    </button>

                                                    <button type="button" value="<?php echo e($user->id); ?>"
                                                        class="btn btn-outline-secondary btn_delete">
                                                        <i class="icofont-ui-delete text-danger"></i>
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

            <?php echo $__env->make('admin.user.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.user.edit1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('/teamplate/admin/js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.custom-select').select2(); // Áp dụng Select2 cho dropdown

            $('.btn_save').on('click', function(e) {
                e.preventDefault();
                var id = $(this).val();
                var selectedRole = $(this).closest('tr').find('.roles-select').val();
                var selectedLevel = $(this).closest('tr').find('.level-select').val();
                var selectedActive = $(this).closest('tr').find('.active-select').val();
                var url = '<?php echo e(route('members.update', ':id')); ?>';
                url = url.replace(':id', id);

                $.ajax({
                    type: 'POST',
                    url:url,
                    data: {
                        selectedRole: selectedRole,
                        selectedLevel: selectedLevel,
                        selectedActive: selectedActive
                    },
                    success: function(response) {
                        console.log('Dữ liệu đã được cập nhật thành công');
                        $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            location.reload();
                    },
                    error: function(error) {
                        console.error('Có lỗi xảy ra khi cập nhật dữ liệu');
                    }
                });
            });

            $('.btn_delete').on('click', function(e) {
                var id = $(this).val();
                $('#delete_modal').modal('show');
                $('#deleteing_id').val(id);
            });

            $('.delete_data').on('click', function(e) {
                e.preventDefault();

                $(this).text('Đang xóa..');
                var id = $('#deleteing_id').val();
                var url = '<?php echo e(route('members.destroy', ':id')); ?>';
                url = url.replace(':id', id);

                $.ajax({
                    type: "DELETE",
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                            $('.delete_data').text('Có Xóa');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_data').text('Có Xóa');
                            $('#delete_modal').modal('hide');
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/user/list.blade.php ENDPATH**/ ?>