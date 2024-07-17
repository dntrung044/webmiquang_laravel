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
            {{-- List --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Bình luận/ Trả lời</th>
                                        <th>Bài viết</th>
                                        <th>Người dùng</th>
                                        <th>Nội dung</th>
                                        <th>Ngày viết</th>
                                        <th>Trạng thái</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $cmt)
                                        <tr>
                                            <td>{{ $cmt->id }}</td>
                                            <td>
                                                @if ($cmt->reply_id == 0)
                                                    Bình luận
                                                @else
                                                    {{ $cmt->reply_id }}
                                                @endif
                                            </td>
                                            <td>{{ $cmt->post->name }}</td>
                                            <td>{{ $cmt->user->name }}</td>
                                            <td>{{ $cmt->content }}</td>
                                            <td>{{ $cmt->created_at }}</td>
                                            <td>
                                                @if ($cmt->active == 1)
                                                    <a href="{{ route('post_comments.inactiveCMT', $cmt->id) }}"><span
                                                            class="badge bg-success">Hiển thị</span></a>
                                                @else
                                                    <a href="{{ route('post_comments.activeCMT', $cmt->id) }}"><span
                                                            class="badge bg-danger">Ẩn</span></a>
                                                @endif
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
