@extends('admin.layout.main')
@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#addRole">
                                <i class="icofont-plus-circle me-2 fs-6"></i>
                                Thêm danh mục
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- List --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div id="success_message"></div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Tên vai trò</th>
                                        <th>Mô tả</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>
                                                <button type="button" value="{{ $role->id }}"
                                                    class="btn btn-outline-secondary btn_edit">
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                                <button type="button" value="{{ $role->id }}"
                                                    class="btn btn-outline-secondary btn_delete">
                                                    <i class="icofont-ui-delete text-danger"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.role.add')
            @include('admin.role.edit')
            @include('admin.role.delete')
        </div>
    </div>
@endsection
@section('script')
    <script>
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
    </script>
@endsection
