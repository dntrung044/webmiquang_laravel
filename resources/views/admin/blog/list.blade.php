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
                        <h3 class="fw-bold mb-0"> {{ $titles }}</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a href="/admin/blogs/add">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100">
                                    <i class="icofont-plus-circle me-2 fs-6"></i>Thêm danh mục
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            {{-- List --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Hình</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $key => $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->name }}</td>
                                            <td>{{ $post->description }}</td>
                                            <td>
                                                <a href="{{ $post->thumb }}" target="_blank">
                                                    <img src="{{ $post->thumb }}" height="50px">
                                                </a>
                                            </td>

                                            <td>{{ !empty($post->postCategory) ? $post->postCategory->name : ''}}</td>
                                            <td>{!! \App\Helpers\Helper::active($post->active) !!}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="/admin/blogs/edit/{{ $post->id }}">
                                                            <i class="icofont-edit text-success"></i>
                                                        </a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-secondary deleterow">
                                                        <a href="#"
                                                            onclick="removeRow({{ $post->id }}, '/admin/blogs/destroy')">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            {!! $blogs->links() !!}

        </div>
    </div>

@endsection
