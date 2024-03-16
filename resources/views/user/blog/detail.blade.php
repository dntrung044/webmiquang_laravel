@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 500px;

                .modal-content {
                    padding: 1rem;
                }
            }
        }

        .modal-header {
            .close {
                margin-top: -1.5rem;
            }
        }

        .form-title {
            margin: -2rem 0rem 2rem;
        }

        .btn-round {
            border-radius: 3rem;
        }

        .delimiter {
            padding: 1rem;
        }

        .social-buttons {
            .btn {
                margin: 0 0.5rem 1rem;
            }
        }

        .signup-section {
            padding: 0.3rem 0rem;
        }



        /** ====================
                    * Lista de Comentarios
                    =======================*/

        .comments-container {
            margin: 8px auto 15px;
            width: 768px;
        }

        .comments-container h1 {
            font-size: 36px;
            color: #283035;
            font-weight: 400;
        }

        .comments-container h1 a {
            font-size: 18px;
            font-weight: 700;
        }

        .comments-list {
            margin-top: 30px;
            position: relative;
        }

        /**
                    * Lineas / Detalles
                    -----------------------*/

        .comments-list:before {
            content: '';
            width: 2px;
            height: 100%;
            background: #c7cacb;
            position: absolute;
            left: 32px;
            top: 0;
        }

        .comments-list:after {
            content: '';
            position: absolute;
            background: #c7cacb;
            bottom: 0;
            left: 27px;
            width: 7px;
            height: 7px;
            border: 3px solid #dee1e3;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .reply-list:before,
        .reply-list:after {
            display: none;
        }

        .reply-list li:before {
            content: '';
            width: 60px;
            height: 2px;
            background: #c7cacb;
            position: absolute;
            top: 25px;
            left: -55px;
        }

        .comments-list li {
            margin-bottom: 15px;
            display: block;
            position: relative;
        }

        .comments-list li:after {
            content: '';
            display: block;
            clear: both;
            height: 0;
            width: 0;
        }

        .reply-list {
            padding-left: 88px;
            clear: both;
            margin-top: 15px;
        }

        /**
                    * Avatar
                    ---------------------------*/

        .comments-list .comment-avatar {
            width: 65px;
            height: 65px;
            position: relative;
            z-index: 99;
            float: left;
            border: 3px solid #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .comments-list .comment-avatar img {
            width: 100%;
            height: 100%;
        }

        .reply-list .comment-avatar {
            width: 50px;
            height: 50px;
        }

        .comment-main-level:after {
            content: '';
            width: 0;
            height: 0;
            display: block;
            clear: both;
        }

        /**
                    * Caja del Comentario
                    ---------------------------*/

        .comments-list .comment-box {
            width: 680px;
            float: right;
            position: relative;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        .comments-list .comment-box:before,
        .comments-list .comment-box:after {
            content: '';
            height: 0;
            width: 0;
            position: absolute;
            display: block;
            border-width: 10px 12px 10px 0;
            border-style: solid;
            border-color: transparent #FCFCFC;
            top: 8px;
            left: -11px;
        }

        .comments-list .comment-box:before {
            border-width: 11px 13px 11px 0;
            border-color: transparent rgba(0, 0, 0, 0.05);
            left: -12px;
        }

        .reply-list .comment-box {
            width: 610px;
        }

        .comment-box .comment-head {
            background: #FCFCFC;
            padding: 10px 12px;
            border-bottom: 1px solid #E5E5E5;
            overflow: hidden;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
        }

        .comment-box .comment-head i {
            float: right;
            margin-left: 14px;
            position: relative;
            top: 2px;
            color: #A6A6A6;
            cursor: pointer;
            -webkit-transition: color 0.3s ease;
            -o-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .comment-box .comment-head i:hover {
            color: #03658c;
        }

        .comment-box .comment-name {
            color: #283035;
            font-size: 14px;
            font-weight: 700;
            float: left;
            margin-right: 10px;
        }

        .comment-box .comment-name a {
            color: #283035;
        }

        .comment-box .comment-head span {
            float: left;
            color: #999;
            font-size: 13px;
            position: relative;
            top: 1px;
        }

        .comment-box .comment-content {
            background: #FFF;
            padding: 12px;
            font-size: 15px;
            color: #595959;
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .comment-box .comment-name.by-author,
        .comment-box .comment-name.by-author a {
            color: #03658c;
        }

        .comment-box .comment-name.by-author:after {
            content: 'autor';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        /** =====================
                    * Responsive
                    ========================*/

        @media only screen and (max-width: 766px) {
            .comments-container {
                width: 480px;
            }

            .comments-list .comment-box {
                width: 390px;
            }

            .reply-list .comment-box {
                width: 320px;
            }
        }

        div.comment-module {
            width: 100%;
            height: auto;
            background: #fff;
            border-radius: 5px;
            padding: 10px 0;
        }

        div.comment-module ul {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* row-gap: 50px; */
            margin-left: 0px;
        }

        div.comment-module ul li {
            width: 100%;
            position: relative;
        }

        div.comment-module ul li .comment {
            width: 100%;
            display: flex;
            /* column-gap: 20px; */
            margin-bottom: 5px;
        }

        /* ... */
        div.comment-module ul li .comment .media-option {
            position: absolute;
            right: 0.7rem;
            /* top: 1rem; */
            visibility: hidden;
        }

        div.comment-module ul li .comment:hover .media-option {
            visibility: visible;
        }

        .ripple-grow {
            width: 2.5rem;
            height: 2.5rem;
            justify-content: center;
            border-radius: 50%;
            color: rgba(0, 0, 0, 0.658) !important;
        }

        .ripple-grow:hover {
            background-color: rgba(0, 0, 0, 0.122);
            color: #000;
        }

        .collapse-repply,
        .media-footer-option .icon-bubble-content,
        .media-footer-option,
        .media-comment-footer,
        .ripple-grow,
        .media-comment-body .media-comment-data-person {
            display: flex;
            align-items: center;
        }

        /* ... */

        div.comment-module ul li .comment .comment-img {
            width: 7%;
        }

        div.comment-module ul li .comment .comment-img img {
            width: 50px;
            height: 50px;
        }

        div.comment-module ul li .comment .comment-content {
            width: 93%;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }

        div.comment-module ul li .comment .comment-content .comment-details {
            width: 100%;
            display: flex;
            column-gap: 15px;
            align-items: center;
            justify-content: flex-start;
        }

        div.comment-module ul li .comment .comment-content .comment-details .comment-name {
            text-transform: capitalize;
            margin-bottom: 0;
        }

        div.comment-module ul li .comment .comment-content .comment-details .comment-log {
            color: #7a7a7a;
            font-size: 14px;
        }

        div.comment-module ul li .comment .comment-content .comment-data {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            column-gap: 20px;
        }

        div.comment-module ul li::before {
            content: "";
            position: absolute;
            top: 50px;
            left: 60px;
            transform: translateX(-25px);
            width: 2px;
            height: calc(100% - 13px);
            background: #c5c5c5;
        }

        /* div.comment-module ul li::after {
                content: "";
                position: absolute;
                border-bottom-left-radius: 10px;
                border-bottom-style: solid;
                top: 60px;
                left: 80px;
                transform: translateX(-25px);
                width: 2px;
                height: calc(100% - 100px);
                background: #c5c5c5;
            } */

        div.comment-module ul li ul {
            /* margin-top: 35px; */
            margin-left: 6.7em;
            width: calc(100% - 70px);
        }

        /* media */
        .media-comment-footer {
            padding-left: 6.2em;
            /* margin-top: 0.6rem;
                margin-bottom: 1.2rem; */
            /* margin-bottom: 0.2em; */
        }

        .media-footer-option {
            padding: 0 1rem 0 0;
            text-decoration: none;
            transition: all 0.3s;
            color: var(--body-color);
        }

        .media-footer-option .icon-bubble-content {
            transition: all 0.3s;
            justify-content: center;
            /* margin-right: 0.4rem; */
            border-radius: 50%;
            width: 2.2rem;
            height: 2.2rem;
        }

        .media-footer-option.repply:hover {
            color: #03c1e2;
        }

        .media-footer-option.repply:hover .icon-bubble-content {
            background-color: rgba(0, 156, 184, 0.233);
        }

        .media-footer-option.like:hover {
            color: #cd0aa9;
        }
        .media-footer-option .active {
            color: #cd0aa9;
        }

        .media-footer-option.like:hover .icon-bubble-content {
            background-color: rgba(215, 9, 178, 0.169);
        }

        .media-footer-option.share:hover {
            color: #009402;
        }

        .media-footer-option.share:hover .icon-bubble-content {
            background-color: rgba(0, 179, 3, 0.164);
        }

        /* end media */

        @media screen and (max-width: 1600px) {
            div.comment-module {
                width: 100%;
            }
        }

        @media screen and (max-width: 1400px) {
            div.comment-module {
                width: 100%;
            }

            div.comment-module ul li .comment .comment-img {
                width: 10%;
            }

            div.comment-module ul li .comment .comment-content {
                width: 90%;
            }
        }

        @media screen and (max-width: 1024px) {
            div.comment-module {
                width: 80%;
            }
        }

        @media screen and (max-width: 768px) {
            div.comment-module {
                width: 96%;
                padding: 75px 10px;
            }

            div.comment-module ul li .comment {
                column-gap: 12px;
            }

            div.comment-module ul li .comment .comment-img {
                width: 15%;
            }

            div.comment-module ul li .comment .comment-img img {
                width: 40px;
                height: 40px;
            }

            div.comment-module ul li .comment .comment-content {
                width: 85%;
            }

            div.comment-module ul li .comment .comment-content .comment-details {
                flex-direction: column;
                align-items: flex-start;
            }

            div.comment-module ul li .comment .comment-content .comment-data {
                column-gap: 12px;
            }

            div.comment-module ul li::before {
                top: 70px;
                left: 50px;
                transform: translateX(-30px);
                height: calc(100% - 60px);
            }

            div.comment-module ul li ul {
                margin-top: 25px;
                margin-left: 50px;
                width: calc(100% - 50px);
            }
        }

        .block {
            background: #fff;
            padding: 1rem;
            background: #ffffff;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 2px 1px rgba(0, 0, 0, 0.06), 0px 1px 1px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            display: block;
        }

        .block-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .block-header .title {
            display: flex;
            align-items: flex-start;
        }

        .block-header .title .tag {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            background: #f7f7f7;
            color: #1c1c1c;
            text-align: center;
            padding: 0 4px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            font-weight: 500;
            font-size: 16px;
            line-height: 16px;
            border: 1px solid #e8e8e8;
            border-radius: 96px;
        }

        .writing {
            background: #ffffff;
            border: 1px solid #e8e8e8;
            border-radius: 8px;
            overflow: hidden;
            /* margin-bottom: 24px; */
            padding: 12px;
        }

        .writing .textarea {
            width: 100%;
            font-family: "Inter";
            color: #585757;
            height: 50px;
            overflow-y: auto;
            appearance: none;
            border: 0;
            outline: 0;
            resize: none;
            font-size: 16px;
            line-height: 24px;
        }

        .writing:focus-within {
            border: 1px solid #0085ff;
            box-shadow: 0px 0px 2px 2px rgba(0, 133, 255, 0.15);
        }

        .writing .footer {
            margin-top: 12px;
            /* padding-top: 12px; */
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #e8e8e8;
        }

        .comment {
            display: grid;
            /* gap: 14px; */
        }

        .comment .user-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comment .user-banner .user {
            gap: 8px;
            align-items: center;
            display: flex;
        }

        .comment .user-banner .user .avatar {
            height: 32px;
            width: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid transparent;
            position: relative;
            border-radius: 100px;
            font-weight: 500;
            font-size: 13px;
            line-height: 20px;
        }

        .comment .user-banner .user .avatar img {
            max-width: 100%;
            border-radius: 50%;
        }

        .comment .user-banner .user .avatar .stat {
            display: flex;
            position: absolute;
            right: -2px;
            bottom: -2px;
            display: block;
            width: 12px;
            height: 12px;
            z-index: 9;
            border: 2px solid #ffffff;
            border-radius: 100px;
        }

        .comment .user-banner .user .avatar .stat.green {
            background: #00ba34;
        }

        .comment .user-banner .user .avatar .stat.grey {
            background: #969696;
        }

        .comment .footer {
            gap: 12px;
            display: flex;
            align-items: center;
        }

        .comment .footer .reactions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .comment .footer .divider {
            height: 12px;
            width: 1px;
            background: #e8e8e8;
        }

        .comment:not(.comment:first-child) {
            padding-bottom: 12px;
            margin-bottom: 12px;
            border-bottom: 1px solid #e8e8e8;
        }

        .comment+.comment {
            padding-top: 12px;
        }

        .comment.reply .user-banner,
        .comment.reply .content,
        .comment.reply .footer {
            margin-left: 32px;
        }

        .group-radio {
            position: relative;
            display: flex;
            user-select: none;
            align-items: stretch;
        }

        .group-radio .button-radio {
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.06);
        }

        .group-radio .button-radio label {
            cursor: pointer;
            padding: 4px 8px;
            font-weight: 500;
            font-size: 14px;
            display: flex;
            height: 40px;
            align-items: center;
            line-height: 28px;
            transition: 0.2s ease;
        }

        .group-radio .button-radio:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            border-left: 1px solid #e8e8e8;
            border-top: 1px solid #e8e8e8;
            border-bottom: 1px solid #e8e8e8;
        }

        .group-radio .button-radio:last-child {
            border-top-right-radius: 8px;
            border-right: 1px solid #e8e8e8;
            border-top: 1px solid #e8e8e8;
            border-bottom: 1px solid #e8e8e8;
            border-bottom-right-radius: 8px;
        }

        .group-radio .button-radio input[type=radio] {
            display: none;
        }

        .group-radio .button-radio input[type=radio]:checked+label {
            background: #f8da45;
        }

        .group-radio .divider {
            width: 1px;
            background: #e8e8e8;
        }

        p a.tagged-user {
            display: inline-flex;
            padding: 2px 8px;
            background: #e5f3ff;
            border-radius: 256px;
            color: #0085ff;
        }

        .is-mute {
            font-weight: 400;
            font-size: 13px;
            line-height: 20px;
            color: #969696;
        }

        .load {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .load span {
            display: flex;
            align-items: center;
            font-weight: 400;
            font-size: 13px;
            line-height: 20px;
            color: #969696;
        }

        .load span i {
            margin-right: 6px;
        }

        .writing:hover .group-button {
            visibility: visible;
        }

        .group-button {
            visibility: hidden;
            display: flex;
            gap: 16px;
        }

/* Dropdown styles */

        .media-option summary {
        list-style: none;
        list-style-type: none;
        }

        .media-option > summary::-webkit-details-marker {
        display: none;
        }

        .media-option summary:focus {
        outline: none;
        }

        .media-option summary:focus a.button_dropdown {
        border: 2px solid white;
        }

       .media-option summary:focus {
        outline: none;
        }

        .media-option .ul_dropdown{
        position: absolute;
        margin: 20px 0 0 0;
        padding: 20px 0;
        width: 160px;
        left: 50%;
        margin-left: calc((160px / 2) * -1);
        box-sizing: border-box;
        z-index: 2;

        background: white;
        border-radius: 6px;
        list-style: none;
        }

        .media-option .ul_dropdown .li_dropdown {
        padding: 0;
        margin: 0;
        }

        .media-option .ul_dropdown .li_dropdown .a_dropdown:link,
        .comment .media-option ul li .a_dropdown:visited {
        display: inline-block;
        padding: 10px 0.8rem;
        width: 100%;
        box-sizing: border-box;
        color: black;
        text-decoration: none;
        }

        .media-option .ul_dropdown .li_dropdown .a_dropdown:hover {
        background-color: dodgerblue;
        color: white;
        }

        /* Dropdown triangle */
        .media-option .ul_dropdown::before {
        content: " ";
        position: absolute;
        width: 0;
        height: 0;
        top: -10px;
        left: 50%;
        margin-left: -10px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent rgb(0, 0, 0) transparent;
        }

        /* Close the dropdown with outside clicks */
        .media-option > summary::before {
        display: none;
        }

        .media-option[open] > summary::before {
        content: " ";
        display: block;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        z-index: 1;
        }
    </style>
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
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->
        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-9">
                    <div class="singlepost">
                        {{-- <figure><img alt="" class="img-fluid" src="{{ $blog->thumb }}"></figure> --}}
                        <h1>{{ $blog->name }}</h1>
                        <input type="hidden" value="{{ $blog->id }}" id="post_id">
                        <div class="postmeta">
                            <ul>
                                <li>
                                    <a href="{{ route('blog.category', ['id'=> $blog->postCategory->id, 'slug'=> \Str::slug($blog->postCategory->name, '-')] )}}">
                                        <i class="icon_folder-alt"></i>
                                        {{ $blog->postCategory->name }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon_calendar"></i> {{ date('d-m-Y', strtotime($blog->created_at)) }}
                                </li>
                                <li> <i class="icon_cursor_alt"></i> {{ $blog->view }}</li>
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

                    <div id="comment">
                        <div class="col-md-12 block">
                            <div class="block-header">
                                <div class="title">
                                    <h2>Danh sách bình luận</h2>
                                    <div class="tag">{{ $blog->comments->count() }}</div>
                                </div>
                                <div class="group-radio">
                                    <span class="button-radio">
                                        <input id="latest" name="latest" type="radio" checked>
                                        <label for="latest">NỔI BẬC</label>
                                    </span>
                                    <div class="divider"></div>
                                    <span class="button-radio">
                                        <input id="popular" name="latest" type="radio">
                                        <label for="popular">MỚI NHẤT</label>
                                    </span>
                                </div>
                            </div>
                            <div class="writing">
                                @if (!empty(Auth::user()))
                                    <form method="POST" role="form">
                                        @csrf
                                        <textarea rows="4" placeholder="Nội dung bình luận" class="textarea cmt_content"></textarea>
                                        <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                                        <div class="footer">
                                            <div class="group-button">
                                                <button class="btn_1 mb-3" id="btn-comment">Bình luận</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                <button type="button" class="btn btn-primary form-control" id="loginModal">
                                   Đăng nhập để bình luận!
                                </button>
                                @endif
                            </div>

                            <div class="comment-module">
                                <ul id="list-comment"></ul>
                                {{-- @include('user.blog.comment', ['comments' => $blog->comments]) --}}
                            </div>
                        </div>
                    </div>
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
                                        <a href="{{ route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')]) }}">
                                            <img src="{{ $new->thumb }}" alt="">
                                        </a>
                                    </div>
                                    <small>
                                        <a href="{{ route('blog.category', ['id'=> $blog->postCategory->id, 'slug'=> \Str::slug($blog->postCategory->name, '-')] )}}">
                                            {{ $blog->postCategory->name }}
                                        </a> - {{ date('d/m/Y', strtotime($new->created_at)) }}
                                    </small>
                                    <h3>
                                        <a href="{{ route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')]) }}">
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
                        <div class="tags">
                            <a href="#">Food</a>
                            <a href="#">Bars</a>
                            <a href="#">Cooktails</a>
                            <a href="#">Shops</a>
                            <a href="#">Best Offers</a>
                            <a href="#">Transports</a>
                            <a href="#">Restaurants</a>
                        </div>
                    </div>
                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Quảng cáo</h4>
                        </div>
                        <img src="https://giaiphaptruyenthong.vn/images/tintuc/1447056236_1446709167_truyenhinh3.jpg" alt="error">
                        <img style="margin-top: 2em;"  src="https://nplaw.vn/upload/images/quang-cao-thuong-mai-min.jpg" alt="error">
                    </div>
                </aside>
                <!-- /aside -->
                <div id="show-data-replies"></div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        function show_reply() {
            var x = document.getElementById("show-list-reply");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        $(document).ready(function(){
            $('#dropDown').click(function(event){
                $('.drop-down').toggleClass('drop-down--active');
                event.stopPropagation();
            });
            $(document).click(function(event) {
                if (!$(event.target).hasClass('drop-down--active')) {
                    $(".drop-down").removeClass("drop-down--active");
                }
            });
        });
    </script>
    <script>
        load_more_comment();

        var _token = $('input[name="_token"]').val();

        function load_more_comment(id = '') {
            var post_id = $('#post_id').val();
            $.ajax({
                url: '{{ route('comment.load_more') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    post_id: post_id,
                },
                success: function(data) {
                    $('#load_more_button').remove();
                    $('#list-comment').append(data);
                }
            });
        }

        function load_more_reply(id = '') {
            $.ajax({
                url: '{{ route('reply.load_more') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { id: id, },
                success: function(data) {
                    $('#load_more_button').remove();
                    $('#list-comment').append(data);
                }
            });
        }

        $(document).on('click', '#load-more-reply', function(ev) {
            ev.preventDefault();
            var comment_id = $(this).data('id');
            $.ajax({
                url: '{{ route('reply.load_more') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_id: comment_id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        $('#show-data-replies').append(res);
                    }
                }
            });
        });

        $(document).on('click', '#load_more_comment_button', function() {
            var id = $(this).data('id');
            load_more_comment(id);
        });
        $(document).on('click', '#load_more_replies_button', function() {
            var id = $(this).data('id');
            load_more_replies(id);
        });

        $(document).ready(function() {
            // window.$('#loginModal').modal();
            $('#loginModal').modal('show');
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });

        $('#btn-login').click(function(ev) {
            ev.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '/dang-nhap/ajax',
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: _token,
                },
                success: function(res) {
                    if (res.message) {
                        let _html_error =
                            '<div class="alert alert-danger">';
                        for (let error of res.error) {
                            _html_error += '<li> ${error}</li>';
                        }
                        _html_error += '</div>'
                        $('#error').html(_html_error);
                    } else {
                        alert('Đăng nhập thành công!');
                        location.reload();
                    }
                }
            });
        })

        $('#btn-comment').click(function(ev) {
            ev.preventDefault();
            let content = $('.cmt_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ route('comment.sent', $blog->id) }}',
                type: 'POST',
                data: {
                    content: content,
                    _token: _token,
                },
                success: function(res) {
                    location.reload();
                }
            });
        });
        $(document).on('click', '#btn-reply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            var content_reply_id = '.content-reply-' + id;
            let form_reply = '.form-reply-' + id;
            let content_reply = $(content_reply_id).val();
            $.ajax({
                url: '{{ route('reply.sent') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    content_reply: content_reply,
                    comment_id: id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        location.reload();
                    }
                }
            });
        });


        $(document).on('click', '.btn-show-reply-form', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            var content_reply_id = '.content-reply-' + id;
            let content_reply = $(content_reply_id).val();
            let form_reply = '.form-reply-' + id;

            $('.formReply').slideUp();
            $(form_reply).slideDown();
        });

        $(document).on('click', '#dropdown', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            let form_dropdown = '.form-dropdown-' + id;

            $('.dropdown-menu').slideUp();
            if( $(form_dropdown).slideDown()) {
                $(form_dropdown).slideUp();
            } else {
                $(form_dropdown).slideDown();
            }

        });


        $(document).on('click', '#like-comment', function(ev) {
            ev.preventDefault();
            var comment_like_id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ route('comment.like') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_like_id: comment_like_id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        location.reload();
                    }
                }
            });
        });

        $(document).on('click', '#like-reply', function(ev) {
            ev.preventDefault();
            var reply_like_id = $(this).data('id');

            $.ajax({
                url: '{{ route('reply.like') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    reply_like_id: reply_like_id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        location.reload();
                    }
                }
            });
        });

    </script>
@endsection
