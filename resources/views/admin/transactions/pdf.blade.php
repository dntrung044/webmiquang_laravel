<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chí tiết đơn hàng - dsaddsa51</title>
    <style type="text/css">
        body {
            font-family: "DejaVu Sans";
            font-size: 13px;
        }

        .container {
            max-width: 680px;
            margin: 0 auto;
        }

        .logotype {
            background: #000;
            color: #fff;
            width: 75px;
            height: 75px;
            line-height: 75px;
            text-align: center;
            font-size: 11px;
        }

        .column-title {
            background: #eee;
            text-transform: uppercase;
            padding: 15px 5px 15px 15px;
            font-size: 11px
        }

        .column-detail {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .column-header {
            background: #eee;
            text-transform: uppercase;
            padding: 15px;
            font-size: 11px;
            border-right: 1px solid #eee;
        }

        .row {
            padding: 7px 14px;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .alert {
            background: #ffd9e8;
            padding: 20px;
            margin: 20px 0;
            line-height: 22px;
            color: #333
        }

        .socialmedia {
            background: #eee;
            padding: 20px;
            display: inline-block
        }
    </style>
</head>

<body>
    <div class="container">
        <table width="100%">
            <tr>
                <td width="75px">
                    <div class="logotype">Mì Quảng</div>
                </td>
                <td width="300px">
                    <div style="background: #ffd9e8;border-left: 15px solid #fff;padding-left: 30px;font-size: 26px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">
                        Hoá đơn đặt hàng
                    </div>
                </td>
            </tr>
        </table>
        <br><br>
        <h3>Chi tiết liên lạc người nhận</h3>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td widdth="50%" style="background:#eee;padding:20px;">
                    <strong>Ngày đặt:</strong> {{ date('d/m/Y-H:m', strtotime($transaction->created_at)) }}<br>
                    <strong>Phương thức thanh toán:</strong> khi nhận hàng<br>
                    <strong>Loại giao hàng:</strong> Postnord<br>
                </td>
                <td style="background:#eee;padding:20px;">
                    <strong>Mã đơn hàng:</strong> 27100<br>
                    <strong>E-mail:</strong> firstname@company.com<br>
                    <strong>Số điện thoại:</strong> 004676234567<br>
                </td>
            </tr>
        </table><br>
        <table width="100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: text-top;">
                                <div
                                    style="background: #ffd9e8 url(https://cdn0.iconfinder.com/data/icons/commerce-line-1/512/comerce_delivery_shop_business-07-128.png);width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 42px;">
                                </div>
                            </td>
                            <td>
                                <strong>Vận chuyển</strong><br>
                                Họ tên<br>
                                Queens high 17 B<br>
                                SE-254 57 Helsingborg<br>
                                Sweden
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: text-top;">
                                <div
                                    style="background: #ffd9e8 url(https://cdn4.iconfinder.com/data/icons/app-custom-ui-1/48/Check_circle-128.png) no-repeat;width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 25px;">
                                </div>
                            </td>
                            <td>
                                <strong>Delivery</strong><br>
                                Firstname Lastname<br>
                                Queens high 17 B<br>
                                SE-254 57 Helsingborg<br>
                                Sweden
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table><br>
        {{-- <table width="100%" style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:0 0 8px 0">
            <tr>
                <td>
                    <h3>Chi tiết thanh toán</h3>
                    Thanh toán của bạn bằng thẻ
                <td>
            </tr>
        </table><br> --}}
        <h3>Chi tiết giỏ hàng</h3>

        <table width="100%" style="border-collapse: collapse;border-bottom:1px solid #eee;">
            <tr>
                <td width="5%" class="column-header">#</td>
                <td width="35%" class="column-header">MÓN</td>
                <td width="30%" class="column-header">GIÁ</td>
                <td width="30%" class="column-header">GIÁ TỔNG</td>
            </tr>

            @php
                $total = 0;
                $ship = 10000;
                $totalss=0
            @endphp
            @foreach ($carts as $key => $cart)
            @php
                $price = $cart->total_price * $cart->total_item;
                $total += $price;
                $i = 0;
            @endphp
            <tr>
                {{-- <span style="color:#777;font-size:11px;"> --}}
                <td class="row"><span style="color:#777;font-size:11px;">{{ $i+1 }}</span></td>
                <td class="row">
                    <img alt="img error" src="{{ public_path($cart->product->thumb) }}" style="width: 120px; height: 70px; margin-bottom: 4px">
                    <br>
                    {{ $cart->product->name }}
                </td>
                <td class="row">{{ number_format($cart->total_price, 0, '', '.') }}đ <span style="color:#777">X</span> {{ $cart->total_item }}</td>
                <td class="row">{{ number_format($price, 0, '', '.') }}đ</td>
            </tr>
            @endforeach
        </table><br>

        <table width="100%" style="background:#eee;padding:20px; height: 85px;">
            <tr>
                <td>
                    <table style="width: 300px; float:right;">
                        <tr>
                            <td><strong>Tổng phụ:</strong></td>
                            <td style="text-align:right">100 SEK</td>
                        </tr>
                        <tr>
                            <td><strong>Phí vận chuyển:</strong></td>
                            <td style="text-align:right">50 SEK</td>
                        </tr>
                        <tr>
                            <td><strong>MGG 25%:</strong></td>
                            <td style="text-align:right">31.25 đ</td>
                        </tr>
                        <tr>
                            <td><strong>Tổng cộng:</strong></td>
                            <td style="text-align:right">187.50 đ</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="alert">
            Xàm
        </div>
        <div class="socialmedia">Theo dõi chúng tôi trực tuyến <small>[FB] [INSTA]</small></div>
    </div><!-- container -->
</body>

</html>
