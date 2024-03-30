

<?php $__env->startSection('content'); ?>
<main>
    <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/bg_datban.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1><?php echo e($title); ?></h1> 
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="frame white"></div>
    </div>
    <!-- /hero_single -->
    <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $aboutus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_tag_alt"></i>
                        <h2>Đặt bàn</h2> 
                        <a href="#0">+<?php echo e($about->phone); ?></a> - <a href="#0"><?php echo e($about->email); ?></a>
                        <small>- <a href="/dat-ban">Hoặc sử dụng biểu mẫu trực tuyến</a> -</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_pin_alt"></i>
                        <h2>Địa chỉ</h2>
                        <div style="text-align: inherit"><?php echo $about->address; ?></div>
                        <small>- <a href="https://goo.gl/maps/BfTgFK7VbA89HxPy7">Nhận chỉ đường</a> -</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_clock_alt"></i>
                        <h2>Giờ mở cửa</h2>
                        <div><?php echo e($about->openH); ?></div>
                        <small>- Mở cửa -</small>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="pattern_2">
        <div class="container margin_120_100 home_intro">
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-5 text-lg-center d-none d-lg-block" data-cue="slideInUp">
                    <figure>
                        <img src="<?php echo e($about->thumb); ?>" data-src="<?php echo e($about->thumb); ?>" width="654" height="740"
                            alt="" class="img-fluid lazy">
                        <a href="<?php echo e($about->linkYT); ?>" class="btn_play" data-cue="zoomIn" data-delay="500" data-autoplay="true" data-vbtype="video"> 
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
                        <img src="teamplate/img/chukymua.jpg" width="140" height="50" alt="" style="left: 10em;">
                    </p>
                </div>
            </div>
            <!--/row -->
        </div>
        <!--/container -->
    </div>
    <!-- /bg_gray -->
    <div class="pattern_2">
    <div class="container margin_60_40">
        <div class="main_title center">
            <span><em></em></span>
            <h2>Dưới đây là một số hình ảnh</h2>
            <p>về nhà hàng của chúng tôi.</p>
        </div>
        <div class="isotope-wrapper mb-4">
            <div class="row-gallery magnific-gallery">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="item">
                        <div class="item-img" data-cue="slideInUp">
                            <img src="<?php echo e($gallery->thumb); ?>" alt="" width="400px" height="400px"/>
                            <div class="content">
                                <a href="<?php echo e($gallery->thumb); ?>" title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="arrow_expand"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
        </div>
    </div>
    <!-- /container -->
</div>
    
</main>
<!-- /main -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="teamplate/js/isotope.min.js"></script>
<script>
$(window).on('load', function(){
  var $container = $('.isotope-wrapper');
  $container.isotope({ itemSelector: '.item', layoutMode: 'masonry', });
});
</script>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('user.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/aboutus/index.blade.php ENDPATH**/ ?>