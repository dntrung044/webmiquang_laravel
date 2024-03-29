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
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quận/Huyện</label>
                                        <select class="form-select choose district" name="district_id" id="district">
                                            <option value=" <?php echo e($feeship->district->id); ?>">
                                                <?php echo e($feeship->district->name); ?>

                                            </option>
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($d->id); ?>">
                                                    <?php echo e($d->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 ml-20">
                                    <div class="form-group">
                                        <label>Xã/Phường</label>
                                        <select class="form-select ward" name="ward_id" id="ward">
                                            <option value="<?php echo e($feeship->ward->id); ?>">
                                                <?php echo e($feeship->ward->name); ?>

                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Phí vận chuyển:</label>
                                <input type="number" name="feeship"
                                    value="<?php echo e($feeship->feeship); ?>" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="<?php echo e(route('feeships.index')); ?>"><button type="button"
                                    class="btn btn-secondary">Hủy</button></a>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var district_id = $(this).val();
                var result = '';

                if (action == 'district') {
                    result = 'ward'
                }

                $.ajax({
                    url: '<?php echo e(url('/admin/transactions/feeships/load_address')); ?>',
                    method: 'POST',
                    data: {
                        action: action,
                        district_id: district_id,
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#' + result).html(data.html);
                    }
                });
            });

            $('.ward ').on('change', function() {
                var districtSelect = $('.district');
                var feeshipInput = $('input[name="feeship"]');
                var selectedDistrict = districtSelect.val();
                updateFeeship(selectedDistrict, feeshipInput);
            });

            function updateFeeship(selectedDistrict, feeshipInput) {
                switch (selectedDistrict) {
                    case '2':
                        feeshipInput.val(25000);
                        break;
                    case '2':
                        feeshipInput.val(15000);
                        break;
                    case '3':
                        feeshipInput.val(10000);
                        break;
                    case '4':
                        feeshipInput.val(20000);
                        break;
                    case '5':
                        feeshipInput.val(30000);
                        break;
                    case '6':
                        feeshipInput.val(28000);
                        break;
                    case '7':
                        feeshipInput.val(45000);
                        break;
                    default:
                        feeshipInput.val('40000');
                        break;
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/feeship/edit.blade.php ENDPATH**/ ?>