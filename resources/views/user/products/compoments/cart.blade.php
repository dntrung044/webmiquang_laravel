<div class="cart">
    @php
        $total = 0;
        $acount = 0;
    @endphp
    <div class="cartbox" id="myForm">
        <div class="form-container">
            <h5>Giỏ hàng</h5>
            <ul>
                @foreach ($productsInCart as $key => $Pcart)
                    @php
                        $price = $Pcart->price_sale != 0 ? $Pcart->price_sale : $Pcart->price;
                        $priceEnd = $price * $carts[$Pcart->id];
                        $acount += $carts[$Pcart->id];
                        $total += $priceEnd;
                    @endphp
                    <li class="botli">
                        <figure class="botfigure">
                            <img src="{{ $Pcart->thumb }}" data-src="{{ $Pcart->thumb }}" alt="" width="50"
                                height="50" class="lazy loaded botimg" data-was-processed="true">
                        </figure>
                        <strong>
                            <span class="botspan">
                                {{ $carts[$Pcart->id] }}
                                x {{ $Pcart->name }}
                            </span>
                            <br>{{ number_format($priceEnd, 0, '', '.') }}đ
                        </strong>
                        <a href="{{ route('cart.destroy', $Pcart->id) }}" class="action"><i
                                class="icon_trash_alt"></i></a>
                    </li>
                @endforeach
            </ul>
            <div class="total_drop">
                <div class="clearfix add_bottom_15"><strong>Tổng giỏ hàng
                    </strong><span>{{ number_format($total, 0, '', '.') }}đ</span>
                </div>
                <button class="btn_1 OpentForm" onclick="CloseForm()">Đóng</button>
                <a href="{{ route('cart.index') }}" class="btn_1 outline">Thanh toán</a>
            </div>
            <hr>

        </div>
    </div>

    <div class="nut-mo-cartbox cart_right" onclick="OpentForm()" id="cart_shake" data-totalitems="{{ $acount }}">
        <span aria-hidden="true" class="icon_cart" style="font-size: 25px;"></span>
    </div>
</div>
