<!DOCTYPE html>
<html lang="vi">
    <head>
        @include('user.layout.head')
        @yield('head')
    </head>
    <body>
        <!-- Page Preload -->
        {{-- <div id="page_preloader"></div> --}}
        <div id="preloader" style="display: none;">
            <div data-loader="circle-side" style="display: none;"></div>
        </div>
        <!-- header -->
        @include('user.layout.header')
        <!-- main -->
        @yield('content')
        <!-- user-bot -->
        @if (!empty(Auth::user()))
            <div id="user-bot">
                <div class="information">
                    <div class="headbot">
                        <h3 class="timestamp">Người dùng</h3>
                    </div>
                    <div class="items">
                        <!-- item  -->
                        <div class="item">
                            <a href="{{ route('account') }}">
                                <div class="item_name">
                                    <h6 class="name">Thông tin tài khoản</h6>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="/updating">
                                <div class="item_name">
                                    <h6 class="name">Thông tin đơn hàng</h6>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="/updating">
                                <div class="item_name">
                                    <h6 class="name">Sản phẩm đã đánh giá</h6>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="/tai-khoan">
                                <div class="item_name">
                                    <h6 class="name">Mã giảm giá</h6>
                                </div>
                            </a>
                        </div>

                        <!-- items  -->
                    </div>

                    {{-- <div class="type-area">
                        <a href="" class="typing">Đằng xuất</a>

                    </div> --}}
                    <div style="align-items: center; margin-left: 6em; margin-top: 0.5em; margin-bottom: 1em">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn_logout">
                                Đăng xuất
                            </button>
                        </form>

                    </div>
                </div>
                <div class="icon">
                    <div class="user">
                        <i class="bi bi-x-lg"></i>
                        Xin chào : {{ Auth::user()->name }}
                    </div>
                    <i class="bi bi-person-circle me-2"></i>
                </div>
            </div>
        @endif
        <!-- footer-->
        @include('user.layout.footer')
        <!-- layout-->
        @include('user.layout.script')
        @yield('script')
    </body>

</html>
