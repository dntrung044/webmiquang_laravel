@extends('admin.layout.main')

@section('layout/head')
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
            <!-- Add-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" value="{{ $product->name }}"class="form-control"
                                    placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select class="form-select" name="cat_id">
                                    <option value="0"> Danh Mục Cha </option>
                                    @foreach ($productcategories as $productcategory)
                                        <option value="{{ $productcategory->id }}"
                                            {{ $product->cat_id == $productcategory->id ? 'selected' : '' }}>
                                            {{ $productcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Giá gốc</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Giá giảm</label>
                                <input type="number" name="price_sale" value="{{ $product->price_sale }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" placeholder="Nội dung mô tả"> {{ $product->description }} </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" name="content" id="content" rows="3" placeholder="Nội dung mô tả chi tiết"> {{ $product->content }} </textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh Sản Phẩm</label>
                            <input class="form-control" type="file" id="upload" name="file">

                            <div id="image_show">
                                <a href="{{ $product->thumb }}" target="_blank">
                                    <img src="{{ $product->thumb }}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active"
                                    {{ $product->active == 1 ? 'checked="' : '' }}>
                                <label for="active">Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active"
                                    {{ $product->active == 0 ? 'checked="' : '' }}>
                                <label for="no_active">Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="/admin/products/list"class="btn btn-secondary">Hủy </a>
                            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('layout/footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
