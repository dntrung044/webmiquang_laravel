<?php $__env->startSection('head'); ?>

    <style type="text/css">
        /*body {
            background: #89909f;
            padding: 3rem 0 0 3rem;
            font-size: 12px;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            }*/

        .site-wrap {
            display: grid;
            grid-template-columns: 280px 1fr;
        }

        .site-nav {
            background: none;
            color: #0b121b;
            /* border-top-left-radius: 2rem; */
            display: flex;
            flex-direction: column;
        }

        .site-nav a {
            color: inherit;
            text-decoration: none
        }

        .site-nav ul {
            margin-bottom: auto;
        }

        .site-nav ul li a {
            display: block;
            padding: 0.75rem 0.5rem 0.75rem 2rem;
            position: relative;
        }

        .site-nav ul li a:hover,
        .site-nav ul li a:focus {
            color: var(--primary-color);
        }

        .site-nav ul li.active>a {
            background: linear-gradient(to right, #fade93, transparent);
        }

        .site-nav ul li.active>a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            background: var(--primary-color);
            width: 5px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .site-nav ul ul {
            padding-left: 1rem;
            margin-bottom: 0.5rem;
        }

        .site-nav ul ul a {
            padding-top: 0.4rem;
            padding-bottom: 0.4rem;
        }

        .note {
            width: calc(100% - 6rem);
            margin: 2rem;
            background: #171c26;
            border-radius: 10px;
            padding: 1rem;
        }

        .note h3 {
            font-size: 0.9rem;
            margin: 0 0 0.4rem 0;
        }

        .note p {
            color: #717783;
        }

        .name {
            font-size: 1.3rem;
            position: relative;
            margin: 2rem 0 2rem 0;
            padding: 0 2.5rem 0.5rem 2rem;
            width: calc(100% - 3rem);
        }

        .name svg {
            position: absolute;
            fill: white;
            width: 16px;
            height: 16px;
            right: 0;
            top: 7px;
        }

        .name::after {
            content: "";
            width: 8px;
            height: 8px;
            background: var(--primary-color);
            border-radius: 20px;
            position: absolute;
            top: 6px;
            right: -2px;
        }

        .main-dashboard {
            border-top-left-radius: 2rem;
            background: #ebecee;
            margin-left: -2rem;
            position: relative;
        }

        .main-dashboard>header {
            padding: 3rem 3rem 0 3rem;
        }

        .content-columns {
            padding: 3rem;
            display: flex;
            background: #e5e5e9;
        }

        .content-columns .col {
            min-height: 500px;
            width: 200px;
            padding: 1rem;
            background: #ebecee;
            margin-right: 1rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.04);
            border-radius: 5px;
        }

        .content-columns .col:nth-child(1) {
            border-top: 4px solid #50aaee;
        }

        .content-columns .col:nth-child(2) {
            border-top: 4px solid #d56ec7;
        }

        .content-columns .col:nth-child(3) {
            border-top: 4px solid #e37e55;
        }

        .content-columns .col:nth-child(4) {
            border-top: 4px solid #ebbd41;
        }

        .item {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.07);
            min-height: 50px;
            border-radius: 5px;
            margin: 0 0 0.5rem 0;
        }

        .nav-tabs a {
            margin-right: 2rem;
            display: inline-block;
            padding: 1rem 0 1rem 0;
            font-size: 1.15rem;
            color: #8c939e;
            position: relative;
            text-decoration: none;
        }
        /* .tab.after-slide::after {
            transform: translateX(100%);
        }

        .tab.before-slide::after {
            transform: translateX(-100%);
        } */

        .nav-tabs a.active {
            color: #101620;
            font-weight: 600;
            text-decoration: none
        }

        .nav-tabs a.active span {
            background: #d9dfea;
            color: #5887d1;
        }

        .nav-tabs a.active::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-color);
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }

        .nav-tabs a span {
            border-radius: 10px;
            font-size: 0.8rem;
            padding: 0.25rem 0.4rem;
            font-weight: 600;
            vertical-align: middle;
            position: relative;
            top: -2px;
            background: #dfe0e2;
            color: #868d99;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="hero_single inner_pagesuser background-image" data-background="url(<?php echo e(asset('teamplate/img/tintuc.jpg')); ?>)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container" style="margin-top: 10em">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1><?php echo e($title); ?></h1>
                        </div>
                    </div>
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Tổng quan</h6>
                        </div>
                        <div class="card-body" style="position: relative;">
                            <div
                                class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 row-cols-xxl-4">
                                <div class="col">
                                    <div class="card" style="background: var(--primary-color);">
                                        <div class="card-body text-white d-flex align-items-center">
                                            <i class="icofont-binary fs-3"></i>
                                            <div class="d-flex flex-column ms-3">
                                                <h6 class="mb-0">Tổng số đơn hàng</h6>
                                                <span class="text-white"><?php echo e($totalTransaction); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="background: var(--primary-color);">
                                        <div class="card-body text-white d-flex align-items-center">
                                            <i class="icofont-spoon-and-fork fs-3"></i>
                                            <div class="d-flex flex-column ms-3">
                                                <h6 class="mb-0">Tổng đã xử lý </h6>
                                                <span class="text-white"><?php echo e($totalDone); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="background: var(--primary-color);">
                                        <div class="card-body text-white d-flex align-items-center">
                                            <i class="icofont-livejournal fs-3"></i>
                                            <div class="d-flex flex-column ms-3">
                                                <h6 class="mb-0">Tổng chưa xử lý</h6>
                                                <span class="text-white"><?php echo e($totalDevliver); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="background: var(--primary-color);">
                                        <div class="card-body text-white d-flex align-items-center">
                                            <i class="icofont-livejournal fs-3"></i>
                                            <div class="d-flex flex-column ms-3">
                                                <h6 class="mb-0">Tổng chưa xử lý</h6>
                                                <span class="text-white"><?php echo e($totalDevliver); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /row -->
                </div>
            </div>
            
        </div>
        <!-- /hero_single -->

        <div class="site-wrap pattern_2" data-cue="slideInUp">

            <nav class="site-nav" >
                <div class="name">
                    Tên người dùng
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M11.5,22C11.64,22 11.77,22 11.9,21.96C12.55,21.82 13.09,21.38 13.34,20.78C13.44,20.54 13.5,20.27 13.5,20H9.5A2,2 0 0,0 11.5,22M18,10.5C18,7.43 15.86,4.86 13,4.18V3.5A1.5,1.5 0 0,0 11.5,2A1.5,1.5 0 0,0 10,3.5V4.18C7.13,4.86 5,7.43 5,10.5V16L3,18V19H20V18L18,16M19.97,10H21.97C21.82,6.79 20.24,3.97 17.85,2.15L16.42,3.58C18.46,5 19.82,7.35 19.97,10M6.58,3.58L5.15,2.15C2.76,3.97 1.18,6.79 1,10H3C3.18,7.35 4.54,5 6.58,3.58Z">
                        </path>
                    </svg>
                </div>

                <ul>
                    <li class="active">
                        <a href="#0">
                            <img style="width: 23px; float: left; margin-right: 2px;" src="https://cf.shopee.vn/file/ba61750a46794d8847c3f463c5e71cc4" alt="">
                            <p>Tài khoản của tôi</p>
                        </a>
                        <ul>
                            <li><a href="#0">Hồ sơ</a></li>
                            <li><a href="#0">Địa chỉ</a></li>
                            <li><a href="#0">Đổi mật khẩu</a></li>
                        </ul>
                    </li>
                    <li><a href="#0">Đơn mua</a></li>
                    <li><a href="#0">Mã giảm giá</a></li>
                </ul>

                
            </nav>

            <div class="main-dashboard">

                <header>
                    <ul class="nav-tabs" id="nav-tabs" role="tablist">
                        
                            <a class="active" href="#pane-1" data-toggle="tab" role="tab">
                                Tất cả
                                <span>14</span>
                            </a>
                        
                            <a href="#pane-2" data-toggle="tab" role="tab">
                                Đang chuẩn bị
                                <span>24</span>
                            </a>
                        
                            <a href="#pane-3" data-toggle="tab" role="tab">
                                Đang giao
                            </a>
                        

                        
                    </ul>
                </header>

                <div class="tab-content" role="tablist">
                    
                    <!-- /tab -->
                    <div id="pane-1" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-1">
                        aaaa
                    </div>

                    <div id="pane-2" class="card tab-pane show" role="tabpanel" aria-labelledby="tab-2">
                        bbb
                    </div>

                    <div id="pane-3" class="card tab-pane show" role="tabpanel" aria-labelledby="tab-3">
                        cccccc
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /pattern -->

    </main>
    <!-- /main -->
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="teamplate/js/RangeSlider/jQuery.UI.js" type="text/javascript"></script>
<script>
    jQuery('.tab').on('click', function() {
    jQuery('.tab, .subnav').removeClass('selected');
    jQuery(this).addClass('selected');
    if( jQuery(this).hasClass('tab-subnav') ) {
        jQuery(this).find('.subnav').addClass('selected');
    }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('User.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/User/user/index.blade.php ENDPATH**/ ?>