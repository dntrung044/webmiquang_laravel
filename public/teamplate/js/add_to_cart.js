$(document).ready(function () {
    let cart = $('#cart_shake');
    $('.add-to-cart').click(function () {
        var addToCartURL = $(this).data('url');
        //Cart shake 
        shake();
        //img to Cart  
        imgtoCart($(this));
        //add to Cart 
        addtoCart(addToCartURL);
    });

    function shake() {
        var cartTotal = cart.attr('data-totalitems');
        var newCartTotal = parseInt(cartTotal) + 1;
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

    //ajax add to cart
    function addtoCart(addToCartURL) {
        $.ajax({
            url: addToCartURL,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: 'Đã thêm món ăn vào giỏ hàng!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        $('.cart').html(data.cart_compoment);
                    });
                }
            },
            error: function () {

            }
        });
    }
    //end add to cart 

});
/*Form Opent*/
function OpentForm() {
    document.getElementById("myForm").style.display = "block";
}
/*Form Close*/
function CloseForm() {
    document.getElementById("myForm").style.display = "none";
}