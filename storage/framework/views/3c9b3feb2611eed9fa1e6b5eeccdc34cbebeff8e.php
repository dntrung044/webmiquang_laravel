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
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Phí vận chuyển</label>
                            <input type="number" name="feeship" value="<?php echo e(old('feeship')); ?>" class="form-control feeship"
                                placeholder="Phí vận chuyển">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Quận/huyện: </label>
                                <select class="form-select choose district" name="district_id" id="district">
                                    <option value="">Chọn quận/huyện</option>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phường/xã: </label>
                                <select class="form-select ward" name="ward_id" id="ward">
                                    <option value="">Chọn phường/xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo e(route('feeships.index')); ?>" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary">Thêm Phí Ship</button>
                        </div>
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var id = $(this).attr('id');
                var district_id = $(this).val();
                var result = '';

                if (id == 'district') {
                    result = 'ward'
                }

                $.ajax({
                    url: '<?php echo e(url('/admin/transactions/feeships/load_address')); ?>',
                    method: 'POST',
                    data: {
                        action: id,
                        district_id: district_id,
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#' + result).html(data.html); // Đặt HTML vào phần tử <select>
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

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/feeship/add.blade.php ENDPATH**/ ?>