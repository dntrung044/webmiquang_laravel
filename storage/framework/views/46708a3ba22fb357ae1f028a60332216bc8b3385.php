<?php $__env->startSection('head'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Blog CSS -->
    <link href="<?php echo e(asset('teamplate/css/blog.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(<?php echo e($blog->thumb); ?>">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1><?php echo e($title); ?></h1>
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
                        <h1><?php echo e($blog->name); ?></h1>
                        <input type="hidden" value="<?php echo e($blog->id); ?>" id="post_id">
                        <div class="postmeta">
                            <ul>
                                <li>
                                    <a href="blog/<?php echo e($blog->postCategory->name); ?>">
                                        <i class="icon_menu"></i>
                                        <?php echo e($blog->postCategory->name); ?>

                                    </a>
                                </li>
                                <li>
                                    <i class="icon_calendar"></i> <?php echo e(date('d-m-Y', strtotime($blog->created_at))); ?>

                                </li>
                                <li> <i class="fa fa-eye" aria-hidden="true"><?php echo e($blog->view); ?></i> </li>

                            </ul>
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">
                            <div class="dropcaps">
                                <p><?php echo e($blog->description); ?></p>
                            </div>
                            <p><?php echo $blog->content; ?></p>
                        </div>
                        <!-- /blog -->
                    </div>
                    <!-- /single-post -->

                        
                        <div class="col-md-12 block">
                            <div class="block-header">
                                <div class="title">
                                    <h2>Danh sách bình luận</h2>
                                    <div class="tag">
                                        <?php echo e($blog->comments->count()); ?>

                                    </div>
                                </div>
                                <div class="group-radio">
                                    <span class="button-radio latest_button" data-id_blog="<?php echo e($blog->id); ?>"
                                        data-url="<?php echo e(route('comment.latest')); ?>">
                                        <input id="latest" name="latest" type="radio" checked>
                                        <label for="latest">Mới nhất</label>
                                    </span>
                                    <div class="divider"></div>
                                    <span class="button-radio popular_button" data-id_blog="<?php echo e($blog->id); ?>"
                                        data-url="<?php echo e(route('comment.popular')); ?>">
                                        <input id="popular" name="latest" type="radio">
                                        <label for="popular">Nổi bậc</label>
                                    </span>
                                </div>
                            </div>
                            <?php if(!empty(Auth::user())): ?>
                                <div class="writing">
                                    
                                    <textarea rows="6" placeholder="Nhập nội dung bình luận" class="textarea cmt_content" spellcheck="false"></textarea>
                                    <div class="footer">
                                        <div class="group-button">
                                            <button class="btn_1 mb-3 send-comment" data-id="<?php echo e($blog->id); ?>"
                                                data-url="<?php echo e(route('comment.send', ['post_id' => $blog->id])); ?>">
                                                Bình luận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <button type="button" class="btn btn-info btn-round show_model_login" data-toggle="modal"
                                    data-target="#loginModal"> Vui lòng đăng nhập để viết bình luận! </button>
                            <?php endif; ?>
                            <div class="comment-module">
                                <?php echo $__env->make('user.blog.components.comment_component', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    
                   <?php echo $__env->make('user.blog.components.login_modal_component', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- /col -->

                <div class="fb-comments" data-href="<?php echo e($blog->id); ?>-<?php echo e(\Str::slug($blog->name, '-')); ?>.html"
                    data-width="" data-numposts="5"></div>

                <aside class="col-lg-3">
                    <div class="widget">
                        <div class="widget-title first">
                            <h4>Bài đăng Mới nhất</h4>
                        </div>
                        <ul class="comments-list">
                            <?php $__currentLoopData = $blognew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="alignleft">
                                        <a
                                            href="
                                        <?php echo e(route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')])); ?>">
                                            <img src="<?php echo e($new->thumb); ?>" alt="">
                                        </a>
                                    </div>
                                    <small>Thể loại - <?php echo e(date('d/m/Y', strtotime($new->created_at))); ?></small>
                                    <h3>
                                        <a
                                            href="
                                        <?php echo e(route('blog.detail', ['id' => $new->id, 'slug' => \Str::slug($new->name, '-')])); ?>">
                                            <?php echo e($new->name); ?>

                                        </a>
                                    </h3>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('teamplate/js/blog_detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/blog/detail.blade.php ENDPATH**/ ?>