<header>
    <div class="header py-1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0 py-0">
                <div class="d-flex flex-wrap-nowrap">
                    <a href="/" id="logo" class="navbar-brand">
                        <img src="{{ asset('teamplate/img/logo0.png') }}" width="170" height="50" alt=""
                            class="logo_normal">
                        <img src="{{ asset('teamplate/img/logo1.png') }}" width="170" height="50" alt=""
                            class="logo_sticky">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-custom ml-auto">
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
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="icofont-navigation-menu"></i>
                </button>
            </nav>
        </div>
    </div>
</header>
{{-- header mobile --}}
<div class="fixed-bottom-mobile d-lg-none d-block">
    <ul>
        <li>
            <a href="/">
                <img width="32" height="32" class="lazyload loaded"
                    src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_6.png?1735871727390"
                    alt="Trang chủ" data-was-processed="true">
                <span>Trang chủ</span>
            </a>
        </li>
        <li>
            <a href="/thuc-don" class="wish-header">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="4.5" x2="24" y2="4.5" stroke="#000"></line>
                    <line y1="11.5" x2="24" y2="11.5" stroke="#000"></line>
                    <line y1="19.5" x2="24" y2="19.5" stroke="#000"></line>
                </svg>
                <span class="count_store">8</span>
                <span>Thực đơn</span>
            </a>
        </li>
        <li>
            <a href="/blog">
                <img width="32" height="32" class="lazyload loaded"
                    src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_5.png?1735871727390"
                    data-src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_5.png?1735871727390"
                    alt="Tin tuc" data-was-processed="true">
                <span>Tin tức</span>
            </a>
        </li>
        
        <li>
            <a href="/gioi-thieu">
                <img width="32" height="32" class="lazyload loaded"
                    src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_1.png?1735871727390"
                    data-src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_1.png?1735871727390"
                    alt="Yêu thích" data-was-processed="true">
                <span>Giới thiệu</span>
            </a>
        </li>

        <li>
            <a href="/dat-ban">
                <img width="32" height="32" class="lazyload loaded"
                    src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_1.png?1735871727390"
                    data-src="//bizweb.dktcdn.net/100/514/629/themes/951567/assets/icon_poly_hea_1.png?1735871727390"
                    alt="Yêu thích" data-was-processed="true">
                <span>Đặt bàn</span>
            </a>
        </li>
    </ul>
</div>
