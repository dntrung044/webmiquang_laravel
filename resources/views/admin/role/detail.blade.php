{{-- Modal show chi tiết todo --}}
<div class="modal fade" id="show">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<h2>Thông tin:</h2>
				id: <h1 id="id"></h1>
				Tên: <h1 id="name"></h1>
				mood ta: <h1 id="description"></h1>
				{{-- Ngày sinh: <h1 id="ngaysinh"></h1>
				Số điện thoại: <h1 id="sdt"></h1>
				Địa chỉ: <h1 id="diachi"></h1> --}}
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
			</div>
		</div>
	</div>
</div>
