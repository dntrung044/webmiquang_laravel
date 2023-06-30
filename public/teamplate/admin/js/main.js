$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// Delete
function removeRow(id, url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (confirm('Bạn có chắc chắn muốn xóa không ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi :(');
                }
            }

        })
    }
}

/*Upload File */
$('#upload').change(function() {
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
        success: function(results) {
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
