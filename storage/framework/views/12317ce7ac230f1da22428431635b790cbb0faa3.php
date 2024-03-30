<div class="d-flex flex-column h-100">
    <a href="<?php echo e(route('admin')); ?>" class="mb-0 brand-icon">
        <span class="logo-icon">
            <img src="<?php echo e(asset('teamplate/admin/assets/images/logoadmin.png')); ?>" alt="">
        </span>
        <span class="logo-text">Nhà Hàng</span>
    </a>
    <!-- Menu: main ul -->
    <ul class="menu-list flex-grow-1 mt-3">
        <!-- Menu: Quản lý thông tin về cửa hàng -->
        <li class="collapsed">
            <a class="m-link <?php echo e(request()->segment(2) == 'abouts' ? 'active' : ''); ?>" data-bs-toggle="collapse" data-bs-target="#abouts" href="#">
                <i class="icofont-certificate-alt-1"></i><span>Quản lý thông tin</span>
                <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span>
            </a>
            <ul class="sub-menu collapse" id="abouts">
                <!-- AboutUs: bài viết-->
                <li>
                    <a class="ms-link <?php echo e(request()->segment(2) == 'abouts' && request()->segment(3) == 'index' ? 'active' : ''); ?>" href="<?php echo e(route('abouts.index')); ?>">
                        <i class="icofont-ui-note"></i> <span>Bài viết giới thiệu</span>
                    </a>
                </li>
                <!-- AboutUs: hình ảnh-->
                <li>
                    <a class="ms-link <?php echo e(request()->segment(3) == 'galleries' ? 'active' : ''); ?>" href="<?php echo e(route('galleries.index')); ?>">
                        <i class="icofont-image"></i><span>Thư viện hình ảnh</span>
                    </a>
                </li>
                <!-- AboutUs: Slider -->
                <li><a class="ms-link <?php echo e(request()->segment(3) == 'sliders' ? 'active' : ''); ?>" href="<?php echo e(route('sliders.index')); ?>">
                        <i class="icofont-file-tiff"></i><span>Slider</span>
                    </a>
                </li>
                <!-- AboutUs: Banner -->
                <li>
                    <a class="ms-link <?php echo e(request()->segment(3) == 'banners' ? 'active' : ''); ?>" href="<?php echo e(route('banners.index')); ?>">
                        <i class="icofont-align-right"></i> <span>Banner</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Menu: Quản lý Sản phẩm -->
        <li class="collapsed">
            <a class="m-link <?php echo e(request()->segment(2) == 'products' ? 'active' : ''); ?>" data-bs-toggle="collapse" data-bs-target="#products" href="#">
                <i class="icofont-soup-bowl"></i><span>Quản lý thực đơn</span> <span
                    class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
            <ul class="sub-menu collapse" id="products">
                <li>
                    <a class="ms-link <?php echo e(request()->segment(2) == 'products' && request()->segment(3) == 'index' ? 'active' : ''); ?>" href="<?php echo e(route('products.index')); ?>">
                        <span>Món ăn</span>
                    </a>
                </li>
                <li>
                    <a class="ms-link <?php echo e(request()->segment(2) == 'products' && request()->segment(3) == 'categories' ? 'active' : ''); ?>" href="<?php echo e(route('categories.index')); ?>">
                        <span>Loại món ăn</span>
                    </a>
                </li>
                <li>
                    <a class="ms-link <?php echo e(request()->segment(2) == 'products' &&request()->segment(3) == 'comments' ? 'active' : ''); ?>" href="<?php echo e(route('product_comments.index')); ?>">
                        <span>Bình luận món ăn</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Menu: Quản lý Blog -->
        <li class="collapsed">
            <a class="m-link <?php echo e(request()->segment(2) == 'blogs' ? 'active' : ''); ?>" data-bs-toggle="collapse" data-bs-target="#Blogs" href="#">
                <i class="icofont-blogger"></i><span>Quản lý Blog</span>
                <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
            <ul class="sub-menu collapse" id="Blogs">
                <li><a class="ms-link <?php echo e(request()->segment(3) == 'post' && request()->segment(2) == 'blogs' ? 'active' : ''); ?>" href="<?php echo e(route('posts.index')); ?>"><span>Bài Viết</span> </a></li>
                <li><a class="ms-link <?php echo e(request()->segment(3) == 'categories' && request()->segment(2) == 'blogs' ? 'active' : ''); ?>" href="<?php echo e(route('post_categories.index')); ?>"><span>Danh Mục</span> </a></li>
                <li><a class="ms-link <?php echo e(request()->segment(3) == 'comments' && request()->segment(2) == 'blogs' ? 'active' : ''); ?>" href="<?php echo e(route('post_comments.index')); ?>"><span>Bình luận</span> </a></li>
            </ul>
        </li>
        <!-- Menu: Quản lý Đơn hàng -->
        <li class="collapsed">
            <a class="m-link <?php echo e(request()->segment(2) == 'transactions' ? 'active' : ''); ?>" data-bs-toggle="collapse" data-bs-target="#Transactions" href="#">
                <i class="icofont-document-folder"></i><span>Quản lý Đơn Hàng</span>
                <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span>
            </a>
            <ul class="sub-menu collapse" id="Transactions">
                <li>
                    <a class="ms-link <?php echo e(request()->segment(3) == 'coupons' ? 'active' : ''); ?>" href="<?php echo e(route('coupons.index')); ?>">
                        <span>Mã giảm giá</span>
                    </a>
                </li>
                <li>
                    <a class="ms-link <?php echo e(request()->segment(3) == 'feeships' ? 'active' : ''); ?>" href="<?php echo e(route('feeships.index')); ?>">
                        <span>Phí Vận Chuyển</span>
                    </a>
                </li>
                <li>
                    <a class="ms-link <?php echo e(request()->segment(2) == 'transactions' && request()->segment(3) == 'index' ? 'active' : ''); ?>" href="<?php echo e(route('transactions.index')); ?>">
                        <span>Đơn hàng</span>
                    </a>
                </li>
            </ul>
            </a>
        </li>

        <!-- Menu: Thống kê -->
        
    </ul>
    <!-- EndMenu: main ul -->

    <!-- Theme: Switch Theme -->
    <ul class="list-unstyled mb-0">
        <li class="d-flex align-items-center justify-content-center">
            <div class="form-check form-switch theme-switch">
                <input class="form-check-input" type="checkbox" id="theme-switch">
                <label class="form-check-label" for="theme-switch">Bậc chê độ tối!</label>
            </div>
        </li>
    </ul>

    <!-- Menu: menu collepce btn -->
    <button type="button" class="btn btn-link sidebar-mini-btn text-light">
        <span class="ms-2"><i class="icofont-bubble-right"></i></span>
    </button>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/layout/slidebar.blade.php ENDPATH**/ ?>