@section('head')
    <!-- Blog CSS -->
    <link href="{{ asset('teamplate/css/blog.css') }}" rel="stylesheet">
@endsection
@extends('user.layout.main')
@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url({{ asset('teamplate/img/tintuc.jpg') }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Trang tin tức</h1>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->
        <div class="pattern_2">
            <div class="container margin_60_40">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-md-6" data-cue="slideInUp">
                                    <article class="blog">
                                        <figure>
                                            <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => \Str::slug($blog->name, '-')]) }}">
                                                <img src="{{ $blog->thumb }}" alt="">
                                                <div class="preview"><span>Đọc thêm</span></div>
                                            </a>
                                        </figure>
                                        <div class="post_info">
                                            <small>{{ date('d-m-Y', strtotime($blog->created_at)) }}</small>
                                            <h2>
                                                <a href="
                                                    {{ route('blog.detail', ['id' => $blog->id, 'slug' => \Str::slug($blog->name, '-')]) }}">
                                                    {{ $blog->name }}
                                                </a>
                                            </h2>
                                            <p>{{ $blog->description }}</p>
                                        </div>
                                    </article>
                                    <!-- /article -->
                                </div>
                            @endforeach
                        </div>
                        <!-- /row -->
                        {!! $blogs->links() !!}
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-3 bg-white">
                        <div class="widget ">
                            <div class="widget-name first">
                                <h4>Bài đăng mới nhất</h4>
                            </div>
                            <ul class="comments-list">
                                @foreach ($blognew as $new)
                                    <li>
                                        <div class="alignleft">
                                            <a
                                                href="{{ route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')]) }}">
                                                <img src="{{ $new->thumb }}" alt="">
                                            </a>
                                        </div>
                                        <small>{{ $new->postCategory->name }} - {{ date('m.d.y', strtotime($new->created_at)) }}</small>
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
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Danh mục</h4>
                            </div>
                            <ul class="cats bg-white">
                                @foreach ($blogCategories as $cat)
                                    <li>
                                        <a
                                            href="{{ route('blog.category', ['id' => $cat->id, 'slug' => \Str::slug($cat->name, '-')]) }}">{{ $cat->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Tìm kiếm bài viết</h4>
                            </div>

                            <form action="{{ route('blog.search') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="search-box">
                                    <input type="search" name="search" id="keywords"
                                        data-url="{{ route('blog.searchAjax') }}" class="search-input"
                                        placeholder="Nhập từ khóa tìm kiếm...">
                                    <button class="search-button" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>

                                    <div id="search_ajax" class="results"></div>
                                </div>
                            </form>
                            <!-- /search post -->
                        </div>
                        <!-- /widget -->
                    </aside>
                    <!-- /aside -->
                </div>
                <!-- /row -->
            </div>
        </div>
        <!-- /container -->
    </main>
@endsection
@section('script')
    <script src="https://kit.fontawesome.com/43dcc20e7a.js" crossorigin="anonymous"></script>
    <script src="{{ asset('teamplate/js/blog.js') }}"></script>
@endsection
