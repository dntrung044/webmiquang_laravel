<ul id="cart_total">
    <li>
        <span>Giỏ hàng ({{ $quantity_total }} món):</span>
        {{ number_format($total_cart, 0, '', '.') }}đ
    </li>
    <li>
        <span>Phí giao hàng</span>
        {{ number_format($feeship, 0, '', '.') }}đ
    </li>
    <li>
        @if (!empty(Session::get('coupon')))
            @if ($condition == 1)
                <span>Mã giảm giá (- {{ $number }} %) :</span>
            @elseif ($condition == 2)
                <span>Mã giảm giá (-{{ number_format($number, 0, '', '.') }}đ) :</span>
            @endif
            <p>-{{ number_format($total_coupon, 0, '', '.') }}đ </p>
        @endif
    </li>
    <hr>
    @php
        if (empty(Auth::user()->fee)) {
            if (empty(Auth::user())) {
                echo '(
            <a href="/dang-nhap" style="color: #f8da45;" >
                Thêm vào địa chỉ
            </a>để được giảm phí giao hàng )';
            } else {
                echo '(
                <a href="/tai-khoan/thay-doi-thong-tin/' .
                    Auth::user()->id .
                    '" style="color: #f8da45;" >
                    Thêm vào địa chỉ
                </a>để được giảm phí giao hàng )';
            }
        }
    @endphp
    <hr>
    <li class="total">
        {{ number_format($total_payment, 0, '', '.') }} đ
        <span>Tổng thanh toán</span>
    </li>
</ul>
