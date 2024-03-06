@extends('admin.layout.main')

@section('layout/head')
    <style>
        .rating.active {
            color: #fec348;
        }

    </style>
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
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#Proadd">
                                <i class="icofont-plus-circle me-2 fs-6"></i>Thêm món ăn
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List Product -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th style="width: 220px">Chi tiết món ăn </th>
                                        <th>Danh mục</th>
                                        <th>Hình</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        @php
                                            $age = 0;
                                            if ($product->total_rating) {
                                                $age = round($product->total_number / $product->total_rating, 2);
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}
                                                <ul>
                                                    <li>
                                                        <i class="icofont-price"></i>
                                                        <span>{{ number_format($product->price, 0, '', '.') }}đ</span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-sale-discount"></i>
                                                        <span>{{ number_format($product->price_sale, 0, '', '.') }}đ</span>
                                                    </li>
                                                    <li>
                                                        <span class="rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="{{ $i <= $age ? 'icofont-star ' : '' }}"></i>
                                                            @endfor
                                                            <em>{{ $age }}/5.0</em>
                                                        </span>
                                                    </li>

                                                </ul>
                                            </td>
                                            <td>{{ !empty($product->productcategory) ? $product->productcategory->name : '' }}
                                            </td>
                                            <td>
                                                <a href="{{ $product->thumb }}" target="_blank">
                                                    <img src="{{ $product->thumb }}" style="height:50px;">
                                                </a>
                                            </td>
                                            <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button href="#" class="btn btn-outline-secondary" data-toggle="tooltip"
                                                        data-placement="top" onclick="GetData('{{ $product->id }}')"
                                                        title="" data-original-title="Edit">
                                                        <i class="icofont-edit text-success"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#EditProduct">
                                                        <i class="icofont-edit text-success"></i></button>

                                                    <a data-toggle="tooltip"
                                                        href="{{ URL::to('admin/product-images/' . $product->id) }}"
                                                        data-original-title="View">
                                                        <button type="button" class="btn btn-outline-secondary">
                                                            {{-- <i class="icofont-edit text-success"></i> --}}
                                                            <span class="badge badge-warning">View</span>
                                                        </button>
                                                    </a>


                                                    <button type="button" class="btn btn-outline-secondary deleterow">
                                                        <a href="#"
                                                            onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </a>
                                                    </button>
                                                </div>

                                                {{-- <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="/admin/products/edit/{{ $product->id }}">
                                                            <i class="icofont-edit text-success"></i>
                                                        </a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-secondary deleterow">
                                                        <a href="#"
                                                            onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </a>
                                                    </button>
                                                </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            {!! $products->links() !!}


            <!-- Add Product-->
            <div class="modal fade" id="Proadd" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Thêm món ăn</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="deadline-form">
                                <form id="add_product" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Tên món ăn</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="Nhập tên món ăn">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Danh mục</label>
                                            <select class="form-select" name="cat_id">
                                                @foreach ($productcategories as $productcategory)
                                                    <option value="{{ $productcategory->id }}">
                                                        {{ $productcategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Giá gốc</label>
                                            <input type="text" name="price" value="{{ old('price') }}" id="price"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Giá giảm</label>
                                            <input type="text" name="price_sale" value="{{ old('price_sale') }}"
                                                id="price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description"
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

                                    <div class="mb-3">
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
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Product-->
                <div class="modal fade" id="EditProduct" tabindex="-1" aria-labelledby="exampleModalLabeledit"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  fw-bold" id="edittickitLabel"> Sửa Món Ăn</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editproduct" name="editproduct" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Tên sản phẩm</label>
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control" placeholder="Nhập tên sản phẩm">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Danh mục</label>
                                            <select class="form-select" name="cat_id">
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
                                            <input type="number" name="price" value="{{ $product->price }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Giá giảm</label>
                                            <input type="number" name="price_sale" value="{{ $product->price_sale }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description"
                                            placeholder="Nội dung mô tả"> {{ $product->description }} </textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mô tả chi tiết</label>
                                        <textarea class="form-control" name="content" id="content" rows="3"
                                            placeholder="Nội dung mô tả chi tiết"> {{ $product->content }} </textarea>
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
            </div>
        </div>
    </div>

    @include('product.add')
    {{-- @include('product.detail') --}}
    @include('product.edit')

    <script type="text/javascript">
        $('.table').dataTable({
            aaSorting: [
                [0, 'DESC']
            ]
        });
        $(document).ready(function() {

            $('#add_product').on('submit', function(event) {
                event.preventDefault();
                var form_data = new FormData(this);
                form_data.append('file', $('#file')[0].files);
                form_data.append('ingredients', $('#ingredients')[0].files);
                $.ajax({
                    url: "{{ URL::to('admin/products/store') }}",
                    method: "POST",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(result) {
                        var msg = '';
                        $('div.gallery').html('');
                        if (result.error.length > 0) {
                            for (var count = 0; count < result.error.length; count++) {
                                msg += '<div class="alert alert-danger">' + result.error[
                                    count] + '</div>';
                            }
                            $('#msg').html(msg);
                            setTimeout(function() {
                                $('#msg').html('');
                            }, 5000);
                        } else {
                            msg += '<div class="alert alert-success mt-1">' + result.success +
                                '</div>';
                            ProductTable();
                            $('#message').html(msg);
                            $("#addProduct").modal('hide');
                            $("#add_product")[0].reset();
                            setTimeout(function() {
                                $('#message').html('');
                            }, 5000);
                        }
                    },
                })
            });

            $('#editproduct').on('submit', function(event) {
                event.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    url: "{{ URL::to('admin/products/update') }}",
                    method: 'POST',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(result) {
                        var msg = '';
                        if (result.error.length > 0) {
                            for (var count = 0; count < result.error.length; count++) {
                                msg += '<div class="alert alert-danger">' + result.error[
                                    count] + '</div>';
                            }
                            $('#emsg').html(msg);
                            setTimeout(function() {
                                $('#emsg').html('');
                            }, 5000);
                        } else {
                            msg += '<div class="alert alert-success mt-1">' + result.success +
                                '</div>';
                            ProductTable();
                            $('#message').html(msg);
                            $("#EditProduct").modal('hide');
                            $("#editproduct")[0].reset();
                            setTimeout(function() {
                                $('#message').html('');
                            }, 5000);
                        }
                    },
                });
            });
        });

        function GetData(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ URL::to('admin/products/show') }}",
                data: {
                    id: id
                },
                method: 'POST', //Post method,
                dataType: 'json',
                success: function(response) {
                    jQuery("#EditProduct").modal('show');
                    $('#id').val(response.ResponseData.id);
                    $('#getcat_id').val(response.ResponseData.cat_id);
                    $('#get_name').val(response.ResponseData.name);
                    $('#getprice').val(response.ResponseData.price);
                    $('#getprice_sale').val(response.ResponseData.price_sale);
                    $('#getactive').val(response.ResponseData.active);
                    $('#getthumb').val(response.ResponseData.thumb);
                    $('#getcreated_at').val(response.ResponseData.created_at);
                    $('#gettotal_number').val(response.ResponseData.total_number);
                    $('#gettotal_rating').val(response.ResponseData.total_rating);
                },
                error: function(error) {

                    // $('#errormsg').show();
                }
            })
        }

        function StatusUpdate(id, status) {
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this item ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plz!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    showLoaderOnConfirm: true,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ URL::to('admin/products/status') }}",
                            data: {
                                id: id,
                                status: status
                            },
                            method: 'POST', //Post method,
                            dataType: 'json',
                            success: function(response) {
                                swal({
                                        title: "Approved!",
                                        text: "Item has been deleted.",
                                        type: "success",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Ok",
                                        closeOnConfirm: false,
                                        showLoaderOnConfirm: true,
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            swal.close();
                                            ProductTable();
                                        }
                                    });
                            },
                            error: function(e) {
                                swal("Cancelled", "Something Went Wrong :(", "error");
                            }
                        });
                    } else {
                        swal("Cancelled", "Something went wrong :)", "error");
                    }
                });
        }

        function ProductTable() {
            $.ajax({
                url: "{{ URL::to('admin/item/list') }}",
                method: 'get',
                success: function(data) {
                    $('#table-display').html(data);
                    $(".zero-configuration").DataTable()
                }
            });
        }
        $(document).ready(function() {
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    $('div.gallery').html('');
                    var n = 0;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<div>')).attr('class', 'imgdiv').attr('id', 'img_' + n).html(
                                '<img src="' + event.target.result +
                                '" class="img-fluid"><span id="remove_"' + n + ' onclick="removeimg(' +
                                n + ')">&#x2716;</span>').appendTo(placeToInsertImagePreview);
                            n++;
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#file').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });

        });
        var images = [];

        function removeimg(id) {
            images.push(id);
            $("#img_" + id).remove();
            $('#remove_' + id).remove();
            $('#removeimg').val(images.join(","));
        }

        $('#price').keyup(function() {
            var val = $(this).val();
            if (isNaN(val)) {
                val = val.replace(/[^0-9\.]/g, '');
                if (val.split('.').length > 2)
                    val = val.replace(/\.+$/, "");
            }
            $(this).val(val);
        });

        $('#getprice').keyup(function() {
            var val = $(this).val();
            if (isNaN(val)) {
                val = val.replace(/[^0-9\.]/g, '');
                if (val.split('.').length > 2)
                    val = val.replace(/\.+$/, "");
            }
            $(this).val(val);
        });
    </script>
@endsection
