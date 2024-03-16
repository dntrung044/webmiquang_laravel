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
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#add_modal">
                                <i class="icofont-plus-circle me-2 fs-6"></i> Thêm quyền mới
                            </button>
                            <button type="button" class="btn btn-outline-secondary ml-2" data-bs-toggle="modal" data-bs-target="#add_function_modal">
                                <i class="icofont-plus-circle me-2 fs-6"></i>Thêm danh mục
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div id="success_message"></div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên</th>
                                        <th>Key</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $key => $permissionItem)
                                    <tr>
                                        <td class="fw-bold text-secondary">
                                            <label class="fancy-checkbox">
                                                <span>{{  $permissionItem->id }}</span>
                                            </label>
                                        </td>
                                        <td>{{ $permissionItem->name }} ( {{ $permissionItem->description  }} )</td>
                                        <td>{{  $permissionItem->key_code }}</td>
                                        <td>
                                            <button type="button" value="{{  $permissionItem->id }}" class="btn btn-outline-secondary btn_edit">
                                                <i class="icofont-edit text-success"></i>
                                            </button>

                                            <button type="button" value="{{  $permissionItem->id }}" class="btn btn-outline-secondary btn_delete">
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
            @include('admin.permission.add')
            @include('admin.permission.edit')
            @include('admin.permission.delete')
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#add_data', function(e) {
                e.preventDefault();
                $(this).text('Đang tạo..');

                var name = $('.name_add').val();
                var description = $('.description_add').val();
                var data = {
                    'name': name,
                    'description': description,
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('permission.store') }}",
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

            $(document).on('click', '.btn_edit', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $('#edit_modal').modal('show');
                var url = '{{ route('permission.edit', ':id') }}';
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
                            let data = response.data;
                            $('#edit_name').val(data.name);
                            $('#edit_description').val(data.description);
                            $('#edit_id').val(id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_data', function(e) {
                e.preventDefault();

                $(this).text('Đang cập nhật..');
                var id = $('#edit_id').val();
                var url = '{{ route('permission.update', ':id') }}';
                url = url.replace(':id', id);

                var data = {
                    'description': $('#edit_description').val(),
                    'name': $('#edit_name').val(),
                }

                $.ajax({
                    type: "PUT",
                    url: url,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
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

            $(document).on('click', '.btn_delete', function() {
                var id = $(this).val();
                $('#delete_modal').modal('show');
                $('#deleteing_id').val(id);
            });

            $(document).on('click', '.delete_data', function(e) {
                e.preventDefault();

                $(this).text('Đang xóa..');
                var id = $('#deleteing_id').val();
                var url = '{{ route('permission.destroy', ':id') }}';
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
