<?php $__env->startSection('content'); ?>
    <main>
        <div id="carousel-home">
            <div class="owl-carousel owl-theme">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="owl-slide cover lazy" data-bg="url(<?php echo e($slider->thumb); ?>)">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-12 static">
                                        <div class="slide-text text-right white">
                                            <h2 class="owl-slide-animated owl-slide-title"><?php echo $slider->name; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $slider->description; ?>

                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="btn_1 btn_scroll" href="<?php echo e($slider->url); ?>" role="button"><?php echo e($slider->button); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <ul class="clearfix" id="banners_grid">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e($menu->link); ?>" class="img_container">
                        <img src="<?php echo e($menu->thumb); ?>" data-src="<?php echo e($menu->thumb); ?>" alt="" class="lazy loaded"
                            data-was-processed="true">
                        <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)"
                            style="background-color: rgba(0, 0, 0, 0.5);">
                            <h3> <?php echo e($menu->name); ?></h3>
                            <p> <?php echo e($menu->description); ?></p>
                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="pattern_2">
            <div class="container home_intro">
                <div class="row justify-content-center d-flex align-items-center">
                    <div class="col-lg-5 text-lg-center d-none d-lg-block" data-cue="slideInUp">
                        <figure>
                            <img src="<?php echo e($about->thumb); ?>" data-src="<?php echo e($about->thumb); ?>" width="654" height="740"
                                alt="" class="img-fluid lazy">
                            <a href="<?php echo e($about->linkYT); ?>" class="btn_play" data-cue="zoomIn" data-delay="500"
                                data-autoplay="true" data-vbtype="video">
                                <span class="pulse_bt">
                                    <i class="arrow_triangle-right"></i>
                                </span>
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-5 pt-lg-4" data-cue="slideInUp" data-delay="500">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Một số lời về chúng tôi</h2>
                            <p><?php echo $about->description; ?></p>
                        </div>
                        <br>
                        <p>
                            <img src="teamplate/img/chukymua.jpg" width="140" height="50" alt=""
                                style="left: 10em;">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg_gray">
            <div class="container" data-cue="slideInUp">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Thực đơn hàng ngày của chúng tôi</h2>
                </div>

                <!-- /main_title -->
                <div class="banner lazy" data-bg="url(teamplate/img/banner.jpg)">
                    <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                        data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <figure class="d-none d-lg-block">
                            <img src="teamplate/img/TypoBanner.png" alt="" width="400" height="350"
                                class="img-fluid">
                        </figure>
                        <div class="sm-voucher">
                            <small>ƯU ĐÃI ĐẶC BIỆT</small>
                            <h3>Thưởng Thức Mì Quảng chỉ với giá <span class="price"><?php echo e(number_format($product, 0, '', '.')); ?>đ</span></h3>
                            <p>- Quý khách nên đặt chỗ trước 4 giờ để được phục vụ tốt nhất -</p>
                            <a href="/dat-ban" class="btn_1">Đặt chổ ngay</a>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
                
                <div class="food-menu">
                    <!-- Đồ uống mới -->
                    <div class="container">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Món mới</h2>
                        </div>
                        <div class="row" id="list-latest-product">
                        </div>
                    </div>
                    <div class="container">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Mỳ Quảng</h2>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $productcat2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $age = 0;
                                    if ($product->total_rating) {
                                        $age = round($product->total_number / $product->total_rating, 2);
                                    }
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-cue="slideInUp">
                                    <div class="grid_item">
                                        <figure>
                                            <a
                                                href="/thuc-don/<?php echo e($product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>">
                                                <img class="img-fluid lazy" src="<?php echo e($product->thumb); ?>"
                                                    data-src="<?php echo e($product->thumb); ?>" alt="loihinh">
                                                <div class="add_cart" style="right: 0;">
                                                    <span class="btn_1c">
                                                        Thêm vô giỏ hàng
                                                    </span>
                                                </div>
                                            </a>
                                        </figure>
                                        <div class="rating">
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i class="icon_star <?php echo e($age <= $i ? 'voted' : ''); ?>  "></i>
                                            <?php endfor; ?>

                                            (<?php echo e($product->total_rating); ?>)
                                        </div>
                                        <a href="/thuc-don/<?php echo e($product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>">
                                            <h3><?php echo e($product->name); ?></h3>
                                        </a>
                                        <div class="price_box">
                                            <span
                                                class="new_price"><?php echo e(number_format($product->price, 0, '', '.')); ?>đ</span>
                                            <span
                                                class="old_price"><?php echo e(number_format($product->price_sale, 0, '', '.')); ?>đ</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="container">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Bánh tráng thịt heo</h2>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $productcat1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $age = 0;
                                    if ($product->total_rating) {
                                        $age = round($product->total_number / $product->total_rating, 2);
                                    }
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-cue="slideInUp">
                                    <div class="grid_item">
                                        <figure>
                                            <a
                                                href="/thuc-don/<?php echo e($product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>">
                                                <img class="img-fluid lazy" src="<?php echo e($product->thumb); ?>"
                                                    data-src="<?php echo e($product->thumb); ?>" alt="loihinh">
                                                <div class="add_cart" style="right: 0;">
                                                    <span class="btn_1c">
                                                        Thêm vô giỏ hàng
                                                    </span>
                                                </div>
                                            </a>
                                        </figure>
                                        <div class="rating">
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i class="icon_star <?php echo e($age <= $i ? 'voted' : ''); ?>  "></i>
                                            <?php endfor; ?>

                                            (<?php echo e($product->total_rating); ?>)
                                        </div>

                                        <a
                                            href="/thuc-don/<?php echo e($product->id); ?>-<?php echo e(\Str::slug($product->name, '-')); ?>">
                                            <h3><?php echo e($product->name); ?></h3>
                                        </a>
                                        <div class="price_box">
                                            <span
                                                class="new_price"><?php echo e(number_format($product->price, 0, '', '.')); ?>đ</span>
                                            <span
                                                class="old_price"><?php echo e(number_format($product->price_sale, 0, '', '.')); ?>đ</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <p class="text-center"><a href="/thuc-don" class="btn_1c outline" data-cue="zoomIn">Xem thêm
                                thực đơn</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--==================== -bài viết mới nhất- ====================-->
        <div class="pattern_2 margin_80_60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Bài viết mới nhất</h2>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6 col-md-4 mb-4" data-cue="slideInUp">
                                    <article class="blog">
                                        <figure>
                                            <a
                                                href="<?php echo e('blog/' . $post->id); ?>-<?php echo e(\Str::slug($post->name, '-')); ?>.html">
                                                <img src="<?php echo e($post->thumb); ?>" alt="">
                                                <div class="preview"><span>Đọc thêm</span></div>
                                            </a>
                                        </figure>
                                        <div class="post_info">
                                            <small><?php echo e(date('d-m-Y', strtotime($post->created_at))); ?></small>
                                            <h2><a
                                                    href="<?php echo e('blog/' . $post->id); ?>-<?php echo e(\Str::slug($post->name, '-')); ?>.html"><?php echo e($post->name); ?></a>
                                            </h2>
                                            <p><?php echo e($post->description); ?></p>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        load_latest_product();

        function load_latest_product(id = '') {
            $.ajax({
                url: '<?php echo e(route('home.latest-product')); ?>',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#col_load_more').remove();
                    $('#list-latest-product').append(data);
                }
            });
        }

        $(document).on('click', '#load_more_button', function() {
            var id = $(this).data('id');
            load_latest_product(id);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungchodie/Documents/WEB/Laravel/webmiquang/resources/views/User/index.blade.php ENDPATH**/ ?>