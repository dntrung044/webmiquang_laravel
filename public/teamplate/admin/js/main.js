$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// Delete funtion
function removeRow(id, url) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa không?',
        text: 'Hành động này không thể hoàn tác!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((isConfirm) => {
        if (isConfirm.value === true) {
            $.ajax({
                type: 'DELETE',
                dataType: 'JSON',
                data: { id },
                url: url,
                success: function (result) {
                    if (result.error === false) {
                        Swal.fire({
                            title: 'Thành công!',
                            text: result.message,
                            type: 'success'
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            title: 'Lỗi!',
                            text: 'Xóa không thành công: ' + result.message,
                            type: 'error'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Đã có lỗi xảy ra trong quá trình xóa. Vui lòng kiểm tra console log để biết thêm chi tiết.',
                        type: 'error'
                    });
                }
            });
        }
    });
}


$(document).ready(function () {
    /*Upload File */
    $('#upload').change(function () {
        const form = new FormData();
        form.append('file', $(this)[0].files[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'JSON',
            data: form,
            url: '/admin/upload/services',
            success: function (results) {
                if (results.error === false) {
                    $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
                        '<img src="' + results.url + '" width="100px"></a>');

                    $('#thumb').val(results.url);
                } else {
                    alert('Upload File Lỗi');
                }
            }
        });
    });

    // format price
    // $('#price').keyup(function() {
    //     var val = $(this).val();
    //     if (isNaN(val)) {
    //         val = val.replace(/[^0-9\.]/g, '');
    //         if (val.split('.').length > 2)
    //             val = val.replace(/\.+$/, "");
    //     }
    //     $(this).val(val);
    // });
    //
    // $('#price_sale').keyup(function() {
    //     var val = $(this).val();
    //     if (isNaN(val)) {
    //         val = val.replace(/[^0-9\.]/g, '');
    //         if (val.split('.').length > 2)
    //             val = val.replace(/\.+$/, "");
    //     }
    //     $(this).val(val);
    // });

    $('.btn_logout').on('click', function () {
        $('#logout_modal').modal('show');
    });

    // dataTable
    $('#myProjectTable').addClass('nowrap').dataTable({
        paging: true,
        info: true,
        responsive: true,
        columnDefs: [{
            targets: [-1, -3],
            className: 'dt-body-right'
        }],
        language: {
            "sProcessing": "Đang xử lý...",
            "sLengthMenu": "Hiển thị _MENU_ thông tin",
            "sZeroRecords": "Không tìm thấy dữ liệu",
            "sInfo": "Hiển thị từ _START_ đến _END_ của _TOTAL_ thông tin",
            "sInfoEmpty": "Hiển thị từ 0 đến 0 của 0 thông tin",
            "sInfoFiltered": "(được lọc từ _MAX_ thông tin)",
            "sInfoPostFix": "",
            "sSearch": "Tìm kiếm:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Đầu",
                "sPrevious": "Trước",
                "sNext": "Tiếp",
                "sLast": "Cuối"
            }
        },
        order: [
            [0, 'desc']
        ]
    });
});
