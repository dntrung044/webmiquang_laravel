<!-- Add Product-->
<div class="modal fade" id="addProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title  fw-bold" id="leaveaddLabel"> Thêm món ăn</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="deadline-form">
                    <form id="add_product" action="/admin/products/add" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên món ăn</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control" placeholder="Nhập tên món ăn">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select class="form-select" name="cat_id" id="cat_id">
                                    @foreach ($productcategories as $productcategory)
                                        <option value="{{ $productcategory->id }}">
                                            {{ $productcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label class="form-label">Giá gốc</label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" id="price"
                                    class="form-control" placeholder="Nhập giá gốc">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Giá giảm</label>
                                <input type="number" name="price_sale" id="price_sale" value="{{ old('price_sale') }}"
                                    id="price" class="form-control" placeholder="Nhập giá giảm">
                            </div>
                        </div>

                        <div class="mb-3" style="margin-top: 15px">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" id="description"
                                placeholder="Nội dung mô tả"> {{ old('description') }} </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" name="content" id="content" rows="3"
                                placeholder="Nội dung mô tả chi tiết"> {{ old('content') }} </textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh món ăn</label>
                            <input class="form-control" type="file" id="upload" name="file" multiple=""
                                required="">

                            <div id="image_show">
                            </div>
                            <input type="hidden" name="thumb" id="thumb">
                        </div>

                        <div class="mb-3" style="margin-top: 15px">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active" checked="">
                                <label for="active" {{ old('available') == '1' ? 'checked' : '' }}>Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active">
                                <label for="no_active"
                                    {{ old('available') == '0' ? 'checked' : '' }}>Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm món</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

