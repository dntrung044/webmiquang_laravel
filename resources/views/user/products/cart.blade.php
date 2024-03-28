<div class="form-container" id="cart-list">
    <h5>Giỏ hàng</h5>
    @php
        $total = 0;
        $acount = 0;
    @endphp
    <ul>
        @foreach ($cartproducts as $key => $cart)
            @php
                $price = $cart->price_sale != 0 ? $cart->price_sale : $cart->price;
                $priceEnd = $price * $carts[$cart->id];
                $acount += $carts[$cart->id];
                $total += $priceEnd;
            @endphp
            <li class="botli">
                <figure class="botfigure">
                    <img src="{{ $cart->thumb }}" data-src="{{ $cart->thumb }}" alt="" width="50"
                        height="50" class="lazy loaded botimg" data-was-processed="true">
                </figure>
                <strong>
                    <span class="botspan">
                        {{ $carts[$cart->id] }} x {{ $cart->name }}
                    </span>
                    <br>{{ number_format($priceEnd, 0, '', '.') }}đ
                </strong>
                <a href="{{ route('cart.destroy', $cart->id) }}" class="action"><i class="icon_trash_alt"></i></a>
            </li>
        @endforeach
    </ul>

    <div class="total_drop">
        <div class="clearfix add_bottom_15"><strong>Tổng giỏ hàng
            </strong><span>{{ number_format($total, 0, '', '.') }}đ</span>
        </div>
        <a href="{{ route('cart.index') }}" class="btn_1 outline">Xem giỏ hàng</a>
        <a href="{{ route('checkout.index') }}" class="btn_1">Thanh toán</a>
    </div>
    <hr>
    <button type="button" class="btnClose nut-dong" onclick="dongForm()">Đóng</button>
</div>
