<ul class="replied-to" id="reply-wrapper">
    {{-- show one comment --}}
    @if ($comment->replies->count() == 1)
        @foreach ($comment->replies as $reply)
            <li>
                <div class="reply" style="margin-left: -7em;  transform: scale(0.7);" id="reply">
                    <div class="comment-img">
                        {{-- Avatar --}}
                        @if ($reply->user->avatar)
                            <img src="{{ $reply->user->avatar }}" alt="img_error">
                        @else
                            <img src="{{ asset('teamplate/img/user.png') }}" alt="img_error">
                        @endif
                    </div>
                    <div class="comment-content comment_right" style="width: 85%;">
                        <div class="comment-details">
                            <h6 class="comment-name">{{ $reply->user->name }}</h6>
                            <span
                                class="comment-log">{{ $comment->created_at->locale('vi_VN')->diffForHumans() }}</span>
                        </div>
                        <div class="comment-desc">
                            <p>{{ $reply->content }}</p>
                        </div>

                        <div class="media-option">
                            <a class="ripple-grow" href="javascript://" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <svg class="ripple-icon" width="28" height="28"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" viewBox="0 0 24 24">
                                    <g fill="currentColor">
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    {{-- show more than one comment --}}
    @elseif ($comment->replies->count() > 1)
        @foreach ($comment->replies->take(5) as $reply)
            <li>
                <div class="reply" style="margin-top: 15px; margin-left: -2em;transform: scale(0.9);" id="reply">
                    <div class="comment-img">
                        {{-- Avatar --}}
                        @if ($reply->user->avatar)
                            <img src="{{ $reply->user->avatar }}" alt="img_error">
                        @else
                            <img src="{{ asset('teamplate/img/user.png') }}" alt="img_error">
                        @endif
                    </div>
                    <div class="comment-content comment_right" style="width: 85%;">
                        <div class="comment-details">
                            <h6 class="comment-name">{{ $reply->user->name }}</h6>
                            <span
                                class="comment-log">{{ $comment->created_at->locale('vi_VN')->diffForHumans() }}</span>
                        </div>
                        <div class="comment-desc">
                            <p>{{ $reply->content }}</p>
                        </div>
                        <div class="media-option">
                            <a class="ripple-grow" href="javascript://" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <svg class="ripple-icon" width="28" height="28"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" viewBox="0 0 24 24">
                                    <g fill="currentColor">
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            @php
                $lastReplyId = $comment->replies->last()->id;
            @endphp
        @endforeach
        <button type="button" style="transform: scale(0.7); float: left;"
            class="btn btn-primary form-control load_more_reply" data-id_last="{{ $lastReplyId }}"
            data-id_comment="{{ $comment->id }}" data-url="{{ route('reply.load-more') }}">Xem thêm
        </button>
    @endif
    {{-- form reply --}}
    <li>
        <div class="formReply form-reply-{{ $comment->id }}">
            {{-- Avatar --}}
            @if (Auth::user()->avatar == null)
                <img src="{{ asset('teamplate/img/user.png') }}" class="avatar"alt="img_error">
            @else
                <img src="{{ Auth::user()->avatar }}" class="avatar" alt="img_error">
            @endif
            <div class="comment_right clearfix" style="width: 85%;">
                <h6>{{ Auth::user()->name }}</h6>
                <div class="form-group">
                    <textarea class="form-control ct-rep content-reply-{{ $comment->id }}" rows="3"
                        placeholder="Nội dung trả lời...">
                           </textarea>
                </div>
                <div class="form-group">
                    <button type="button" data-id_post="{{ $blog->id }}" data-id="{{ $comment->id }}"
                        data-url="{{ route('comment.reply', ['id' => $comment->id]) }}"
                        class="btn_1 mb-3 send-reply">Phản hồi</button>

                    <button type="button" class="btn_1b mb-3 close-reply-form">Huỷ</button>
                </div>
            </div>
        </div>
    </li>
</ul>
