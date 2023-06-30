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
                                data-bs-target="#add_modal">
                                <i class="icofont-plus-circle me-2 fs-6"></i> Thêm quyền mới
                            </button>
                            <button type="button" class="btn btn-outline-secondary ml-2" data-bs-toggle="modal"
                                data-bs-target="#add_function_modal">
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
                                                    <input type="checkbox" class="check" value="{{ $permissionItem->id }}">
                                                    <span>{{ $permissionItem->id }}</span>
                                                </label>
                                            </td>
                                            <td>{{ $permissionItem->name }} ( {{ $permissionItem->description }} )</td>
                                            <td>{{ $permissionItem->key_code }}</td>
                                            <td>
                                                <button type="button" value="{{ $permissionItem->id }}"
                                                    class="btn btn-outline-secondary btn_edit">
                                                    <i class="icofont-edit text-success"></i>Sửa
                                                </button>

                                                <button type="button" value="{{ $permissionItem->id }}"
                                                    class="btn btn-outline-secondary btn_delete">
                                                    <i class="icofont-ui-delete text-danger"></i>Xóa
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
            {{ $permissions->links() }}
            @include('admin.permission.add')
            @include('admin.permission.edit')
            @include('admin.permission.delete')
            @include('admin.permission.add_function')
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {

            ShowListPermissionCat();
            showSelectFunction();

            function ShowListPermissionCat() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('permissionCat.show') }}",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.datalist);
                        $('.ListPermissionCat').html("");
                        $.each(response.ListPermissionCats, function(key, item) {
                            $('.ListPermissionCat').append(
                                '<tr>\
                                        <td  class="fw-bold text-secondary">\
                                            <label class="fancy-checkbox">\
                                                <span>#' + item.id + '</span>\
                                            </label>\
                                        </td>\
                                        <td>' + item.name + '</td>\
                                        <td>' + item.parent_id + '</td>\
                                        <td>\
                                            <button type="button" value="' + item.id + '" class="btn btn-outline-secondary btn_edit"><i class="icofont-edit text-success"></i></button>\
                                            <button type="button" value="' + item.id + '" class="btn btn-outline-secondary btn_delete"><i class="icofont-ui-delete text-danger"></i></button>\
                                        </td>\
                                    \</tr>');
                        });
                    }
                });
            }

            function showSelectFunction() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('function.show') }}",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.datalist);
                        $('.selectFunction').html("");
                        $('.selectFunction').append(
                            '<option selected="" value="0">Danh mục lớn</option>');
                        $.each(response.functions, function(key, item) {

                            $('.selectFunction').append(
                                ' <option  value="' + item.name + '">--Chức năng của ' +
                                item.name + '--</option>');
                        });
                    }
                });
            }

            $(document).on('click', '.add_data_function', function(e) {
                e.preventDefault();
                $(this).text('Đang tạo danh mục..');

                var data = {
                    'name': $('.name_function').val(),
                    'description': $('.description_function').val(),
                    'parent_id': $('.parent_id_function').val(),

                }

                console.log(data);

                $.ajax({
                    type: "POST",
                    url: "{{ route('permissionCat.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#save_msgList_function').html("");
                            $('#save_msgList_function').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#save_msgList_function').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.add_data_function').text('Tạo danh mục');
                        } else {
                            $('#save_msgList_function').html("");
                            $('#save_msgList_function').addClass('alert alert-success');
                            $('#save_msgList_function').text(response.message);
                            $('.add_data_function').text('Tạo danh mục');
                            $('.name_function').text('');

                            ShowListPermissionCat();
                            showSelectFunction();
                        }
                    }
                });

            });

            $('.chilrent-all').click(function() {
                $('.functions').prop('checked', this.checked);
            });

            $(document).on('click', '.add_data', function(e) {
                e.preventDefault();

                $(this).text('Đang tạo..');

                // var checkboxValues = [];
                // $('.functions:checked').map(function() {
                //             checkboxValues.push($(this).val());
                // });
                var checkboxValues = $.map($('.functions:checked'), function(c) {
                    return c.value;
                });

                var data = {
                    'name': $('.name').val(),
                    'description': $('.description').val(),
                    'functions': checkboxValues,
                }

                // console.log(data);

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
                            $('.add_data').text('Tạo');
                        } else {
                            $('#add_permission').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#add_modal').find('input').val('');
                            $('.add_data').text('Tạo');
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
                            // $('.edit_name[value="' + data.name+ '"]').prop('selected', true);
                            $('.edit_display_name[value="' + data.display_name + '"]').prop(
                                'checked', true);
                            $('#edit_key_code').val(data.key_code);
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
                    // 'name': $('#edit_name').val(),
                    // 'function': $('#edit_function').val(),
                    'description': $('#edit_description').val(),
                    'key_code': $('#edit_key_code').val(),
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

            $('.choose').on('change', function() {
                var action = $(this).attr('name');
                var name_parent = $(this).val();
                var result = '';

                if (action == 'name') {
                    result = 'parent_id'
                }

                $.ajax({
                    url: '{{ route('permission.load_function') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        parent_id: name_parent,
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });

        });
    </script>
@endsection
