
$(document).ready(function() {
    $('#checkbox_add_all').on('click', function() {
        var isChecked = $(this).prop('checked');
        $(this).parents().find('.checkbox_role_add').prop('checked', isChecked);
    });

    $('#checkbox_edit_all').on('click', function() {
        var isChecked = $(this).prop('checked');
        $(this).parents().find('.checkbox_role_edit').prop('checked', isChecked);
    });

    $('#add_data').on('click', function(e) {
        e.preventDefault();
        $(this).text('Đang tạo..');

        var name = $('.name_add').val();
        var description = $('.description_add').val();
        var permissions = [];

        $('.checkbox_role_add:checked').each(function() {
            permissions.push($(this).val());
        });

        var data = {
            'name': name,
            'description': description,
            'permission_id': permissions,
        };
        console.log(data);

        $.ajax({
            type: "POST",
            url: "{{ route('role.store') }}",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_value) {
                        $('#save_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('#add_data').text('Tạo');
                } else {
                    $('#add_permission').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#add_modal').find('input').val('');
                    $('#add_data').text('Tạo');
                    $('#add_modal').modal('hide');
                    location.reload();
                }
            }
        });

    });
    $('.btn_edit').on('click', function(e) {
        e.preventDefault();
        var id = $(this).val();
        $('#edit_modal').modal('show');
        var url = '{{ route('role.edit', ':id') }}';
        var url = editRoute.replace(':id', id);
        url = url.replace(':id', id);

        $.ajax({
            type: "GET",
            url: url,
            success: function(response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                    $('#edit_modal').modal('hide');
                } else {
                    let checkedPermissions = response.permissions;
                    // Đặt trạng thái checked cho các checkbox tương ứng
                    $('.checkbox_role_edit').each(function() {
                        var permissionId = $(this).val();
                        $(this).prop('checked', checkedPermissions.some(
                                permission => permission.id == permissionId
                                ));
                    });
                    let data = response.data;
                    $('#edit_name').val(data.name);
                    $('#edit_description').val(data.description);
                    $('#edit_id').val(id);
                }
            }
        });
        $('.btn-close').find('input').val('');
    });

    $('.update_data').on('click', function(e) {
        e.preventDefault();

        $(this).text('Đang cập nhật..');
        var id = $('#edit_id').val();
        var selectedPermissionIds = [];

        $('.checkbox_role_edit:checked').each(function() {
            selectedPermissionIds.push($(this).val());
        });

        var url = '{{ route('role.update', ':id') }}';
        url = url.replace(':id', id);


        var data = {
            'description': $('#edit_description').val(),
            'name': $('#edit_name').val(),
            // 'permission_id': $('#name[]').val(),
            'permission_id': selectedPermissionIds,
        }

        console.log(data);
        $.ajax({
            type: "PUT",
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_value) {
                        $('#update_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                    $('.update_data').text('Cập nhật');
                } else {
                    $('#update_msgList').html("");
                    $('#update_msgList').removeClass('alert alert-danger');

                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#edit_modal').find('input').val('');
                    $('.update_data').text('Cập nhật');
                    $('#edit_modal').modal('hide');
                    location.reload();
                }
            }
        });

    });
    $('.btn_delete').on('click', function() {
        var id = $(this).val();
        $('#delete_modal').modal('show');
        $('#deleteing_id').val(id);
    });

    $('.delete_data').on('click', function(e) {
        e.preventDefault();

        $(this).text('Đang xóa..');
        var id = $('#deleteing_id').val();
        var url = '{{ route('role.destroy', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            type: "DELETE",
            url: url,
            dataType: "json",
            success: function(response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                    $('.delete_data').text('Có Xóa');
                } else {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.delete_data').text('Có Xóa');
                    $('#delete_modal').modal('hide');
                    location.reload();
                }
            }
        });
    });
});
