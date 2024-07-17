<div class="dropdown-menu">
    @php
        $sumPriceCart = 0;
    @endphp
    <ul>
        @if (!empty($carts))
            @foreach ($productss as $key => $product)
                @php
                    $price = $product->price_sale;
                    $sumPriceCart += $product->price_sale != 0 ? $product->price_sale : $product->price;
                @endphp
                <li>
                    <figure>
                        <img src="{{ $product->thumb }}" data-src="{{ $product->thumb }}" alt="" width="50"
                            height="50" class="lazy">
                    </figure>
                    <a href="{{ 'thuc-don/' . $product->id }}-{{ \Str::slug($product->name, '-') }}">
                        <strong><span>{{ $product->name }}</span>{!! $price !!}</strong>
                    </a>
                    <a href="/gio-hang/xoa/{{ $product->id }}" class="action"><i class="icon_trash_alt"></i></a>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="total_drop">
        <div class="clearfix add_bottom_15">
            <strong>Tổng</strong>
            <span>{{ number_format($sumPriceCart, '0', '', '.') }}</span>
        </div>
        <a href="/gio-hang" class="btn_1 outline">Xem giỏ hàng</a>
        <a href="/thanh-toan" class="btn_1">Thanh toán</a>
    </div>
</div>
