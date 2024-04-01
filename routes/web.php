<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Artisan;

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    echo '<script>alert("done")</script>';
});

// ADMIN; middleware user: level = 1
Route::prefix('admin')->middleware('can:admin-access')->group(function () {
    #index
    Route::get('/', [Admin\HomeController::class, 'index'])->name('admin');
    #active Contact
    Route::get('/activeContact{contact}', [Admin\HomeController::class, 'activeContact'])->name('admin.activeContact');
    #active Revervation
    Route::get('/activeRevervation{reservation}', [Admin\HomeController::class, 'activeReservation'])->name('admin.activeReservation');

    #abouts
    Route::prefix('abouts')->middleware(['can:about-edit'])->group(function () {
        Route::get('index', [Admin\AboutUsController::class, 'index'])->name('abouts.index');
        Route::get('edit/{id}', [Admin\AboutUsController::class, 'edit'])->name('abouts.edit');
        Route::post('update/{id}', [Admin\AboutUsController::class, 'update'])->name('abouts.update');

        Route::prefix('galleries')->group(function () {
            Route::get('index', [Admin\GalleryController::class, 'index'])->name('galleries.index');
            Route::get('add', [Admin\GalleryController::class, 'add'])->name('galleries.add');
            Route::post('store', [Admin\GalleryController::class, 'store'])->name('galleries.store');
            Route::get('edit/{gallery}', [Admin\GalleryController::class, 'edit'])->name('galleries.edit');
            Route::post('edit/{gallery}', [Admin\GalleryController::class, 'update'])->name('galleries.update');
            Route::DELETE('destroy', [Admin\GalleryController::class, 'destroy'])->name('galleries.destroy');
        });
        Route::prefix('banners')->group(function () {
            Route::get('index', [Admin\MenuController::class, 'index'])->name('banners.index');
            Route::get('add', [Admin\MenuController::class, 'create'])->name('banners.add');
            Route::post('add', [Admin\MenuController::class, 'store'])->name('banners.store');
            Route::get('edit/{menu}', [Admin\MenuController::class, 'show'])->name('banners.edit');
            Route::post('update/{menu}', [Admin\MenuController::class, 'update'])->name('banners.update');
            Route::DELETE('destroy', [Admin\MenuController::class, 'destroy'])->name('banners.destroy');
        });
        Route::prefix('sliders')->group(function () {
            Route::get('list', [Admin\SliderController::class, 'index'])->name('sliders.index');
            Route::get('add', [Admin\SliderController::class, 'create'])->name('sliders.add');
            Route::post('store', [Admin\SliderController::class, 'store'])->name('sliders.store');
            Route::get('edit/{slider}', [Admin\SliderController::class, 'show'])->name('sliders.edit');
            Route::post('update/{slider}', [Admin\SliderController::class, 'update'])->name('sliders.update');
            Route::DELETE('destroy', [Admin\SliderController::class, 'destroy'])->name('sliders.destroy');
        });
    });

    #Menu
    Route::prefix('products')->middleware(['can:menu-edit'])->group(function () {
        Route::get('index', 'Admin\ProductController@index')->name('products.index');
        Route::get('add', 'Admin\ProductController@create')->name('products.add');
        Route::post('add', 'Admin\ProductController@store')->name('products.store');
        Route::get('edit/{product}', 'Admin\ProductController@show')->name('products.edit');
        Route::post('update/{product}', 'Admin\ProductController@update')->name('products.update');
        Route::DELETE('destroy', 'Admin\ProductController@destroy')->name('products.destroy');

        Route::prefix('categories')->group(function () {
            Route::get('index', [Admin\ProductCategoryController::class, 'index'])->name('categories.index');;
            Route::get('add', [Admin\ProductCategoryController::class, 'create'])->name('categories.add');;
            Route::post('store', [Admin\ProductCategoryController::class, 'store'])->name('categories.store');;
            Route::get('edit/{productcategory}', [Admin\ProductCategoryController::class, 'show'])->name('categories.edit');;
            Route::post('update/{productcategory}', [Admin\ProductCategoryController::class, 'update'])->name('categories.update');;
            Route::DELETE('destroy', [Admin\ProductCategoryController::class, 'destroy'])->name('categories.destroy');;
        });

        Route::prefix('comments')->group(function () {
            Route::get('index', [Admin\ProductCommentController::class, 'index'])->name('product_comments.index');
            Route::get('lists{productcomment}', [Admin\ProductCommentController::class, 'activeCMT'])->name('activeCMT');
            Route::get('list{productcomment}', [Admin\ProductCommentController::class, 'inactiveCmt'])->name('inactiveCMT');
        });
    });

    #Quản lý blog
    Route::prefix('blogs')->middleware(['can:blog-edit'])->group(function () {
        #Quản lý bài viết
        Route::prefix('post')->group(function () {
            Route::get('index', [Admin\BlogController::class, 'index'])->name('posts.index');
            Route::get('add', [Admin\BlogController::class, 'create'])->name('posts.add');
            Route::post('add', [Admin\BlogController::class, 'store'])->name('posts.store');
            Route::get('edit/{post}', [Admin\BlogController::class, 'show'])->name('posts.edit');
            Route::post('update/{post}', [Admin\BlogController::class, 'update'])->name('posts.update');
            Route::DELETE('destroy', [Admin\BlogController::class, 'destroy'])->name('posts.destroy');
        });
        #Quản lý danh mục bài viết
        Route::prefix('categories')->group(function () {
            Route::get('index', [Admin\BlogCategoryController::class, 'index'])->name('post_categories.index');
            Route::get('add', [Admin\BlogCategoryController::class, 'create'])->name('post_categories.add');
            Route::post('add', [Admin\BlogCategoryController::class, 'store'])->name('post_categories.store');
            Route::get('edit/{postcategory}', [Admin\BlogCategoryController::class, 'show'])->name('post_categories.edit');
            Route::post('update/{postcategory}', [Admin\BlogCategoryController::class, 'update'])->name('post_categories.update');
            Route::DELETE('destroy', [Admin\BlogCategoryController::class, 'destroy'])->name('post_categories.destroy');
        });
        #Quản lý bình luận bài viết
        Route::prefix('comments')->group(function () {
            Route::get('index', [Admin\BlogCommentController::class, 'index'])->name('post_comments.index');
            Route::get('lists{productcomment}', [Admin\BlogCommentController::class, 'activeCMT'])->name('post_comments.activeCMT');
            Route::get('list{productcomment}', [Admin\BlogCommentController::class, 'inactiveCmt'])->name('post_comments.inactiveCMT');
        });
    });

    #Upload hình
    Route::post('upload/services', [Admin\UploadController::class, 'store']);

    #Quản lý hóa đơn
    Route::prefix('transactions')->middleware(['can:order-edit'])->group(function () {
        Route::get('index', 'Admin\TransactionController@index')->name('transactions.index');
        Route::get('detail/{transaction}', 'Admin\TransactionController@detail')->name('transactions.detail');
        Route::get('active{transaction}', [Admin\TransactionController::class, 'active'])->name('transactions.active');
        Route::get('cancel{transaction}', [Admin\TransactionController::class, 'cancel'])->name('transactions.cancel');
        Route::DELETE('destroy', [Admin\TransactionController::class, 'destroy'])->name('transactions.destroy');
        #Quản lý phí vận chuyển
        Route::prefix('feeships')->group(function () {
            Route::get('list', [Admin\FeeShipController::class, 'index'])->name('feeships.index');
            Route::get('add', [Admin\FeeShipController::class, 'create'])->name('feeships.add');
            Route::post('add', [Admin\FeeShipController::class, 'store'])->name('feeships.store');
            Route::get('edit/{feeship}', [Admin\FeeShipController::class, 'show'])->name('feeships.edit');
            Route::post('edit/{feeship}', [Admin\FeeShipController::class, 'update'])->name('feeships.update');
            Route::post('load_address', 'Admin\FeeShipController@load_address')->name('feeships.load_address');
            Route::DELETE('destroy', [Admin\FeeShipController::class, 'destroy'])->name('feeships.destroy');
        });
        #Quản lý mã giảm giá
        Route::prefix('coupons')->group(function () {
            Route::get('index', [Admin\CouponController::class, 'index'])->name('coupons.index');
            Route::get('add', [Admin\CouponController::class, 'create'])->name('coupons.add');
            Route::post('add', [Admin\CouponController::class, 'store'])->name('coupons.store');
            Route::get('edit/{coupon}', [Admin\CouponController::class, 'show'])->name('coupons.edit');
            Route::post('update/{coupon}', [Admin\CouponController::class, 'update'])->name('coupons.update');
            Route::DELETE('destroy', [Admin\CouponController::class, 'destroy'])->name('coupons.destroy');
        });
    });

    #Quản lý tài khoản
    Route::prefix('members')->middleware('can:user-edit')->group(function () {
        Route::get('list', 'Admin\UserController@index')->name('members');
        Route::post('/update/{id}', 'Admin\UserController@update')->name('members.update');
        Route::delete('/destroy/{id}', 'Admin\UserController@destroy')->name('members.destroy');
    });

    #Quản lý phân quyền
    Route::prefix('authorization')->group(function () {
        #Quản lý vai trò
        Route::prefix('roles')->middleware(['can:role-edit'])->group(function () {
            Route::get('/', 'Admin\RoleController@index')->name('role');
            Route::post('/', 'Admin\RoleController@store')->name('role.store');
            Route::get('/show', 'Admin\RoleController@show')->name('role.show');
            Route::get('/edit/{id}', 'Admin\RoleController@edit')->name('role.edit');
            Route::put('/edit/{id}', 'Admin\RoleController@update')->name('role.update');
            Route::delete('/destroy/{id}', 'Admin\RoleController@destroy')->name('role.destroy');
        });
        #Quản lý quyền
        Route::prefix('permissions')->middleware('can:role-edit')->group(function () {
            Route::get('/list', 'Admin\PermissionController@index')->name('permissions');
            Route::post('/list', 'Admin\PermissionController@store')->name('permission.store');
            Route::post('load_function', 'Admin\PermissionController@load_function')->name('permission.load_function');
            Route::get('/show', 'Admin\PermissionController@show')->name('permission.show');
            Route::get('/edit/{id}', 'Admin\PermissionController@edit')->name('permission.edit');
            Route::put('/edit/{id}', 'Admin\PermissionController@update')->name('permission.update');
            Route::delete('/destroy/{id}', 'Admin\PermissionController@destroy')->name('permission.destroy');
        });
    });
});

//USER
#Trang chủ
Route::get('/', [User\HomeController::class, 'index'])->name('home');
Route::post('/load_more_latest_product', [User\HomeController::class, 'latest_product'])->name("home.latest-product");

#Thực đơn
Route::prefix('thuc-don')->group(function () {
    Route::get('/', [User\ProductController::class, 'index'])->name('menus.index');
    Route::get('/{id}-{slug}', [User\ProductController::class, 'details']);
    Route::post('/them-gio-hang-ajax', [User\CartController::class, 'add_to_cart'])->name('menus.add_to_cart');
    Route::delete('/xoa/{id}', [User\CartController::class, 'destroy_cart'])->name('menus.destroy');
    Route::post('/danh-gia-{id}', [User\ProductController::class, 'postComment'])->name('menus.comment');
});

#Cart
Route::prefix('gio-hang')->group(function () {
    Route::get('/', [User\CartController::class, 'index'])->name('cart.index');
    Route::post('/them-gio-hang', [User\CartController::class, 'add'])->name('cart.add');
    // Route::post('/addToCartAjax', [User\CartController::class, 'addToCartAjax']);
    Route::get('/Ajax', [User\CartController::class, 'showcartAjax']);
    Route::get('/cap-nhat-ajax-dec', [User\CartController::class, 'cart_decrease'])->name('cart.decrease');
    Route::get('/cap-nhat-ajax-inc', [User\CartController::class, 'cart_increase'])->name('cart.increase');
    Route::post('/cap-nhat', [User\CartController::class, 'updatecart']);
    Route::delete('/xoa/{id}', [User\CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/carts', [User\CartController::class, 'addCart']);
    Route::post('/check_coupon', [User\CartController::class, 'check_coupon'])->name('cart.check_coupon');
});
#middleware
Route::middleware(['auth'])->group(function () {
    Route::prefix('thanh-toan')->group(function () {
        Route::get('/', [User\TransactionController::class, 'index'])->name(('checkout.index'));
        Route::post('/', [User\TransactionController::class, 'addOrders']);
        Route::get('/vnPayCheck', [User\TransactionController::class, 'vnPayCheck']);
        Route::get('/thanh-cong', [User\TransactionController::class, 'thanhtoanthanhcong']);
    });

    #Người dùng
    Route::prefix('tai-khoan')->group(function () {
        Route::get('/', 'User\UserController@index')->name('account');
        Route::get('/thay-doi-thong-tin', 'User\UserController@redirectLogin');
        Route::post('load_address_user', 'User\UserController@load_address')->name('account.load_address');
        Route::get('/thay-doi-thong-tin/{user}', 'User\UserController@changeInfor');
        Route::post('/thay-doi-thong-tin/{user}', 'User\UserController@updateInfor');

        Route::get('/thay-doi-mat-khau/{user}', 'User\UserController@changePassword');
        Route::post('/thay-doi-mat-khau/{user}', 'User\UserController@updatePassword');
    });

    #Đặt bàn
    Route::prefix('dat-ban')->group(function () {
        Route::get('/', [User\ReservationController::class, 'index']);
        Route::post('/', [User\ReservationController::class, 'postReservation']);
        Route::get('/thanh-cong', [User\TransactionController::class, 'datbanthanhcong']);
    });

    #Liên hệ
    Route::prefix('lien-he')->group(function () {
        Route::get('/', [User\ContactController::class, 'index']);
        Route::post('/', [User\ContactController::class, 'postContact']);
        Route::get('/thanh-cong', [User\TransactionController::class, 'lienhethanhcong']);
    });
});

#Blog
Route::prefix('blog')->group(function () {
    //list
    Route::get('/', [User\BlogController::class, 'index'])->name("blog");
    //detail
    Route::get('{id}-{slug}', [User\BlogController::class, 'detail'])->name("blog.detail");
    //category
    Route::get('danh-muc/{id}-{slug}', [User\BlogController::class, 'category'])->name("blog.category");
    //search
    Route::post('/tim-kiem-ajax', [User\BlogController::class, 'searchAjax'])->name("blog.searchAjax");
    Route::post('/tim-kiem', [User\BlogController::class, 'search'])->name("blog.search");
    //comment
    Route::prefix('binh-luan')->group(function () {
        Route::post('gui/{post_id}', [User\BlogController::class, 'add_comment'])->name("comment.send");
        Route::post('load_comment', [User\BlogController::class, 'load_Comment'])->name("comment.load_more");
        Route::post('moi-nhat', [User\BlogController::class, 'latest_comment'])->name("comment.latest");
        Route::post('thich-nhat', [User\BlogController::class, 'popular_comment'])->name("comment.popular");
        Route::post('thich', [User\BlogController::class, 'postCommentLike'])->name("comment.like");
        Route::post('an-binh-luan', [User\BlogController::class, 'comment_hidden'])->name("comment.hidden");


    });
    //reply
    Route::prefix('tra-loi')->group(function () {
        Route::post('binh-luan/{id}', [User\BlogController::class, 'add_reply'])->name("reply.send");
        Route::post('thich', [User\BlogController::class, 'postReplyLike'])->name("reply.like");
        Route::post('an-tra-loi', [User\BlogController::class, 'reply_hidden'])->name("reply.hidden");
});
});

#Giới thiệu
Route::prefix('gioi-thieu')->group(function () {
    Route::get('/', [User\AboutUsController::class, 'index']);
});

#Đăng nhập-Ký-Xuất
Route::group(['namspace' => 'Auth'], function () {
    #Register
    Route::prefix('dang-ky')->group(function () {
        // register
        Route::get('/', 'User\AuthController@register')->name('register');
        Route::post('/', 'User\AuthController@registerHandle');
        //register Verify
        Route::get('/thanh-cong', 'User\AuthController@registrationSuccess')->name('register.success');
        //sent Verify mail
        Route::get('/gui-lai/xac-thuc/{email}', 'User\AuthController@sendEmailVerify')->name('register.sendEmailVerify');
        //Verify mail
        Route::get('/xac-thuc/{id}/{token}', 'User\AuthController@registerVerify')->name('register.verify');
    });
    #Login
    Route::prefix('dang-nhap')->group(function () {
        //login
        Route::get('/', 'User\AuthController@login')->name('login');
        Route::post('/', 'User\AuthController@loginHandle');
        Route::post('/ajax', 'User\AuthController@loginAjaxHandle')->name('login.ajax');;
        #Login with Facebook
        Route::get('/facebook', 'User\AuthController@redirectToFacebook')->name('login.facebook');
        Route::get('/facebook/callback', 'User\AuthController@handleFacebookCallback');
        #Login with Google
        Route::get('/google', 'User\AuthController@redirectToGoogle')->name('login.google');
        Route::get('/google/callback', 'User\AuthController@handleGoogleCallback');
    });
    #Forgot password
    Route::get('/quen-mat-khau', 'User\AuthController@forgotPassword')->name("forgotPassword");
    Route::post('/quen-mat-khau', 'User\AuthController@forgotPasswordHandle');
    #Change password
    Route::get('/thay-doi-mat-khau/{id}/{token}', 'User\AuthController@changePassword')->name("changePassword");
    Route::post('/thay-doi-mat-khau/{id}/{token}', 'User\AuthController@changetPasswordHandle');
    #Logout
    Route::post('/dang-xuat', 'User\AuthController@logout')->name("logout");
});
