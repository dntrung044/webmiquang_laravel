@section('head')
    <style>
        .mt-100 {
            margin-top: 100px
        }
        .card {
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent
        }
        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important
        }
        .search-box {
            width: 100%;
            position: relative;
            display: flex;

        }
        .search-input {
            width: 100%;
            padding: 4px;
            border: 2px solid #f8da45;
            border-radius: 5px 0 0 10px;
            border-right: none;
            outline: none;
            /* font-size: 20px; */
            color: #f8da45;
            ;
            background: none;
        }
        .search-button {
            padding: 4px;
            width: 70%;
            text-align: center;
            outline: none;
            cursor: pointer;
            border: 2px solid #f8da45;
            border-radius: 0 10px 10px 0;
            border-left: none;
            background: #f8da45;
            border-left: 2px solid #f8da45;
        }
    </style>
@endsection

@extends('user.layout.main')
@section('content')
    <main>
        @if (count($productsInCart) > 0)
            <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/tintuc.jpg)">
                <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-9 col-lg-10 col-md-8">
                                <h1>{{ $title }}</h1> <br>
                                <ul>
                                    <li style="display: inline-block;  position: relative;    padding: 0 16px 0 23px;">
                                        <a href="/" title="">Trang chủ</a>
                                    </li>/
                                    <li  style="display: inline-block;  position: relative;  padding: 0 16px 0 23px;">
                                        <a href="/thuc-don" title="">Thực đơn</a>
                                    </li>/
                                    <li style="display: inline-block;  position: relative; padding: 0 16px 0 23px;">
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
            <!-- /hero_single -->

            <form method="post">
                <div class="bg_gray">
                    <div class="container margin_60_40">
                        {{-- Cart compoment --}}
                        @include('user.carts.compoments.cart_compoment')
                        <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                            <div class="col-sm-4 text-right">
                                <input type="submit" class="btn_1 outline" value="Cập nhật giỏ hàng"
                                    formaction="/gio-hang/cap-nhat">
                                @csrf
                            </div>
                        </div>
                        <h6>Tiếp tục chọn món, quay lại <a href="/thuc-don" style="color: #4466f2">Thực đơn</a></h6>
                    </div>
                </div>
            </form>
            <!-- box_cart -->
            <div class="box_cart">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            {{-- enter coupon --}}
                            <form style="margin-bottom: 3px">
                                {{ csrf_field() }}
                                <div class="search-box">
                                    <input type="text" name="coupon" value="{{ request('coupon') }}"
                                        class="search-input" placeholder="Mã giảm giá">
                                    <input value="Áp dụng" type="button" data-url="{{ route('cart.check_coupon') }}"
                                        class="search-button check_coupon">
                                </div>
                            </form>
                            {{-- Payment compoment --}}
                            @include('user.carts.compoments.payment_compoment')
                            <a href="{{ route('checkout.index') }}" class="btn_1 full-width cart">Thực hiện thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container-fluid mt-100">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body cart">
                                <img src="/teamplate/img/cartenty.png" width="170" height="170"
                                    style="  display: block; margin-left: auto; margin-right: auto; width: 30%;">
                                <div class="col-sm-12 empty-cart-cls text-center">
                                    <h3><strong>Rất tiếc ... giỏ hàng của bạn trống</strong></h3>
                                    <h4>Hãy thêm một món ăn bất kỳ để hiển thị chi tiết giỏ hàng :)) </h4>
                                    <a href="{{ route('menus.index') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">quay
                                        lại chọn món</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
    @include('sweetalert::alert')
@endsection
@section('script')
    <script src="{{ asset('teamplate/js/specific_shop.js') }}"></script>
    <script src="{{ asset('teamplate/js/cart_ajax.js') }}"></script>
@endsection
