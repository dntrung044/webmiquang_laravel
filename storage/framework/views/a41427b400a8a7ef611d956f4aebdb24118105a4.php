<!-- Delete Modal-->
<div class="modal fade" id="delete_modal" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <input type="hidden" id="deleteing_id">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="deleteprojectLabel"> Xóa mục này?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body justify-content-center flex-column d-flex">
                <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                <p class="mt-4 fs-5 text-center">Bạn sẽ không thể khôi phục sau khi xóa!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger color-fff delete_data">Xóa</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/user/delete.blade.php ENDPATH**/ ?>