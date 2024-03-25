@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Blog CSS -->
    <link href="{{ asset('teamplate/css/blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@extends('user.layout.main')
@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url({{ $blog->thumb }}">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame gray"></div>
        </div>
        <!-- /hero_single -->
        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-9">
                    <div class="singlepost">
                        <h1>{{ $blog->name }}</h1>
                        <input type="hidden" value="{{ $blog->id }}" id="post_id">
                        <div class="postmeta">
                            <ul>
                                <li>
                                    <a href="blog/{{ $blog->postCategory->name }}">
                                        <i class="icon_menu"></i>
                                        {{ $blog->postCategory->name }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon_calendar"></i> {{ date('d-m-Y', strtotime($blog->created_at)) }}
                                </li>
                                <li> <i class="fa fa-eye" aria-hidden="true">{{ $blog->view }}</i> </li>

                            </ul>
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">
                            <div class="dropcaps">
                                <p>{{ $blog->description }}</p>
                            </div>
                            <p>{!! $blog->content !!}</p>
                        </div>
                        <!-- /blog -->
                    </div>
                    <!-- /single-post -->

                        {{-- comments --}}
                        <div class="col-md-12 block">
                            <div class="block-header">
                                <div class="title">
                                    <h2>Danh sách bình luận</h2>
                                    <div class="tag">
                                        {{ $blog->comments->count() }}
                                    </div>
                                </div>
                                <div class="group-radio">
                                    <span class="button-radio latest_button" data-id_blog="{{ $blog->id }}"
                                        data-url="{{ route('comment.latest') }}">
                                        <input id="latest" name="latest" type="radio" checked>
                                        <label for="latest">Mới nhất</label>
                                    </span>
                                    <div class="divider"></div>
                                    <span class="button-radio popular_button" data-id_blog="{{ $blog->id }}"
                                        data-url="{{ route('comment.popular') }}">
                                        <input id="popular" name="latest" type="radio">
                                        <label for="popular">Nổi bậc</label>
                                    </span>
                                </div>
                            </div>
                            @if (!empty(Auth::user()))
                                <div class="writing">
                                    {{-- writing cmt --}}
                                    <textarea rows="6" placeholder="Nhập nội dung bình luận" class="textarea cmt_content" spellcheck="false"></textarea>
                                    <div class="footer">
                                        <div class="group-button">
                                            <button class="btn_1 mb-3 send-comment" data-id="{{ $blog->id }}"
                                                data-url="{{ route('comment.send', ['post_id' => $blog->id]) }}">
                                                Bình luận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <button type="button" class="btn btn-info btn-round show_model_login" data-toggle="modal"
                                    data-target="#loginModal"> Vui lòng đăng nhập để viết bình luận! </button>
                            @endif
                            <div class="comment-module">
                                @include('user.blog.components.comment_component')
                            </div>
                        </div>

                    {{-- login modal compoment --}}
                   @include('user.blog.components.login_modal_component')
                </div>
                <!-- /col -->

                <div class="fb-comments" data-href="{{ $blog->id }}-{{ \Str::slug($blog->name, '-') }}.html"
                    data-width="" data-numposts="5"></div>

                <aside class="col-lg-3">
                    <div class="widget">
                        <div class="widget-title first">
                            <h4>Bài đăng Mới nhất</h4>
                        </div>
                        <ul class="comments-list">
                            @foreach ($blognew as $new)
                                <li>
                                    <div class="alignleft">
                                        <a
                                            href="
                                        {{ route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')]) }}">
                                            <img src="{{ $new->thumb }}" alt="">
                                        </a>
                                    </div>
                                    <small>Thể loại - {{ date('d/m/Y', strtotime($new->created_at)) }}</small>
                                    <h3>
                                        <a
                                            href="
                                        {{ route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')]) }}">
                                            {{ $new->name }}
                                        </a>
                                    </h3>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection
@section('script')
    <script src="{{ asset('teamplate/js/blog_detail.js') }}"></script>
@endsection
