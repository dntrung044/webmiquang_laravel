@section('head')
    <link rel="stylesheet" href="teamplate/js/RangeSlider/jQuery.UI.css" type="text/css" media="all" />
    {{-- style giỏ hàng bot --}}
    <style>
        /* Nút Để Mở cartbox */
        .nut-mo-cartbox {
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 32px;
        }

        /* Ẩn cartbox mặc định */
        .cartbox {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Thêm style cho form */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* thiết lập style textarea */
        .form-container textarea {
            width: 100%;
            padding: 5px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            resize: none;
            min-height: 100px;
        }

        /*thiết lập style cho textarea khi được focus */
        .form-container textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Sthiết lập style cho nút trong form*/
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Thiết lập màu nền cho nút đóng */
        .form-container .OpentForm {
            background-color: red;
        }

        /* Thêm hiệu ứng hover cho nút*/
        .form-container .btn:hover,
        .nut-mo-cartbox:hover {
            opacity: 1;
        }

        /* {{-- style amination cart --}} */

        .cart_right {
            width: 50px;
            height: 50px;
            background: #292d48;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        .cart_right i {
            font-size: 25px;
            color: white;
        }

        .cart_right:before {
            content: attr(data-totalitems);
            font-size: 12px;
            font-weight: 600;
            position: absolute;
            top: -12px;
            right: -12px;
            background: #2bd156;
            line-height: 24px;
            padding: 0 5px;
            height: 24px;
            min-width: 24px;
            color: white;
            text-align: center;
            border-radius: 24px;
        }

        .cart_right.shake {
            animation: shakeCart 0.4s ease-in-out forwards;
        }

        @keyframes shakeCart {
            25% {
                transform: translateX(6px);
            }

            50% {
                transform: translateX(-4px);
            }

            75% {
                transform: translateX(2px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
@endsection
@extends('User.layout.main')
@section('content')
    <main class="pattern_2">
        <div class="hero_single inner_pages background-image"
            data-background="url(https://monquang.com.vn/medias/user_files/images/1/2019-04-25-222510banh-trang-cuon-thit-heo.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1><br>
                            <p> Tùy theo khu vực và từng cơ sở mà menu có thể khác nhau và giá cả có thể chênh
                                lệch so với website từ 5.000 – 10.000đ.
                                <br>Mong bạn thông cảm vì sự bất tiện này.
                            </p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <div class="pattern_2">
            <div class="container margin_60_40" data-cue="slideInUp">
                <div class="tabs_menu add_bottom_25">
                    <ul class="nav nav-tabs" role="tablist">
                        {{-- Danh sách danh mục --}}
                        @foreach ($categories as $category)
                            <li class="nav-item" {{ $loop->first ? 'active' : '' }}>
                                <a id="tab-{{ $category->id }}" href="#pane-{{ $category->id }}" class="nav-link"
                                    data-toggle="tab" role="tab">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content add_bottom_25" role="tablist">
                        {{-- Số lượng danh mục --}}
                        @foreach ($categories as $category)
                            <div id="pane-{{ $category->id }}"
                                class="card tab-pane fade show {{ $loop->first ? 'active' : '' }}" role="tabpanel"
                                aria-labelledby="tab-{{ $category->id }}">
                                <div class="card-header" role="tab" id="heading-{{ $category->id }}">
                                    <h5 class="mb-0">
                                        <a class="" data-toggle="collapse" href="#collapse-{{ $category->id }}"
                                            aria-expanded="true" aria-controls="collapse-{{ $category->id }}">
                                            {{ $category->name }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $category->id }}" class="collapse" role="tabpanel"
                                    aria-labelledby="heading-{{ $category->id }}">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row small-gutters">
                                                {{-- Danh sách sản phẩm --}}
                                                @foreach ($category->products as $product)
                                                    @php
                                                        $age = 0;
                                                        if ($product->total_rating) {
                                                            $age = round(
                                                                $product->total_number / $product->total_rating,
                                                                2,
                                                            );
                                                        }
                                                    @endphp
                                                    <div class="col-6 col-md-4 col-xl-4">
                                                        <div class="grid_item">
                                                            <figure>
                                                                <a
                                                                    href="{{ 'thuc-don/' . $product->id }}-{{ \Str::slug($product->name, '-') }}">
                                                                    <img class="img-fluid lazy" src="{{ $product->thumb }}"
                                                                        data-src="{{ $product->thumb }}" alt="">
                                                                </a>
                                                                <div class="add_cart">
                                                                    <span class="btn_1" style="height: 30px">
                                                                        <a class="add_to_cart"
                                                                            data-id="{{ $product->id }}"
                                                                            data-url="{{ route('menus.add_to_cart') }}">
                                                                            Thêm giỏ hàng
                                                                        </a>
                                                                    </span>
                                                                    <span class="btn_1"
                                                                        style="margin-left: 15px; height: 30px">
                                                                        <a href="{{ 'thuc-don/' . $product->id }}-{{ \Str::slug($product->name, '-') }}"
                                                                            style="color: #f8f8f8;text-decoration: none;">
                                                                            Xem chi tiết
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </figure>

                                                            <div class="rating">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <i
                                                                        class="icon_star {{ $age <= $i ? 'voted' : '' }}  "></i>
                                                                @endfor

                                                                <em>{{ $product->total_rating }} Đánh giá</em>
                                                            </div>
                                                            <a
                                                                href="{{ 'thuc-don/' . $product->id }}-{{ \Str::slug($product->name, '-') }}">
                                                                <h3>{{ $product->name }}</h3>
                                                            </a>
                                                            <div class="price_box">
                                                                <span
                                                                    class="new_price">{{ number_format($product->price_sale, 0, '', '.') }}đ</span>
                                                                <span
                                                                    class="old_price">{{ number_format($product->price, 0, '', '.') }}đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /card-body -->
                                </div>
                            </div>
                        @endforeach
                        <!-- /tab -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_menu-->
            </div>
            <!-- /container -->
        </div>
    </main>

    @include('user.products.compoments.cart')
    @include('sweetalert::alert')
@endsection

@section('script')
    <script src="{{ asset('teamplate/js/RangeSlider/jQuery.UI.js') }}"></script>
    <script src="{{ asset('teamplate/js/add_to_cart.js') }}"></script>
@endsection
