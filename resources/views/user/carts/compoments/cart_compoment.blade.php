<table class="table table-striped" id="cart_list">
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
        @foreach ($productsInCart as $key => $product)
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="{{ $product->thumb }}" data-src="{{ $product->thumb }}" class="lazy" alt="Image">
                    </div>
                    <span class="item_cart">{{ $product->name }}</span>
                </td>
                <td>
                    <strong>{{ number_format($product->price_sale != 0 ? $product->price_sale : $product->price, 0, '', '.') }}đ</strong>
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" id="quantity_{{ $product->id }}" class="qty2 num_product"
                            name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">
                        <div class="inc button_inc cart_increase"
                            data-id="{{ $product->id }}" data-url="{{ route('cart.increase') }}">
                            +
                        </div>
                        <div class="dec button_inc cart_decrease"
                            data-id="{{ $product->id }}" data-url="{{ route('cart.decrease') }}">
                            -
                        </div>
                    </div>
                </td>
                <td>
                    <strong>{{ number_format(($product->price_sale != 0 ? $product->price_sale : $product->price) * $carts[$product->id], 0, '', '.') }}đ</strong>
                </td>

                <td class="p-r-15">
                    <button type="button" data-url="{{ route('cart.destroy', ['id' => $product->id]) }}"
                        data-id="{{ $product->id }}" class="action_delete">
                        <i class="icon_trash_alt"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
