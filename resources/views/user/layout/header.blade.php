<header>
    <div class="header py-1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0 py-0">
                <a href="/" id="logo">
                    <img src="{{ asset('teamplate/img/logo0.png') }}" width="170" height="50" alt=""
                        class="logo_normal">
                    <img src="{{ asset('teamplate/img/logo1.png') }}" width="170" height="50" alt=""
                        class="logo_sticky">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="icofont-navigation-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-custom">
                        <li class="nav-item {{ request()->segment(1) == '' ? 'active' : '' }}">
                            <a class="nav-link" href="/">Trang chủ</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'thuc-don' ? 'active' : '' }}">
                            <a class="nav-link" href="/thuc-don">Thực đơn</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'blog' ? 'active' : '' }}">
                            <a class="nav-link" href="/blog">Tin tức</a>
                        </li>

                        <li class="nav-item {{ request()->segment(1) == 'gioi-thieu' ? 'active' : '' }}">
                            <a class="nav-link" href="/gioi-thieu">Giới thiệu</a>
                        </li>

                        <li class="nav-item last-menu-bg {{ request()->segment(1) == 'dat-ban' ? 'active' : '' }}">
                            <span class="nav-link"><a href="/dat-ban">Đặt bàn</a></span>
                        </li>
                    </ul>
                    <!-- /cart -->
                    <!-- <ul>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                            </a>
                            <ul>
                                <li><div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Chỉnh sửa thông tin</a>
                                </div></li>
                                <li>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Trạng thái đơn hàng</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="blog.html">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>   -->
                </div>
            </nav>
        </div>
    </div>
</header>
