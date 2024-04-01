<div class="cart" id="cart_list">
    <div class="cartbox" id="myForm">
        <div class="form-container">
            <h5>Giỏ hàng</h5>
            <ul>
                @foreach ($productsInCart as $key => $product)
                    <li class="botli">
                        <figure class="botfigure">
                            <img src="{{ $product->thumb }}" data-src="{{ $product->thumb }}" alt="" width="50"
                                height="50" class="lazy loaded botimg" data-was-processed="true">
                        </figure>
                        <strong>
                            <span class="botspan">
                                {{ $carts[$product->id] }}
                                x {{ $product->name }}
                            </span>
                            <br>{{ number_format($subtotal, 0, '', '.') }}đ
                        </strong>
                        <button type="button" data-url="{{ route('menus.destroy', ['id' => $product->id]) }}"
                            data-id="{{ $product->id }}" class="action action_delete">
                            <i class="icon_trash_alt"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="total_drop">
                <div class="clearfix add_bottom_15"><strong>Tổng giỏ hàng
                    </strong><span>{{ number_format($total_cart, 0, '', '.') }}đ</span>
                </div>
                <button class="btn_1 OpentForm" onclick="CloseForm()">Đóng</button>
                <a href="{{ route('cart.index') }}" class="btn_1 outline">Thanh toán</a>
            </div>
            <hr>

        </div>
    </div>

    <div class="nut-mo-cartbox cart_right" onclick="OpentForm()" id="cart_shake" data-totalitems="{{ $quantity_total }}">
        <span aria-hidden="true" class="icon_cart" style="font-size: 25px;"></span>
    </div>
</div>
