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
                <div class="deadline-form">
                    <div class="col-3">
                        <div class="col-12 mb-3">
                            <label class="form-label">Phân quyền</label>
                            <select class="form-select" name="role_id">
                                <option value=""> Chọn danh mục </option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <label class="form-label">Trạng thái</label>
                        <div>
                            <input type="radio" class="edit_active_1 edit_active" value="1">
                            <label>Hoạt động</label>
                        </div>
                        <div>
                            <input type="radio" class="edit_active_0 edit_active" value="0">
                            <label>Khóa</label>
                        </div>

                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="button" class="btn btn-primary update_data">Cập nhập</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/user/edit1.blade.php ENDPATH**/ ?>