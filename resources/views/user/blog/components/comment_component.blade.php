<div id="comment-list">
    @if ($comments->count())
        <ul class="list-comment">
            @foreach ($comments->take(5) as $comment)
                <li>
                    <div class="comment comment_count">
                        <div class="comment-img">
                            {{-- Avatar --}}
                            @if ($comment->user->avatar)
                                <img src="{{ $comment->user->avatar }}" alt="img_error">
                            @else
                                <img src="{{ asset('teamplate/img/user.png') }}" alt="img_error">
                            @endif
                        </div>
                        <div class="comment-content comment_right">
                            <div class="comment-details">
                                <h6 class="comment-name"> {{ $comment->user->name }} </h6>
                                <span class="comment-log"> {{ $comment->created_at->locale('vi_VN')->diffForHumans() }} </span>
                                <div class="media-option">
                                    <summary>
                                        <a class="ripple-grow button_ul_dropdown" data-id="{{ $comment->id }}">
                                            <svg class="ripple-icon" width="28" height="28" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                                <g fill="currentColor">
                                                    <circle cx="5" cy="12" r="2"></circle>
                                                    <circle cx="12" cy="12" r="2"></circle>
                                                    <circle cx="19" cy="12" r="2"></circle>
                                                </g>
                                            </svg>
                                        </a>
                                        <ul class="ul_dropdown form-dropdown-{{ $comment->id }}">
                                                <li class="li_dropdown">
                                                    <a href="#" class="a_dropdown report_comment">Báo cáo</a>
                                                </li>
                                            @can('blog-edit')
                                                <li class="li_dropdown">
                                                    <a href="#" data-id="{{ $comment->id }}" data-url="{{ route('comment.hidden') }}" data-id_blog="{{ $blog->id }}" class="a_dropdown button_comment_hidden">Ẩn Bình luận</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </summary>
                                </div>
                            </div>
                            <div class="comment-desc">
                                <p> {{ $comment->content }} </p>
                            </div>
                            <div class="media-comment-footer">
                                {{-- like button --}}
                                <a class="media-footer-option like like-comment" style="text-decoration: none;"
                                    data-id="{{ $comment->id }}"
                                    data-url="{{ route('comment.like') }}">
                                    {{-- check user liked --}}
                                    @if ($comment->likes->contains(Auth::user()))
                                        <span class="icon-bubble-content comment-active_{{ $comment->id }} active">
                                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"> </path>
                                            </svg>
                                        </span>
                                    @else
                                        <span class="icon-bubble-content comment-active_{{ $comment->id }}">
                                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                            </svg>
                                        </span>
                                    @endif
                                    <span class="media-footer-option-text number_like_comment_{{ $comment->id }}">
                                        {{ $comment->number_like }}
                                    </span>
                                </a>
                                {{-- comment button--}}
                                <a class="media-footer-option repply show-reply-form" href="#" style="text-decoration: none;"
                                    data-id="{{ $comment->id }}" data-commenter_name="{{ $comment->user->name }}"  data-commenter_id="{{ $comment->user->id }}">
                                    <span class="icon-bubble-content">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                                        </svg>
                                    </span>
                                    @if ($comment->replies->count() > 0)
                                        <span class="media-footer-option-text">
                                            Xem {{ $comment->replies->count() }} phản hồi
                                        </span>
                                    @else
                                        <span class="media-footer-option-text">
                                            {{ $comment->replies->count() }}
                                        </span>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- reply compoment --}}
                    @include('user.blog.components.reply_component')
                </li>
                @php
                    $lastCommentId = $comments->last()->id;
                @endphp
            @endforeach
        </ul>
        <div id="out_data"></div>
        <button type="button" class="btn btn-primary mt-5 form-control load_more_comment"
            data-id_last="{{ $lastCommentId }}" data-id_blog="{{ $blog->id }}"
            data-url="{{ route('comment.load_more') }}">
            Xem thêm
        </button>
    @endif
</div>
