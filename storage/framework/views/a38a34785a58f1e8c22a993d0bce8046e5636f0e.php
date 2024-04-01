<?php $__env->startSection('content'); ?>
    <main class="pattern_2">
        <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/tintuc.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1><?php echo e($title); ?></h1> <br>
                            <ul>
                                <li style="display: inline-block;
                                    position: relative;
                                    padding: 0 16px 0 23px;">
                                    <a href="/" title="">Trang chủ</a>
                                </li>/
                                <li style="display: inline-block; position: relative;padding: 0 16px 0 23px;">
                                    <span>Thủ tục thanh toán</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="container">
            <form action="" method="POST">
                <div class="row justify-content-center">

                    <div class="col-xl-6 mb-5 col-lg-8">
                        <!-- Chi tiết hóa đơn -->
                        <div class="box_booking">
                            <div class="head">
                                <div class="title">
                                    <h3>Chi tiết hóa đơn</h3>
                                </div>
                            </div>
                            <!-- /head -->
                            <?php
                                $total = 0;
                                $acount = 0;
                            ?>
                            <div class="main">
                                <ul class="clearfix">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                            $priceEnd = $price * $carts[$product->id];
                                            $acount += $carts[$product->id];
                                            $total += $priceEnd;
                                        ?>
                                        <li>
                                            <?php echo e($product->name); ?> :
                                            <strong> <?php echo e($carts[$product->id]); ?> phần</strong>
                                            <span><?php echo e(number_format($price, 0, '', '.')); ?>đ</span>
                                        </li>
                                        <hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <li>Tổng tiền giỏ hàng<span><?php echo e(number_format($total, 0, '', '.')); ?>đ</span></li>

                                   
                                    <li>
                                        Phí giao hàng
                                        <?php
                                        $feeship = 30000;
                                        if ($acount <=  3) {
                                            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee : $feeship;
                                        } elseif ($acount <=  7) {
                                            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 5000 : $feeship + 5000;
                                        } elseif ($acount > 10) {
                                            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 10000 : $feeship + 10000;
                                        }

                                            $total_feeship = (int)$total + (int)$feeship;
                                        ?>
                                        <span><?php echo e(number_format($feeship, 0, '', '.')); ?>đ</span>

                                        
                                        
                                        <?php
                                        if (empty(Auth::user()->fee)) {
                                            if (empty(Auth::user())) {
                                                echo '(
                                                <a href="/dang-nhap" style="color: #f8da45;" >
                                                    Thêm vào địa chỉ
                                                </a>để được giảm phí giao hàng )';
                                            } else {
                                                    echo '(
                                                    <a href="/tai-khoan/thay-doi-thong-tin/' .
                                                        Auth::user()->id .
                                                        '" style="color: #f8da45;" >
                                                        Thêm vào địa chỉ
                                                    </a>để được giảm phí giao hàng )';
                                                }
                                            }
                                        ?>
                                    </li>
                                        
                                    <li>
                                        <?php if(!empty(Session::get('coupon'))): ?>
                                            <?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($cou['condition']==1): ?>
                                                Mã giảm giá: (-<?php echo e($cou['number']); ?> %)
                                                <span>
                                                    <?php
                                                        $total_coupon = ((int)$total * (int)$cou['number'])/100;
                                                        echo '<span name="coupon">-'.number_format($total_coupon, 0, '', '.') .'đ</span>';
                                                        $total_coupon_after = (int)$total_feeship - (int)$total_coupon;
                                                    ?>
                                                </span>

                                                <?php elseif($cou['condition']==2): ?>
                                                    Mã giảm giá:  <span name="coupon">-<?php echo e(number_format($cou['number'], 0, '', '.')); ?>đ</span>
                                                    <span>
                                                        <?php
                                                            $total_coupon = $cou['number'];
                                                            // echo '<p>Số tiền sau giảm: '.number_format($total_coupon, 0, '', '.') .'đ</p>';

                                                            $total_coupon_after = (int)$total_feeship - (int)$total_coupon;
                                                        ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name="coupon" id="coupon" value="<?php echo e($cou['number']); ?>">
                                        <?php endif; ?>
                                    </li>
                                    <?php
                                        if(Session::get('fee') && !Session::get('coupon')) {
                                            $total_after = $total_feeship;
                                        }elseif(!Session::get('fee') && Session::get('coupon')) {
                                            $total_after = $total_coupon_after;
                                        }elseif(Session::get('fee') && Session::get('coupon')) {
                                            $total_after = $total_coupon_after;
                                        }elseif(!Session::get('fee') && !Session::get('coupon')) {
                                            $total_after =  $total_feeship;
                                        }
                                    ?>
                                    <hr>
                                    <li class="total">TỔNG TIỀN THANH TOÁN
                                        <span><?php echo e(number_format($total_after, 0, '', '.')); ?>đ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Chi tiết thanh toán -->
                        <div class="box_booking">
                            <div class="head">
                                <div class="title">
                                    <h3>Chi tiết thanh toán</h3>
                                </div>
                            </div>

                            <div class="main">
                                <!-- day -->
                                <div class="dropdown day">
                                    <a href="#" data-toggle="dropdown">
                                        Ngày : <span id="selected_day">Chọn ngày</span></a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-content">
                                            <h4>Giao hàng vào ngày nào?</h4>
                                            <div class="radio_select chose_day">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="day_1" name="day" value="hôm nay" required>
                                                        <label for="day_1">Hôm nay</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="day_2" name="day" value="ngày mai" required>
                                                        <label for="day_2">Ngày mai</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /people_select -->
                                        </div>
                                    </div>
                                </div>
                                <!-- time -->
                                <div class="dropdown time">
                                    <a href="#" data-toggle="dropdown">
                                        Thời gian :<span id="selected_time">Chọn thời gian</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-content">
                                            <h4>Bửa trưa</h4>
                                            <div class="radio_select add_bottom_15">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="time_1" name="time"
                                                        value="10:30">
                                                        <label for="time_1">10:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_2" name="time"
                                                        value="11:00">
                                                        <label for="time_2">11:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_3" name="time"
                                                        value="11:30">
                                                        <label for="time_3">11:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_4" name="time" value="12:00">
                                                        <label for="time_4">Sau 12:00</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /time_select -->
                                            <h4>Bữa tối</h4>
                                            <div class="radio_select">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="time_5" name="time"
                                                        value="18:00">
                                                        <label for="time_5">18:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_6" name="time"
                                                        value="18:30">
                                                        <label for="time_6">18:30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_7" name="time"
                                                        value="19:00">
                                                        <label for="time_7">19:00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_8" name="time"
                                                        value="19:30">
                                                        <label for="time_7">Sau 19:30</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /time_select -->
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label>Nội dung:</label>
                                    <textarea cols="30" rows="10" style="margin-bottom: 10px" class="form-control" name="content"
                                        placeholder="Nội dung ghi chú (Có thể trống) "></textarea>
                                </div>
                                <hr>
                                <!-- payment  -->
                                <div class="payment_select" id="counter">
                                    <label class="container_radio">Thanh toán tại quầy
                                        <input type="radio" value="counter_payment" name="payment_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="payment_select" id="receipt">
                                    <label class="container_radio">Thanh toán khi nhận hàng
                                        <input type="radio" value="later_payment" name="payment_type" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                    <i class="icon_wallet"></i>
                                </div>

                                <div class="payment_select" id="Bank">
                                    <label class="container_radio">Thanh toán trực tuyến
                                        <input type="radio" value="online_payment" name="payment_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <button type="submit" class="btn_1 full-width">Hoàn tất đặt hàng</button>
                            </div>
                        </div>
                    </div>

                    <!-- Thông tin người đặt -->
                    <div class="col-xl-4 mb-5 col-lg-4" id="sidebar_fixed">
                        <div class="box_booking_2 style_2">
                            <div class="head">
                                <h3>Thông tin người đặt</h3>
                            </div>
                            <!-- /head -->

                            <div class="main">
                                <input type="hidden" name="total_item" id="total_item" value="<?php echo e($acount); ?>">
                                <input type="hidden" name="total_price" id="total_price" value="<?php echo e($total_after); ?>">
                                <input type="hidden" name="status" id="status" value="DEFAULT">
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                <div class="row">
                                    <label>Họ tên: </label>
                                    <p name="name"> <?php echo e(Auth::user()->name); ?></p>
                                </div>
                                <div class="row">
                                    <label>Email: </label>
                                    <p name="email"> <?php echo e(Auth::user()->email); ?></p>
                                </div>

                                <div class="row">
                                    <label>Điện thoại: </label>
                                    <p name="phone"> 0<?php echo e(Auth::user()->phone); ?></p>
                                </div>
                                <div class="row">
                                    <label>Địa chỉ: </label>
                                    <p name="address">
                                        <?php echo e(Auth::user()->street); ?>, <?php echo e(Auth::user()->ward); ?>, <?php echo e(!empty(Auth::user()->district) ? Auth::user()->district : 'Thêm địa chỉ để được giảm phí vận chuyển'); ?> </p>
                                </div>

                                <a href="tai-khoan/thay-doi-thong-tin/<?php echo e(Auth::user()->id); ?>" class="btn_1 full-width mb_5">
                                    Chỉnh sửa thông tin
                                </a>
                                
                            </div>
                        </div>

                        <!-- /box_booking -->
                    </div>

                </div>
                <?php echo csrf_field(); ?>
            </form>
        </div>
        <!-- /container -->
    </main>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var district_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'district') {
                    result = 'ward'
                }

                $.ajax({
                    url: '<?php echo e(url('/thanh-toan/load_address')); ?>',
                    method: 'POST',
                    data: {
                        action: action,
                        district_id: district_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>

    <script>
        $(document).ready(function() {

            $('.calculate_ship').click(function() {

            var district = $('.district').val();
            var ward = $('.ward').val();
            var _token = $('input[name="_token"]').val();

            if(district == '' && ward == '' ) {
                alert('Bạn chưa chọn đủ thông tin để tính phí vận chuyển');
            } else {
                $.ajax({
                    url : '<?php echo e(url('/thanh-toan/calculate_ship')); ?>',
                    method : 'POST',
                    data: {district:district, ward:ward,_token:_token},
                    success:function(data) {
                    alert("Tinh phí vận chuyển thành công");
                    // alert()->success('Tinh phí vận chuyển thành công!', 'dsa');
                    }
                });
            }
            });
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/checkout/index.blade.php ENDPATH**/ ?>