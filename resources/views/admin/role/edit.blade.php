<!-- Edit Role-->
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

            <form action="" id="form-edit" method="POST" role="form">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên vài trò</label>
                        <input type="text" name="name" id="#name-edit" value="{{ $role->name }}" class="form-control"  placeholder="Nhập tên vai trò">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea  id="#description-edit" class="form-control" name="description" rows="3"
                            placeholder="Nhập nội dung mô tả">{{ $role->description }}</textarea>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th class="fw-bold">Danh mục quản lý</th>
                                    <th>Nội dung
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permissionItem)
                                <tr class="parent">
                                    <td class="fw-bold">
                                        <p> Danh mục {{ $permissionItem->name }}
                                            <input class="form-check-input checkbox_wrapper" type="checkbox" id="checkAllRoles">
                                        </p>
                                    </td>
                                    @foreach($permissionItem->functions as $functionItem)
                                        <td class="text-center">
                                            <p>{{$functionItem->function}}</p>
                                            <input class="form-check-input checkbox_childrent" type="checkbox"
                                            name="permission_id[]" value="{{ $functionItem->id }}"
                                            {{ $pemissionsChecked->contains('id', $functionItem->id) ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                <td class="fw-bold">
                                    Tất cả các vai trò
                                    <input class="form-check-input checkbox_all" type="checkbox">
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('roles') }}" class="btn btn-secondary" >Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">Cập nhập vai trò</button>
                </div>
            </form>
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
@endsection


