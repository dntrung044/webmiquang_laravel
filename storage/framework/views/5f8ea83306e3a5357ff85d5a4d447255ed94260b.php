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
                                                <select style="background: #ebebeb;" class="form-select choose district"
                                                    name="district" id="district">
                                                    <?php if(!empty(Auth::user()->district)): ?>
                                                        <option value="<?php echo e(Auth::user()->district); ?>">
                                                            <?php echo e(Auth::user()->district); ?>

                                                        </option>
                                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($d->name); ?>">
                                                            <?php echo e($d->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <option value="">Chọn quận/huyện</option>
                                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($d->name); ?>">
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
                                                <select style="background: #ebebeb;" class="form-select ward calculate_ship"
                                                    name="ward" id="ward">
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
                                        <input class="form-control" name="street" value="<?php echo e(Auth::user()->street); ?>">
                                    </div>
                                </div>

                                <?php if(Auth::user()->fee == 0): ?>
                                    <input type="hidden" id="fee"  name="fee" value="15000">
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var district_name = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'district') {
                    result = 'ward'
                }

                $.ajax({
                    url: '<?php echo e(url('/tai-khoan/load_address')); ?>',
                    method: 'POST',
                    data: {
                        action: action,
                        district_name: district_name,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data.html); // Đặt HTML vào phần tử <select>
                    }
                });
            });


            $('.calculate_ship').on('change', function() {
                var district = $('.district').val();
                var ward = $('.ward').val();

                $.ajax({
                    url: '<?php echo e(url('/tai-khoan/calculate_ship')); ?>',
                    method: 'POST',
                    data: {
                        district: district,
                        ward: ward,
                    },
                    success: function(response) {
                        if (response.status == 400) {
                            $('#fee').html("");
                            $('#fee').val(response.nodata);
                        } else {
                            $('#fee').html("");
                            $('#fee').val(response.fee);
                        }
                    }
                });

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/User/user/editInformation.blade.php ENDPATH**/ ?>