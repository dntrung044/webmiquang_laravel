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
            <!-- Add post-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tiều đề</label>
                                <input type="text" name="name" value="{{ old('name') }}"class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select class="form-select" name="id_category">
                                    <option value="0"> Danh Mục </option>
                                    @foreach ($blogs as $blogcategory)
                                        <option value="{{ $blogcategory->id }}">{{ $blogcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Hình ảnh</label>
                            <input class="form-control" type="file" id="upload" name="file" multiple=""
                                required="">

                            <div id="image_show">
                            </div>
                            <input type="hidden" name="thumb" id="thumb">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tóm tắt</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Nội dung mô tả">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội dung</label>
                            <textarea class="form-control" name="content" id="content" rows="3" placeholder="Nội dung mô tả chi tiết">{{ old('content') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active" checked="">
                                <label for="active" {{ old('available') == '1' ? 'checked' : '' }}>Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active">
                                <label for="no_active" {{ old('available') == '0' ? 'checked' : '' }}>Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
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
