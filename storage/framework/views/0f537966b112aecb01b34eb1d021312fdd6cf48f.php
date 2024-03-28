<?php $__env->startSection('head'); ?>
    
    <link rel="stylesheet" href="teamplate/js/RangeSlider/jQuery.UI.css" type="text/css" media="all" />
    
    <style>
        /* Nút Để Mở Chatbox */
        .nut-mo-chatbox {
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 32px;
        }
        /* Ẩn chatbox mặc định */
        .Chatbox {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }
        /* Thêm style cho form */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* thiết lập style textarea */
        .form-container textarea {
            width: 100%;
            padding: 5px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            resize: none;
            min-height: 100px;
        }

        /*thiết lập style cho textarea khi được focus */
        .form-container textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Sthiết lập style cho nút trong form*/
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Thiết lập màu nền cho nút đóng */
        .form-container .btnClose {
            background-color: red;
            color: white;
            padding: 3px 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin: 5px;
            margin-bottom:10px;
            opacity: 0.8;
        }
        .form-container .btnClose:hover {
            background-color: rgb(196, 12, 12) !important;
            color:white;
        }
        /* Thêm hiệu ứng hover cho nút*/
        .form-container .btn:hover,
        .nut-mo-chatbox:hover {
            opacity: 1;
            background-color: #f8da45;
        }
    </style>
    
    <style>
        .cart_right {
            width: 50px;
            height: 50px;
            background: #9d770f;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        .cart_right i {
            font-size: 25px;
            color: white;
        }

        .cart_right:before {
            content: attr(data-totalitems);
            font-size: 12px;
            font-weight: 600;
            position: absolute;
            top: -12px;
            right: -12px;
            background: #2bd156;
            line-height: 24px;
            padding: 0 5px;
            height: 24px;
            min-width: 24px;
            color: white;
            text-align: center;
            border-radius: 24px;
        }

        .cart_right.shake {
            animation: shakeCart 0.4s ease-in-out forwards;
        }
        @keyframes  shakeCart {
            25% {
                transform: translateX(6px);
            }

            50% {
                transform: translateX(-4px);
            }

            75% {
                transform: translateX(2px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="pattern_2">
        <div class="hero_single inner_pages background-image"
            data-background="url(https://monquang.com.vn/medias/user_files/images/1/2019-04-25-222510banh-trang-cuon-thit-heo.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1><?php echo e($title); ?></h1><br>
                            <p> Tùy theo khu vực và từng cơ sở mà menu có thể khác nhau và giá cả có thể chênh
                                lệch so với website từ 5.000 – 10.000đ.
                                <br>Mong bạn thông cảm vì sự bất tiện này.
                            </p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <div class="pattern_2">
            <div class="container margin_60_40" data-cue="slideInUp">
                <div class="tabs_menu add_bottom_25">
                    <ul class="nav nav-tabs" role="tablist">
                        
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item" <?php echo e($loop->first ? 'active' : ''); ?>>
                                <a id="tab-<?php echo e($category->id); ?>" href="#pane-<?php echo e($category->id); ?>" class="nav-link"
                                    data-toggle="tab" role="tab">
                                    <?php echo e($category->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <div class="tab-content add_bottom_25" role="tablist">
                        
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="pane-<?php echo e($category->id); ?>" class="card tab-pane fade show <?php echo e($loop->first ? 'active' : ''); ?>"
                                role="tabpanel" aria-labelledby="tab-<?php echo e($category->id); ?>">
                                <div class="card-header" role="tab" id="heading-<?php echo e($category->id); ?>">
                                    <h5 class="mb-0">
                                        <a class="" data-toggle="collapse" href="#collapse-<?php echo e($category->id); ?>"  aria-expanded="true" aria-controls="collapse-<?php echo e($category->id); ?>">
                                            <?php echo e($category->name); ?>

                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-<?php echo e($category->id); ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo e($category->id); ?>">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row small-gutters">
                                                
                                                <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $age = 0;
                                                        if ($product->total_rating) {
                                                            $age = round($product->total_number / $product->total_rating, 2);
                                                        }
                                                    ?>
                                                    <div class="col-6 col-md-4 col-xl-4">
                                                        <div class="grid_item">
                                                            <figure>
                                                                <a href="<?php echo e('thuc-don/' . $product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>">
                                                                    <img class="img-fluid lazy" src="<?php echo e($product->thumb); ?>" data-src="<?php echo e($product->thumb); ?>" alt="">
                                                                </a>
                                                                <div class="add_cart">
                                                                    <span class="btn_1" style="height: 30px">
                                                                        <button type="button" class="add-to-cart" data-id="<?php echo e($product->id); ?>">
                                                                            Thêm giỏ hàng
                                                                        </button>
                                                                    </span>
                                                                    <span class="btn_1" style="margin-left: 15px; height: 30px">
                                                                        <a href="<?php echo e('thuc-don/' . $product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>" style="color: #f8f8f8;text-decoration: none;">
                                                                            Xem chi tiết
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </figure>

                                                            <div class="rating">
                                                                <?php for($i = 0; $i < 5; $i++): ?>
                                                                    <i
                                                                        class="icon_star <?php echo e($age <= $i ? 'voted' : ''); ?>  "></i>
                                                                <?php endfor; ?>

                                                                <em><?php echo e($product->total_rating); ?> Đánh giá</em>
                                                            </div>
                                                            <a href="<?php echo e('thuc-don/' . $product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>">
                                                                <h3><?php echo e($product->name); ?></h3>
                                                            </a>
                                                            <div class="price_box">
                                                                <span class="new_price"><?php echo e(number_format($product->price_sale, 0, '', '.')); ?>đ</span>
                                                                <span class="old_price"><?php echo e(number_format($product->price, 0, '', '.')); ?>đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /card-body -->
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- /tab -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_menu-->
            </div>
            <!-- /container -->
        </div>
    </main>
    <?php
        $total = 0;
        $acount = 0;
    ?>
    <div class="Chatbox" id="myForm">
        <?php echo $__env->make('user.products.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="nut-mo-chatbox cart_right" onclick="moForm()" id="cart" data-total_items="<?php echo e($acount); ?>">
        <span aria-hidden="true" class="icon_cart" style="font-size: 25px;"></span>
    </div>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        /*Hàm Mở Form*/
        function moForm() {
            document.getElementById("myForm").style.display = "block";
        }
        /*Hàm Đóng Form*/
        function dongForm() {
            document.getElementById("myForm").style.display = "none";
        }

        $(document).ready(function() {
            $('.add-to-cart').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var cart = $('#cart');
                var cart_total = cart.attr('data-total_items');
                var new_art_total = parseInt(cart_total) + 1;

                $.ajax({
                    url: '<?php echo e(route('menus.add_to_cart')); ?>',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        product_id: id,
                    },
                    success: function() {
                        if (data.code === 200) {
                            Swal({
                                type: 'success',
                                title: "Đã thêm vào giỏ hàng!",
                                showConfirmButton: false,
                                timer: 1500
                        }).then(function () {
                            $('#cart-list').html(data.cart_component);
                            cart.addClass('shake').attr('data-totalitems', new_art_total);
                            setTimeout(function() {
                                cart.removeClass('shake');
                            }, 1000)
                            });
                        } else{
                            Swal({
                                type: 'error',
                                title: "Thêm vào giỏ hàng lỗi!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function (error) {
                        // Xử lý lỗi (nếu có)
                        console.log(error);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/User/products/list.blade.php ENDPATH**/ ?>