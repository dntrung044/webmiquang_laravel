<header>
    <div class="header py-lg-2 py-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0 py-0">
                <div class="d-flex flex-wrap-nowrap">
                    <a href="/" id="logo" class="navbar-brand">
                        <img src="<?php echo e(asset('teamplate/img/logo0.png')); ?>" width="170" height="50" alt=""
                            class="logo_normal">
                        <img src="<?php echo e(asset('teamplate/img/logo1.png')); ?>" width="170" height="50" alt=""
                            class="logo_sticky">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-custom ml-auto">
                        <li class="nav-item <?php echo e(request()->segment(1) == '' ? 'active' : ''); ?>">
                            <a class="nav-link" href="/">Trang chủ</a>
                        </li>
                        <li class="nav-item <?php echo e(request()->segment(1) == 'thuc-don' ? 'active' : ''); ?>">
                            <a class="nav-link" href="/thuc-don">Thực đơn</a>
                        </li>
                        <li class="nav-item <?php echo e(request()->segment(1) == 'blog' ? 'active' : ''); ?>">
                            <a class="nav-link" href="/blog">Tin tức</a>
                        </li>

                        <li class="nav-item <?php echo e(request()->segment(1) == 'gioi-thieu' ? 'active' : ''); ?>">
                            <a class="nav-link" href="/gioi-thieu">Giới thiệu</a>
                        </li>

                        <li class="nav-item last-menu-bg <?php echo e(request()->segment(1) == 'dat-ban' ? 'active' : ''); ?>">
                            <span class="nav-link"><a href="/dat-ban">Đặt bàn</a></span>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="icon_menu"></i>
                </button>
            </nav>
        </div>
    </div>
</header>
<?php /**PATH /Users/trungchodie/Documents/WEB/Laravel/webmiquang/resources/views/user/layout/header.blade.php ENDPATH**/ ?>