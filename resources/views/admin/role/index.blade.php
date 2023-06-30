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
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#addRole">
                                <i class="icofont-plus-circle me-2 fs-6"></i>
                                Thêm danh mục
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            {{-- List --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
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
                                            {{-- <td>{{ !empty($role->roleCategory) ? $role->roleCategory->name : ''}}</td> --}}

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" data-url="{{ route('roles.show',$role->id) }}" class="btn btn-outline-secondary btn-show" data-bs-toggle="modal" data-bs-target="#show">
                                                        <i class="icofont-external-link text-success"></i>
                                                    </button>
                                                    {{-- <button type="button" data-url="{{ route('roles.update',$role->id) }}" class="btn btn-outline-secondary btn-edit" data-bs-toggle="modal" data-bs-target="#editRole">
                                                        <i class="icofont-edit text-success"></i>
                                                    </button> --}}
                                                    <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-outline-secondary btn-edit">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                    <button type="button" value="{{ $role->id }}" class="btn btn-outline-secondary btn_delete">
                                                        <i class="icofont-ui-delete text-danger"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            {!! $roles->links() !!}
            @include('admin.role.add')
            @include('admin.role.delete')
            @include('admin.role.detail')

        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('.checkbox_wrapper').on('click', function(){
            $(this).parents('.parent').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        });

        $('.checkbox_all').on('click', function() {
            $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
            $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn_delete', function() {
                var id = $(this).val();
                $('#delete_modal').modal('show');
                $('#deleteing_id').val(id);
            });

            $(document).on('click', '.delete_data', function(e) {
                e.preventDefault();

                $(this).text('Đang xóa..');
                var id = $('#deleteing_id').val();
                var url = '{{ route('roles.destroy', ':id') }}';
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
