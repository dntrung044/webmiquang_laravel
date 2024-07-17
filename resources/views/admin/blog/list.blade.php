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
                        <h3 class="fw-bold mb-0">
                            @if ($title)
                                {{ $title }}
                            @else
                                Quản lý
                            @endif
                        </h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a href="{{ route('posts.add') }}">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100">
                                    <i class="icofont-plus-circle me-2 fs-6"></i>Thêm danh mục
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
                                                    <img src="{{ $post->thumb }}" style="height: 100px">
                                                </a>
                                            </td>

                                            <td>{{ !empty($post->postCategory) ? $post->postCategory->name : '' }}</td>
                                            <td>{!! \App\Helpers\Helper::active($post->active) !!}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }} "
                                                        class="btn btn-outline-secondary">
                                                        <button class="btn btn-primary btn-sm" type="button">
                                                            <i class="icofont-edit text-success"></i>
                                                        </button>
                                                    </a>

                                                    <a href="#" class="btn btn-outline-secondary"
                                                        onclick="removeRow({{ $post->id }}, '{{ route('posts.destroy') }}')">
                                                        <button type="button" class="btn btn-warning btn-sm">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </button>
                                                    </a>
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
        </div>
    </div>
@endsection
