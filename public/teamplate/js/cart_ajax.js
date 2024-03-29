$(document).ready(function () {
    $(document).on("click", ".cart_decrease", function () {
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
                    $('#cart_list').html(data.cart_compoment);
                    $('#cart_total').html(data.payment_compoment);
                }  else {
                    Swal.fire({
                        type: 'error',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).on("click", ".cart_increase", function () {
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
                    $('#cart_list').html(data.cart_compoment);
                    $('#cart_total').html(data.payment_compoment);
                }  else {
                    Swal.fire({
                        type: 'error',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).on("click", ".check_coupon", function (e) {
        e.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr('content');
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
                        $('#cart_list').html(data.cart_compoment);
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
            cancelButtonText: 'Hủy',
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
                                $('#cart_list').html(data.cart_compoment);
                                $('#cart_total').html(data.payment_compoment);
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
