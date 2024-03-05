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
    </style>

<style>
    .search-box{
    width: 100%;
    position: relative;
    display: flex;

    }
    .search-input{
    width: 100%;
    padding: 4px;
    border: 2px solid #f8da45;
    border-radius:5px 0 0 10px ;
    border-right: none;
    outline: none;
    /* font-size: 20px; */
    color: #f8da45;;
    background: none;
    }
    .search-button{
    padding: 4px;
    width: 70%;
    text-align: center;
    outline: none;
    cursor: pointer;
    border: 2px solid #f8da45;
    border-radius: 0 10px 10px 0 ;
    border-left: none;
    background: #f8da45;
    border-left: 2px solid #f8da45;
    }
</style>
@endsection

@extends('user.layout.main')
@section('content')
<main>
    @if (count($products) > 0)
    <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/tintuc.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>{{ $title}}</h1> <br>
                        <ul>
                            <li style="display: inline-block;
                            position: relative;
                            padding: 0 16px 0 23px;"><a href="/" title="">Trang chủ</a>
                            </li>/
                            <li style="display: inline-block;
                            position: relative;
                            padding: 0 16px 0 23px;"><a href="/thuc-don" title="">Thực đơn</a>
                            </li>/
                            <li style="display: inline-block;
                            position: relative;
                            padding: 0 16px 0 23px;"><span>Chi tiết sản phẩm</span></li>
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
                @php
                    $total = 0;
                    $acount = 0;
                @endphp

                <table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TỔNG PHỤ</th>
                            <th> &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            @php
                                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                $priceEnd = $price * $carts[$product->id];
                                $acount += $carts[$product->id];
                                $total += $priceEnd;
                            @endphp
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ $product->thumb }}" data-src="{{ $product->thumb }}"
                                            class="lazy" alt="Image">
                                    </div>
                                    <span class="item_cart">{{ $product->name }}</span>
                                </td>
                                <td>
                                    <strong>{{ number_format($price, 0, '', '.') }}đ</strong>
                                </td>
                                <td>
                                    <div class="numbers-row">
                                        <input type="text" id="quantity_1" class="qty2"
                                            name="num_product[{{ $product->id }}]"
                                            value="{{ $carts[$product->id] }}">
                                        <div class="inc button_inc">+</div>
                                        <div class="dec button_inc">-</div>
                                    </div>
                                </td>
                                <td>
                                    <strong>{{ number_format($priceEnd, 0, '', '.') }}đ</strong>
                                </td>

                                <td class="p-r-15">
                                    <a href="/gio-hang/xoa/{{ $product->id }}" class="action">
                                        <i class="icon_trash_alt"></i>
                                    </a>
                                </td>
                                <td class="options">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-right">
                        <input type="submit" class="btn_1 outline" value="Cập nhật giỏ hàng"
                            formaction="/gio-hang/cap-nhat">
                        @csrf
                    </div>
                </div>
                <!-- /cart_actions -->
                <h6>Tiếp tục chọn món, quay lại <a href="/thuc-don" style="color: #4466f2">Thực đơn</a></h6>
            </div>
        </div>
    </form>

    <!-- box_cart -->
    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                        <!-- / enter coupon -->
                        <form method="POST" style="margin-bottom: 3px" action="{{url('/gio-hang/check_coupon')}}">
                        @csrf
                        <div class="search-box">
                            <input type="text" name="coupon" value="{{request('coupon')}}"
                            class="search-input" placeholder="Mã giảm giá">
                            <input value="Áp dụng" type="submit" name="check_coupon" class="search-button check_coupon" >
                        </div>
                    </form>

                    <ul>
                        {{-- Giỏ hàng --}}
                        <li>
                            <span>Giỏ hàng ({{$acount}} món):</span>{{ number_format($total, 0, '', '.') }}đ
                        </li>

                        {{-- Phí giao hàng --}}
                        <li>
                            <span>Phí giao hàng</span>
                            @php
                            $feeship = 30000;
                            if ($acount <=  3) {
                                $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee : $feeship;
                            } elseif ($acount <=  7) {
                                $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 5000 : $feeship + 5000;
                            } elseif ($acount > 10) {
                                $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 10000 : $feeship + 10000;
                            }

                                $total_feeship = (int)$total + (int)$feeship;
                            @endphp
                            <p>{{ number_format($feeship, 0, '', '.') }}đ</p>

                            {{-- @if (Session::get('fee'))
                                <span>{{ number_format(Session::get('fee'), 0, '', '.') }}đ</span>
                            @else (Session::get('fee') == "")
                                <span> 10.000đ</span>
                            @endif --}}
                            {{-- Thêm vào địa chỉ --}}
                            @php
                            if (empty(Auth::user()->fee)) {
                                echo '(
                                    <a href="/tai-khoan" style="color: #f8da45;" >
                                        Thêm vào địa chỉ
                                    </a>để được giảm phí giao hàng )';
                            }
                            @endphp
                        </li>
                        {{-- Mã giảm giá --}}
                        <li>
                            @if (!empty(Session::get('coupon')))
                                @foreach (Session::get('coupon') as $key => $cou)
                                    @if ($cou['condition']==1)
                                    <span>Mã giảm giá: (-{{$cou['number']}} %)</span>
                                    <p>
                                        @php
                                            $total_coupon = ((int)$total * (int)$cou['number'])/100;
                                            echo '<p>-'.number_format($total_coupon, 0, '', '.') .'đ</p>';

                                            $total_coupon_after = (int)$total_feeship - (int)$total_coupon;
                                        @endphp
                                    </p>

                                        {{-- <li class="total">  Tổng thanh toán
                                            <span> {{ number_format($total_coupon, 0, '', '.') }}đ</span>
                                        </li> --}}

                                    @elseif ($cou['condition']==2)
                                        <span>Mã giảm giá: </span> <p>-{{number_format($cou['number'], 0, '', '.')}}đ</p>
                                        <p>
                                            @php
                                                $total_coupon = $cou['number'];
                                                // echo '<p>Số tiền sau giảm: '.number_format($total_coupon, 0, '', '.') .'đ</p>';

                                                $total_coupon_after = (int)$total_feeship - (int)$total_coupon;
                                            @endphp
                                        </p>

                                    @endif
                                @endforeach
                            @endif
                        </li>
                        {{-- Tổng --}}
                        @php
                            if(Session::get('fee') && !Session::get('coupon')) {
                                $total_after = $total_feeship;
                            }elseif(!Session::get('fee') && Session::get('coupon')) {
                                $total_after = $total_coupon_after;
                            }elseif(Session::get('fee') && Session::get('coupon')) {
                                $total_after = $total_coupon_after;
                            }elseif(!Session::get('fee') && !Session::get('coupon')) {
                                $total_after =  $total_feeship;
                            }
                        @endphp
                        <hr>
                        <li class="total">
                            {{ number_format($total_after, 0, '', '.') }} đ
                            <span>Tổng thanh toán</span>

                        </li>
                    </ul>
                    <a href="thanh-toan" class="btn_1 full-width cart">Thực hiện thanh toán</a>
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
                        <img src="/teamplate/img/cartenty.png" width="170" height="170" style="  display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 30%;">
                        <div class="col-sm-12 empty-cart-cls text-center">

                            <h3><strong>Rất tiếc ... giỏ hàng của bạn trống</strong></h3>
                            <h4>Thêm một cái gì đó để làm cho tôi hạnh phúc :)</h4>

                                <a href="/thuc-don" class="btn btn-primary cart-btn-transform m-3" data-abc="true">quay lại chọn món</a>
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
