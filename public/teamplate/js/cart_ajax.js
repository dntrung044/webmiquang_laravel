$(document).ready(function () {
    // Sự kiện nhấn nút "+"    
    $(document).on("click", ".inc", function () {
        var productId = $(this).data("id");
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'get',
            data: {
                product_id: productId,
            },
            success: function (data) {
                if (data.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        $('.cart-list').html(data.cart_compoment);
                        $('#cart_total').html(data.payment_compoment);
                    });
                }
            },
            error: function (error) {
                // Xử lý lỗi (nếu có)
                console.log(error);
            }
        });
    });
    // Sự kiện nhấn nút "-"    
    $(document).on("click", ".dec", function () {
        var productId = $(this).data("id");
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'get',
            data: {
                product_id: productId,
            },
            success: function (data) {
                if (data.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        $('.cart-list').html(data.cart_compoment);
                        $('#cart_total').html(data.payment_compoment);
                    });
                }
            },
            error: function (error) {
                // Xử lý lỗi (nếu có)
                console.log(error);
            }
        });
    });

    $(document).on("click", ".check_coupon", function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var coupon = $("input[name='coupon']").val();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            method: 'POST',
            data: { _token: _token, coupon_input: coupon },
            success: function (data) {
                if (data.code === 200) {
                    $('#payment_compoment').html(data.payment_compoment);
                    Swal.fire({
                        type: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        $('.cart-list').html(data.cart_compoment);
                        $('#cart_total').html(data.payment_compoment);
                    });

                }
            }
        });

    });

    $(document).on("click", ".action_delete", function (e) {
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
            closeOnConfirm: false
        }).then(function (e) {
            if (e.value === true) {
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
                                title: data.success,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $('.cart-list').html(data.cart_compoment);
                                $('#cart_total').html(data.payment_compoment);
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

});