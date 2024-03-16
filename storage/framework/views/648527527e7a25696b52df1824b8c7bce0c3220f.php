<?php $__env->startSection('head'); ?>
    <style>
        .search-box{
        width: 100%;
        position: relative;
        display: flex;

        }
        .search-input{
        width: 100%;
        padding: 10px;
        border: 4px solid #f8da45;
        border-radius:10px 0 0 10px ;
        border-right: none;
        outline: none;
        /* font-size: 20px; */
        color: #f8da45;;
        background: none;
        }
        .search-button{
        text-align: center;
        height: 51px;
        width: 60px;
        outline: none;
        cursor: pointer;
        border: 4px solid #f8da45;
        border-radius: 0 10px 10px 0 ;
        border-left: none;
        background: none;
        font-size: 20px;
        border-left: 4px solid #f8da45;
        }



        .results {
            border: 1px solid #f3f3f3;
            background: #fff;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: background 0.3s ease-out, border 0.4s ease-in-out;

        padding: 0px;
        }

        .results ul {margin: 0; padding: 0; }
        .results ul li {
        list-style: none;
        border-radius: 3px;
        opacity: 0;
        display: none;
        padding: 8px 12px;
        transition: all .5s linear;
        }

        .results ul li {
        opacity: 1;
        display: block;
        }

        /* .results {
        padding: 10px;
        } */

        .results ul li:hover {
        background: #ececec
        }
        .results a {
            color: black;
            text-decoration: none;
        }
        .results a:hover {
            color: #f8da45;
        }
    </style>
     <script src="https://kit.fontawesome.com/43dcc20e7a.js" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(<?php echo e(asset('teamplate/img/tintuc.jpg')); ?>)">
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
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6" data-cue="slideInUp">
                                    <article class="blog">
                                        <figure>
                                            <a
                                            href="<?php echo e(route('blog.detail', ['id'=> $blog->id, 'slug'=> \Str::slug($blog->name, '-')] )); ?>">
                                                <img src="<?php echo e($blog->thumb); ?>" alt="">
                                                <div class="preview"><span>Đọc thêm</span></div>
                                            </a>
                                        </figure>
                                        <div class="post_info">
                                            <small><?php echo e(date('d-m-Y', strtotime($blog->created_at))); ?></small>
                                            <h2>
                                                <a href="
                                                    <?php echo e(route('blog.detail', ['id'=> $blog->id, 'slug'=> \Str::slug($blog->name, '-')] )); ?>">
                                                    <?php echo e($blog->name); ?>

                                                </a>
                                            </h2>
                                            <p>Lượt xem: <?php echo e($blog->view); ?></p>
                                            <p><?php echo e($blog->description); ?></p>
                                        </div>
                                    </article>
                                    <!-- /article -->
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- /row -->
                        <?php echo $blogs->links(); ?>

                    </div>
                    <!-- /col -->

                    <aside class="col-lg-3 bg-white">
                        <div class="widget ">
                            <div class="widget-name first">
                                <h4>Bài đăng mới nhất</h4>
                            </div>
                            <ul class="comments-list">
                                <?php $__currentLoopData = $blognew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="alignleft">
                                        <a href="
                                    <?php echo e(route('blog.detail', ['id'=> $new->id, 'slug'=> \Str::slug($new->name, '-')] )); ?>">
                                            <img src="<?php echo e($new->thumb); ?>" alt="">
                                        </a>
                                    </div>
                                    <small>danh mục - <?php echo e(date('m.d.y', strtotime($new->created_at))); ?></small>
                                    <h3>
                                        <a href="
                                        <?php echo e(route('blog.detail', ['id'=> $new->id, 'slug'=> \Str::slug($new->name, '-')] )); ?>">
                                        <?php echo e($new->name); ?>

                                    </a>
                                    </h3>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Danh mục</h4>
                            </div>
                            <ul class="cats bg-white">
                                <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <li><a href="<?php echo e(route('blog.category', ['id'=> $cat->id,'slug'=> \Str::slug($cat->name, '-')])); ?>"><?php echo e($cat->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Tìm kiếm  bài viết</h4>
                            </div>

                            <form action="<?php echo e(route('blog.search')); ?>" method="POST" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="search-box">
                                    <input type="search" name="search" id="keywords"
                                    class="search-input" placeholder="Nhập từ khóa tìm kiếm...">
                                    <button class="search-button" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>

                                    <div id="search_ajax" class="results"></div>
                                </div>
                            </form>


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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#keywords').keyup(function() {
            var keywords = $(this).val();

            if (keywords != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : "<?php echo e(url('/blog/tim-kiem-ajax')); ?>",
                    type: 'POST',
                    data: {
                        keywords:keywords,
                        _token:_token,
                    },
                    success:function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }
            else {
                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/blog/list.blade.php ENDPATH**/ ?>