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
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            {{-- List --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Thông tin</th>
                                        {{-- <th>Địa chỉ Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th> --}}
                                        <th>Vai trò</th>
                                        <th>Cấp bậc</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <li> {{ $user->name }}</li>
                                            <li>{{ $user->email }}</li>
                                            <li>{{ $user->phone }}</li>
                                            <li>{{ $user->address }}</li>
                                        </td>

                                        <td>
                                            {{-- {{ $user->roles->name }} --}}
                                        </td>
                                        <td>
                                            @if ($user->level == 1)
                                                <span class="badge bg-black">Quản trị</span>
                                            @else
                                                <span class="badge bg-info-light">Người dùng</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->active == 1)
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-danger">Tắt hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/admin/authorization/members/edit/{{ $user->id }}">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="#"
                                                        onclick="removeRow({{ $user->id }}, '/admin/authorization/members/destroy')">
                                                        <i class="icofont-ui-delete text-danger"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
