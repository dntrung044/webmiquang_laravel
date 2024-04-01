$(document).ready(function () {
    let cart = $('#cart_shake');
    $('.add_to_cart').click(function (e) {
        e.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).data('url');
        var id = $(this).data('id');

        shake();
        imgtoCart($(this));

        $.ajax({
            url: url,
            method: 'POST',
            data: { _token: _token, product_id: id },

            success: function (data) {
                if (data.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: 'Đã thêm món ăn vào giỏ hàng!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                         $('#cart_list').html(data.cart_compoment);
                    });
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('.action_delete').click(function (e) {
        e.preventDefault();
        var productId = $(this).data("id");
        var url = $(this).data('url');
        Swal.fire({
            title: 'Bạn có chắc món ăn này không?',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vâng, xóa nó!',
            cancelButtonText: 'Hủy',
            closeOnConfirm: false
        }).then(function (e) {
            if (e.value === true) {

                shake_dec();

                $.ajax({
                    url: url,
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: productId },
                    success: function (data) {
                        if (data.code === 200) {
                            Swal.fire({
                                type: 'success',
                                title: 'Đã xóa món ăn ra khỏi giỏ hàng!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $('#cart_list').html(data.cart_compoment);
                            });

                        } else {
                            Swal.fire({
                                type: 'error',
                                title: data.success,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            }
            else {
                e.dismiss;
            }
        });
    });

    function shake() {
        var cartTotal = cart.attr('data-totalitems');
        var newCartTotal = parseInt(cartTotal) + 1;
        cart.addClass('shake').attr('data-totalitems', newCartTotal);
        setTimeout(function () {
            cart.removeClass('shake');
        }, 1000);
    }

    function shake_dec() {
        var cartTotal = cart.attr('data-totalitems');
        var newCartTotal = parseInt(cartTotal) - 1;
        cart.addClass('shake').attr('data-totalitems', newCartTotal);
        setTimeout(function () {
            cart.removeClass('shake');
        }, 1000);
    }

    function imgtoCart(element) {
        var imgtodrag = element.parent('.btn_1').parent('.add_cart')
            .parent("figure").find("img").eq(0);

        if (imgtodrag) {
            var imgclone = imgtodrag.clone().offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            }).css({
                'opacity': '0.8',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '100'
            }).appendTo($('body')).animate({
                'top': cart.offset().top + 20,
                'left': cart.offset().left + 30,
                'width': 75,
                'height': 75
            }, 1000, 'easeInOutExpo');

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
    }
});
/*Form Opent*/
function OpentForm() {
    document.getElementById("myForm").style.display = "block";
}
/*Form Close*/
function CloseForm() {
    document.getElementById("myForm").style.display = "none";
}
