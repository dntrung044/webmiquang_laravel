// Thêm nút "inc" và "dec" vào mỗi phần tử "numbers-row" nếu chưa tồn tại
$(".numbers-row").each(function() {
    if ($(this).find('.inc').length === 0 && $(this).find('.dec').length === 0) {
        $(this).append('<div class="inc button_inc cart_increase">+</div><div class="dec button_inc cart_decrease">-</div>');
    }
});

// Xử lý sự kiện khi nút "inc" hoặc "dec" được nhấn (sử dụng off() trước khi on())
$(".button_inc").off().on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Không cho giá trị giảm dưới zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    $button.parent().find("input").val(newVal);
});
