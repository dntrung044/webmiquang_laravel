<!-- Edit Product-->
<div class="modal fade" id="product-edit" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="edittickitLabel"> Sửa Món Ăn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Tên món ăn</label>
                            <input type="text" name="name" value="{{ $products->name }}" class="form-control"
                                placeholder="Nhập tên món ăn">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Danh mục</label>
                            <select class="form-select" name="cat_id">
                                @foreach ($productcategories as $productcategory)
                                    <option value="{{ $productcategory->id }}"
                                        {{ $products->cat_id == $productcategory->id ? 'selected' : '' }}>
                                        {{ $productcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Giá gốc</label>
                            <input type="number" name="price" value="{{ $products->price }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Giá giảm</label>
                            <input type="number" name="price_sale" value="{{ $products->price_sale }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description"
                            placeholder="Nội dung mô tả"> {{ $products->description }} </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả chi tiết</label>
                        <textarea class="form-control" name="content" id="content" rows="3"
                            placeholder="Nội dung mô tả chi tiết"> {{ $products->content }} </textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="menu" class="form-label"> Ảnh Sản Phẩm</label>
                        <input class="form-control" type="file" id="upload" name="file">

                        <div id="image_show">
                            <a href="{{ $products->thumb }}" target="_blank">
                                <img src="{{ $products->thumb }}" width="100px">
                            </a>
                        </div>
                        <input type="hidden" name="thumb" value="{{ $products->thumb }}" id="thumb">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kích hoạt</label>
                        <div>
                            <input type="radio" id="active" value="1" name="active"
                                {{ $products->active == 1 ? 'checked="' : '' }}>
                            <label for="active">Có</label>
                        </div>
                        <div>
                            <input type="radio" id="no_active" value="0" name="active"
                                {{ $products->active == 0 ? 'checked="' : '' }}>
                            <label for="no_active">Không</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="/admin/products/list" class="btn btn-secondary">Hủy </a>
                        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                    </div>
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Sửa món</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
