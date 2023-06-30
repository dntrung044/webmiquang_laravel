<!-- Add Role-->
<div class="modal fade" id="addRole" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="createprojectlLabelone"> Thêm vai trò</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" data-url="{{ route('roles.store') }}" method="POST" role="form">
			@csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tên vài trò</label>
                    <input type="text" name="name" id="#name-add" value="{{ old('name') }}"class="form-control"  placeholder="Nhập tên vai trò">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea  id="#description-add" class="form-control" name="description" rows="3">{{ old('description') }} </textarea>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Danh mục</th>
                                <th class="text-center">Chức năng</th>
                                <th class="text-center" style="margin-left: 2em">
                                    Tất cả các vai trò
                                    <input class="form-check-input checkbox_all" type="checkbox">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permissionItem )
                            <tr class="parent">
                                <td class="fw-bold">
                                    <h6> Danh mục {{$permissionItem->name}}
                                        <input class="form-check-input checkbox_wrapper" type="checkbox" id="checkAllRoles">
                                    </h6>
                                </td>
                                @foreach ($permissionItem->functions as $functionItem)
                                    <td class="text-center">
                                        <p>{{$functionItem->name}}
                                            <input class="form-check-input checkbox_childrent" name="permission_id[]" type="checkbox" value="{{$functionItem->id}}">
                                        </p>
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                <button type="submit" class="btn btn-primary">Tạo vai trò</button>
            </div>
            </form>
        </div>
    </div>
</div>
