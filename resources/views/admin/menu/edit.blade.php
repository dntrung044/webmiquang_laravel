@extends('admin.layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
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

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{ route('banners.update', ['menu'=> $menu->id]) }}" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" name="name" value="{{ $menu->name }}" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Đường dẫn</label>
                                <input type="text" name="link" value="{{ $menu->link }}" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" rows="3"
                                placeholder="Nội dung mô tả"> {{ $menu->description }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Hình ảnh</label>
                            <input class="form-control" type="file" id="upload" name="file" multiple="">

                            <div id="image_show">
                                <a href="{{ $menu->thumb}}" target="_blank">
                                   <img src="{{ $menu->thumb}}" alt="error" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="{{ $menu->thumb}}" id="thumb">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active"
                                    {{ $menu->active == 1 ? 'checked=""' : '' }}>
                                <label for="active">Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active"
                                    {{ $menu->active == 0 ? 'checked=""' : '' }}>
                                <label for="no_active">Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="/admin/menus/list" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
