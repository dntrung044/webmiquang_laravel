<!-- Edit Permission-->
<div class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Chỉnh sửa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="update_msgList"></ul>
                <input type="hidden" id="edit_id" />
                <div class="mb-3">
                    <label class="form-label">Mô tả danh mục:</label>
                    <textarea class="form-control" rows="3" id="edit_description"
                        placeholder="Nhập nội dung mô tả">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên:</label>
                    <textarea class="form-control" rows="3" id="edit_name"
                        placeholder="Nhập tên">{{ old('name') }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                <button type="button" class="btn btn-primary update_data">Cập nhập</button>
            </div>
        </div>
    </div>
</div>
