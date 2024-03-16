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
 
            <div class="modal-body">
                <div class="deadline-form">
                        @foreach ($ab as $key => $aboutus)
                        <form action="{{ route('abouts.update',   $aboutus->id ) }}" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Mô tả thông tin</label>
                            <textarea class="form-control" name="description"  id="content" rows="4">
                                    {{ $aboutus->description}}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ (dùng &lt;<b>br</b>&gt; để xuống hàng)
                                    </label>

                            <textarea class="form-control" name="address"rows="4">
                                {{ $aboutus->address }}
                            </textarea>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ email</label>
                                <input type="text" name="email" value="{{ $aboutus->email }} " class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số điện thoaị</label>
                                <input type="text" name="phone" value="{{ $aboutus->phone }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Thời gian mở cửa</label>
                                <input type="text" name="openH" value="{{ $aboutus->openH }} " class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ bản đồ</label>
                                <input type="text" name="map" value="{{ $aboutus->map }}" class="form-control" placeholder="https://www.google.com/maps/...">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh</label>
                            <input class="form-control" type="file" id="upload" name="file" multiple="">

                            <div id="image_show">
                                <a href="{{ $aboutus->thumb }}">
                                    <img src="{{ $aboutus->thumb }}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="{{ $aboutus->thumb }}" id="thumb">
                        </div>
                        @endforeach

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"><a href="{{ route('abouts.index') }}">Hủy</a></button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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
