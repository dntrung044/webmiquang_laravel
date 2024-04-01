<?php $__env->startSection('head'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="pattern_2" style="transform: none;">
        <div class="container margin_60_40" style="transform: none;">
            <div class="row justify-content-center" style="transform: none;">
                <div class="col-xl-6 col-lg-8">
                    <div class="box_booking_2 style_2">
                        <div class="head">
                            <div class="title">
                                <h3>Thông tin cá nhân</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <form action="" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="main">
                                <div class="form-group">
                                    <label>Họ và Tên</label>
                                    <input class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>"
                                        placeholder="Nhập họ và tên cần sửa">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Địa chỉ Email</label>
                                            <input class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>"
                                                placeholder="Sửa địa chỉ Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input class="form-control" name="phone" value="<?php echo e(Auth::user()->phone); ?>"
                                                placeholder="Sửa số điện thoại">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Quận/Huyện</label>
                                                <select class="form-select choose district" data-url="<?php echo e(route('account.load_address')); ?>"
                                                name="district" id="district">
                                                    <?php if(!empty(Auth::user()->district)): ?>
                                                        <option value="<?php echo e(Auth::user()->district); ?>">
                                                            <?php echo e(Auth::user()->district); ?>

                                                        </option>
                                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($d->id); ?>">
                                                                <?php echo e($d->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <option value="">Chọn quận/huyện</option>

                                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($d->id); ?>">
                                                                <?php echo e($d->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 ml-20">
                                            <div class="form-group">
                                                <label>Xã/Phường</label>
                                                <select class="form-select ward" name="ward" id="ward">
                                                    <?php if(!empty(Auth::user()->ward)): ?>
                                                        <option value="<?php echo e(Auth::user()->ward); ?>">
                                                            <?php echo e(Auth::user()->ward); ?>

                                                        </option>
                                                    <?php else: ?>
                                                        <option value="">Chọn phường/xã</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Đường, số nhà:</label>
                                        <input type="text" class="form-control" name="street" value="<?php echo e(Auth::user()->street); ?>">
                                    </div>
                                </div>

                                <?php if(Auth::user()->fee == 0): ?>
                                    <input type="hidden" id="fee" name="fee" value="15000">
                                <?php else: ?>
                                    <input type="hidden" name="fee" id="fee" value="<?php echo e(Auth::user()->fee); ?>">
                                <?php endif; ?>

                                <button type="submit" class="btn_1 full-width mb_5">Chỉnh sửa</button>
                            </div>
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /container -->
    </main>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var id = $(this).attr('id');
                var district_id = $(this).val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                var result = '';
                var url = $(this).data('url');

                if (id == 'district') {
                    result = 'ward'
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: _token,
                        action: id,
                        district_id: district_id,
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#' + result).html(data
                        .html); // Đặt HTML vào phần tử <select>
                    }
                });
            });

            $('.ward ').on('change', function() {
                var districtSelect = $('.district');
                var feeshipInput = $('input[name="fee"]');
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

<?php echo $__env->make('User.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/User/user/editInformation.blade.php ENDPATH**/ ?>