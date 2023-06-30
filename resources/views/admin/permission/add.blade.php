<!-- Add Permission-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold"> Thêm quyền</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Tên quyền(*Tiếng Anh không dấu)</label>
                        <select class="form-select choose name" name="name" id="name">
                            <option selected="">Chọn phân quyền danh mục</option>
                            @foreach($permissioncats as $permissionCatItem)
                                <option value="{{ $permissionCatItem->name }}">{{ $permissionCatItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mô tả tên quyền</label>
                        <input type="text" class="description form-control" placeholder="Nhập mô tả danh mục">
                    </div>
                </div>

                <div class="mt-2">
                    <div class="form-group">
                        <label class="form-label">Chức năng</label>
                        <div class="row">
                            <div class="col-md-6 parent_id" name="parent_id" id="parent_id">
                               <p>Chọn tên danh mục để hiển thị chức năng!</p>
                            </div>

                            <label class="fancy-checkbox" style="font-size: 18px; text-align: center;color: rgb(0, 0, 0); margin-top: 10px;">
                                <input type="checkbox" class="chilrent-all">
                                <span>Tất cả</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                <button type="button" class="btn btn-primary add_data">Tạo</button>
            </div>

        </div>
    </div>
</div>
