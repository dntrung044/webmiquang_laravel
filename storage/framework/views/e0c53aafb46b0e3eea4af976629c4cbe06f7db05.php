<?php $__env->startSection('head'); ?>
    <style>
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 500px;

                .modal-content {
                    padding: 1rem;
                }
            }
        }
        .modal-header {
            .close {
                margin-top: -1.5rem;
            }
        }

        .form-title {
            margin: -2rem 0rem 2rem;
        }

        .btn-round {
            border-radius: 3rem;
        }

        .delimiter {
            padding: 1rem;
        }

        .social-buttons {
            .btn {
                margin: 0 0.5rem 1rem;
            }
        }

        .signup-section {
            padding: 0.3rem 0rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="pattern_2">
        <div class="hero_single inner_pages background-image" data-background="url(<?php echo e($product->thumb); ?>)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1><?php echo e($title); ?></h1> <br>
                            <ul>
                                <li style="display: inline-block;  position: relative;  padding: 0 16px 0 23px;">
                                    <a href="/" title="" style="color: white"><u>Trang chủ</u></a>
                                </li>/
                                <li style="display: inline-block; position: relative; padding: 0 16px 0 23px;">
                                    <a href="/thuc-don" title="" style="color: white"><u>Thực đơn</u></a>
                                </li>/
                                <li style="display: inline-block; position: relative; padding: 0 16px 0 23px;">
                                    <span>Chi tiết sản phẩm</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /Endhero_single -->
        <?php
            $age = 0;
            if ($product->total_rating) {
                $age = round( $product->total_number / $product->total_rating, 2);
            }
        ?>
        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-6 magnific-gallery">
                    <p>
                        <a href="<?php echo e($product->thumb); ?>" title="Photo title" data-effect="mfp-zoom-in">
                            <img src="<?php echo e($product->thumb); ?>" alt="" class="img-fluid">
                        </a>
                    </p>
                </div>
                <div class="col-lg-6" id="sidebar_fixed">
                    <div class="prod_info">
                        <span class="rating">
                            <?php for($i = 0; $i < 5; $i++): ?>
                                <i class="icon_star <?php echo e($age <= $i  ? 'voted' : ''); ?>  "></i>
                            <?php endfor; ?>
                            <em style="font-size: 1.2em"><?php echo e($product->total_rating); ?> Đánh giá</em>
                        </span>
                        <h1><?php echo e($title); ?></h1>
                        <p><?php echo e($product->description); ?></p>
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">
                                <span class="new_price"><?php echo e(number_format($product->price_sale, 0, '', '.')); ?>đ</span>
                                <span class="old_price"><?php echo e(number_format($product->price, 0, '', '.')); ?>đ</span>
                            </div>
                        </div>

                        <form action="<?php echo e(route('cart.add')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <?php if($product->price !== null): ?>
                                <div class="prod_options">
                                    <div class="row">
                                        <label class="col-xl-5 col-lg-5  col-md-6 col-6">
                                            <strong>Số lượng</strong>
                                        </label>
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                            <div class="numbers-row">
                                                <input type="text" value="1" id="quantity_1" class="qty2" name="num_product">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <button type="submit" class="btn_add_to_cart btn_1c">
                                            Thêm vô giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                    <!-- /prod_info -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /End detail -->

        <div class="tabs_product">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Miêu tả</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Đánh giá</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Viết đánh giá</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /tabs_product -->
        <div class="tab_content_wrapper">
            <div class="container">
                <div class="tab-content" role="tablist">
                    
                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                        <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                    Mô tả
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo e($product->content); ?>

                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $product->description; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                        <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                    Đánh giá
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <?php if($productcmt !== null): ?>
                                        <?php $__currentLoopData = $productcmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                    <span class="rating">
                                                        <?php for($i = 0; $i < 5; $i++): ?>
                                                            <i class="icon_star<?php echo e($cmt->rating <= $i ? ' empty' : ''); ?>"></i>
                                                        <?php endfor; ?>
                                                        <em><?php echo e($cmt->rating); ?>/5.0</em>
                                                    </span>
                                                    <em><?php echo e(date('d/m/Y', strtotime($cmt->created_at))); ?></em>
                                                </div>
                                                
                                                <p><?php echo e($cmt->content); ?></p>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <p>Hiện tại chưa có bình luận nào!</p>
                                        </div>
                                    </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>
                    
                    <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                        <div class="card-header" role="tab" id="heading-C">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
                                    Viết đánh giá
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                            <div class="card-body">
                                <div class="write_review">
                                    <h1>Viết đánh giá</h1>
                                    <?php if(Auth::check()): ?>
                                        <form action="<?php echo e(route('menus.comment', $product->id)); ?>"
                                            method="post">
                                            <?php echo csrf_field(); ?>
                                            <!-- /rating_submit -->
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea class="form-control" name="content" style="height: 15rem;width: 50rem;"
                                                    placeholder="Nội dung đánh giá"></textarea>
                                            </div>
                                            <div class="rating_submit">
                                                <div class="form-group mb-2">
                                                    <label class="d-block">Xếp hạng tổng thể</label>
                                                    <span class="rating mb-0">
                                                        <input type="radio" class="rating-input" id="5_star" name="rating"
                                                            value="5">
                                                        <label for="5_star" class="rating-star"></label>
                                                        <input type="radio" class="rating-input" id="4_star" name="rating"
                                                            value="4">
                                                        <label for="4_star" class="rating-star"></label>
                                                        <input type="radio" class="rating-input" id="3_star" name="rating"
                                                            value="3">
                                                        <label for="3_star" class="rating-star"></label>
                                                        <input type="radio" class="rating-input" id="2_star" name="rating"
                                                            value="2">
                                                        <label for="2_star" class="rating-star"></label>
                                                        <input type="radio" class="rating-input" id="1_star" name="rating"
                                                            value="1">
                                                        <label for="1_star" class="rating-star"></label>
                                                    </span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn_1">Gửi đánh giá</button>
                                        </form>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
                                            Vui lòng đăng nhập
                                        </button>

                                        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-bottom-0">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <div class="form-title text-center">
                                                            <h4>Đăng nhập</h4>
                                                        </div>
                                                        <div class="d-flex flex-column text-center">
                                                            <form class="flex flex-col space-y-5" method="POST" role="form">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="flex flex-col space-y-1">
                                                                    <div class="flex items-center justify-between">
                                                                        <label class="text-base font-semibold text-gray-700">Địa chỉ email</label>
                                                                    </div>
                                                                    <input id="email" type="email" autofocus="" placeholder="Email" style="background: rgb(240, 240, 240);" class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200">
                                                                </div>
                                                                <div class="flex flex-col space-y-1">
                                                                    <div class="flex items-center justify-between">
                                                                        <label class="text-base font-semibold text-gray-700">Mật khẩu</label>
                                                                        <a href="<?php echo e(route('forgotPassword')); ?>" style="text-decoration: none;" class="text-sm text-blue-600 hover:underline focus:text-blue-800">Quên mật khẩu?</a>
                                                                    </div>
                                                                    <input id="password" type="password" style="background: rgb(240, 240, 240);" placeholder="Mật khẩu" class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200">
                                                                </div>

                                                                <div>
                                                                    <button type="button" id="btn-login" class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-yellow-500 rounded-md shadow hover:bg-yellow-600 focus:outline-none focus:ring-yellow-200 focus:ring-4">
                                                                        Đăng nhập
                                                                    </button>
                                                                </div>
                                                                <div class="flex flex-col space-y-5">
                                                                    <span class="flex items-center justify-center space-x-2">
                                                                        <span class="h-px bg-gray-400 w-14"></span>
                                                                        <span class="font-normal text-gray-500">Hoặc đăng nhập bằng</span>
                                                                        <span class="h-px bg-gray-400 w-14"></span>
                                                                    </span>
                                                                    <div class="flex flex-col space-y-4">
                                                                        <a href="http://127.0.0.1:8000/dang-nhap/google" class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-gray-800 rounded-md group hover:bg-gray-800 focus:outline-none">
                                                                            <span>
                                                                                <img src="/teamplate/img/Google__G__Logo.svg" alt="">
                                                                            </span>
                                                                            <span class="text-sm font-medium text-gray-800 group-hover:text-white">Google</span>
                                                                        </a>
                                                                        <a href="http://127.0.0.1:8000/dang-nhap/facebook" class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-blue-500 rounded-md group hover:bg-blue-500 focus:outline-none">
                                                                            <span>
                                                                                <img src="/teamplate/img/icons8-facebook.svg" style="width: 30px" alt="">
                                                                            </span>
                                                                            <span class="text-sm font-medium text-blue-500 group-hover:text-white">Facebook</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
        </div>

        <!-- liên quan -->
        <div class="container margin_60_40">
            <h2>Món liên quan</h2>
            <div class="row small-gutters">
                <?php $__currentLoopData = $repproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $agerep = 0;
                    if ($rep->total_rating) {
                        $agerep = round( $rep->total_number / $rep->total_rating, 2);
                    }
                ?>
                    <div class="col-6 col-md-4 col-xl-3" data-cue="slideInUp">
                        <div class="grid_item">
                            <figure>
                                <a href="<?php echo e($rep->id); ?>-<?php echo e(\Str::slug($rep->name, '-')); ?>">
                                    <img class="img-fluid lazy" src="<?php echo e($rep->thumb); ?>" data-src="<?php echo e($rep->thumb); ?>"
                                        alt="loihinh">
                                    <div class="add_cart"><span class="btn_1">Xem chi tiết</span></div>
                                </a>
                            </figure>
                            <div class="rating">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="icon_star <?php echo e($agerep <= $i  ? 'voted' : ''); ?>  "></i>
                                <?php endfor; ?>

                                <em><?php echo e($rep->total_rating); ?> Đánh giá</em>
                            </div>
                            <a href="<?php echo e($rep->id); ?>-<?php echo e(\Str::slug($rep->name, '-')); ?>">
                                <h3><?php echo e($rep->name); ?></h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price"><?php echo e(number_format($rep->price, 0, '', '.')); ?>đ</span>
                                <span class="old_price"><?php echo e(number_format($rep->price_sale, 0, '', '.')); ?>đ</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </main>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    // $(document).ready(function() {
    //     $('#loginModal').modal('show');
    //     $(function() {
    //         $('[data-toggle="tooltip"]').tooltip()
    //     })
    // });

    $('#btn-login').click(function(ev) {
        ev.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url : '/dang-nhap/ajax',
            type: 'POST',
            data: {
                email:email,
                password:password,
                _token:_token,
            },
            success:function(res) {
                if (res.message) {
                    let _html_error =
                    '<div class="alert alert-danger">';
                    for (let error of res.errors) {
                        _html_error += '<li> ${error}</li>';
                    }
                    _html_error += '</div>'
                    $('#error').html(_html_error);
                } else {
                    alert('Đăng nhập thành công!');
                    location.reload();
                }
            }
        });
    });

            // Sticky sidebar
    // $('#sidebar_fixed').theiaStickySidebar({
    //     minWidth: 991,
    //     updateSidebarHeight: true,
    //     additionalMarginTop: 90
    // });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/User/products/details.blade.php ENDPATH**/ ?>