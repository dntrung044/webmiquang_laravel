@extends('admin.layout.main')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">
                            @if ($title)
                                {{ $title }}
                            @else
                                Quản lý
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{ route('coupons.update', $coupons->id) }}" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên:</label>
                                <input type="text" name="name" class="form-control" value="{{ $coupons->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mã giả giá:</label>
                                <input type="text" name="code" class="form-control" value="{{ $coupons->code }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">bắt đầu:</label>
                                <input type="date" name="date_start" class="form-control"
                                    value="{{ $coupons->date_start }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Hạn chót:</label>
                                <input type="date" name="date_end" class="form-control" value="{{ $coupons->date_end }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Số lượng:</label>
                                <input type="number" name="amount" class="form-control" value="{{ $coupons->amount }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số:</label>
                                <input type="number" name="number" class="form-control" value="{{ $coupons->number }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">tình trạng:</label>
                                <input type="text" name="condition" class="form-control"
                                    value="{{ $coupons->condition }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kích hoạt</label>
                                <div>
                                    <input type="radio" id="active" value="1" name="status"
                                        {{ $coupons->status == 1 ? 'checked="' : '' }}>
                                    <label for="active">Có</label>
                                </div>
                                <div>
                                    <input type="radio" value="0" name="status"
                                        {{ $coupons->status == 0 ? 'checked="' : '' }}>
                                    <label>Không</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/admin/postcategories/list"><button type="button"
                                    class="btn btn-secondary">Hủy</button></a>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
