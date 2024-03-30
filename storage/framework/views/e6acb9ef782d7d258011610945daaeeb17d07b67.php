<ul class="list-comment form_replies form_reply-<?php echo e($comment->id); ?>" style="margin-left: 3em;transform: scale(0.9); display: none;"
    id="reply-list">
    <?php if($replies->count() > 0): ?>
        <?php $__currentLoopData = $replies->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <div class="comment" id="reply">
                    <div class="comment-img">
                        
                        <?php if($reply->user->avatar): ?>
                            <img src="<?php echo e($reply->user->avatar); ?>" alt="img_error">
                        <?php else: ?>
                            <img src="<?php echo e(asset('teamplate/img/user.png')); ?>" alt="img_error">
                        <?php endif; ?>
                    </div>
                    <div class="comment-content comment_right">
                        <div class="comment-details">
                            <h6 class="comment-name"><?php echo e($reply->user->name); ?></h6>
                            <span
                                class="comment-log"><?php echo e($comment->created_at->locale('vi_VN')->diffForHumans()); ?></span>
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
                        <div class="comment-desc">
                            <p><?php echo e($reply->content); ?></p>
                        </div>

                        <div class="media-comment-footer">
                            <a class="media-footer-option like like-comment" style="text-decoration: none;"
                                data-id="81" data-url="http://127.0.0.1:8000/blog/binh-luan/thich">
                                <span class="icon-bubble-content_81 active">
                                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                    </svg>
                                </span>
                                <span class="media-footer-option-text number_like_comment_81">
                                         4
                                </span>
                            </a>

                            <a class="media-footer-option repply show-reply-form" href="#"
                                style="text-decoration: none;" data-id="81">
                                <span class="icon-bubble-content">
                                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                                    </svg>
                                </span>
                                <span class="media-footer-option-text">
                                    Xem 1 phản hồi
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
                $lastReplyId = $replies->last()->id;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <button type="button" class="btn btn-primary form-control load_more_reply" data-id_last="<?php echo e($lastReplyId); ?>"
            data-id_comment="<?php echo e($reply->id); ?>" data-url="<?php echo e(route('reply.load_more')); ?>">
            Xem thêm
        </button>
    <?php endif; ?>
    
    <li>
        <div class="comment">
            
            <div class="comment-img">
                <?php if(Auth::user()->avatar == null): ?>
                    <img src="<?php echo e(asset('teamplate/img/user.png')); ?>" class="avatar"alt="img_error">
                <?php else: ?>
                    <img src="<?php echo e(Auth::user()->avatar); ?>" class="avatar" alt="img_error">
                <?php endif; ?>
            </div>
            <div class="comment-content comment_right">
                <h6><?php echo e(Auth::user()->name); ?></h6>
                <div class="form-group">
                    <textarea class="form-control ct-rep content-reply-<?php echo e($comment->id); ?>" rows="3"
                        placeholder="Nhập nội dung trả lời..."></textarea>
                </div>
                <div class="form-group">
                    <button type="button" data-id_post="<?php echo e($blog->id); ?>" data-id="<?php echo e($comment->id); ?>"
                        data-url="<?php echo e(route('reply.send', ['id' => $comment->id])); ?>" class="btn_1 mb-3 send-reply">
                        Phản hồi
                    </button>
                    <button type="button" class="btn_1b mb-3 ml-3 close-reply-form">Huỷ</button>
                </div>
            </div>
        </div>
    </li>
</ul>
<?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/blog/compoments/reply_compoment.blade.php ENDPATH**/ ?>