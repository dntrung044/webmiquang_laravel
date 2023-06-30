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

            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên tiêu đề</label>
                                <input type="text" name="name" class="form-control" value="{{ $productcategory->name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kích hoạt</label>
                                <div>
                                    <input type="radio" id="active" value="1" name="active" 
                                    {{ $productcategory->active == 1 ? 'checked="' : ''}}>
                                    <label for="active">Có</label>
                                </div>
                                <div>
                                    <input type="radio" id="no_active" value="0" name="active"
                                    {{ $productcategory->active == 0 ? 'checked="' : ''}}>
                                    <label for="no_active">Không</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="/admin/postcategories/list"><button type="button" class="btn btn-secondary">Hủy</button></a>
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                            @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

