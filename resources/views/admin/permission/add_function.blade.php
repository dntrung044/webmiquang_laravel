<!-- Add function-->
<div class="modal fade" id="add_function_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold"> Thêm danh mục/Chức năng của danh mục quyền</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="save_msgList_function"></ul>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Tên danh mục/Chức năng(*Không dấu, ngăn cách "_")</label>
                        <input type="text" class="form-control name_function" placeholder="Nhập tên danh mục/Chức năng danh mục">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mô tả danh mục</label>
                        <input type="text" class="form-control description_function" placeholder="Nhập mô tả">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Chọn danh mục</label>
                    <select class="form-select parent_id_function selectFunction">
                        <option selected="" value="0">Danh mục lớn</option>
                    </select>
                </div>

                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Tên</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody class="ListPermissionCat">
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                <button type="button" class="btn btn-primary add_data_function">Tạo</button>
            </div>

        </div>
    </div>
</div>
