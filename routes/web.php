<?php 
use Illuminate\Support\Facades\Artisan; 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin;
use App\Http\Controllers\User;  

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    echo '<script>alert("done")</script>';
});

// -------------------------ADMIN-------------------------
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        #Trang chủ
        Route::get('/', [Admin\IndexController::class, 'index'])->name('admin');
        #Trạng thái liên hệ
        Route::get('/activeContact{contact}', [Admin\IndexController::class, 'activeContact'])->name('admin.activeContact');
        #Trạng thái đặt bàn
        Route::get('/activeRevervation{reservation}', [Admin\IndexController::class, 'activeReservation'])->name('admin.activeReservation');
        #Quản lý thông tin
        Route::prefix('abouts')->middleware(['can:about-list,can:about-edit'])->group(function () {
            Route::get('index', [Admin\AboutUsController::class, 'index'])->name('abouts.index');
            Route::get('edit/{id}', [Admin\AboutUsController::class, 'edit'])->name('abouts.edit');
            Route::post('update/{id}', [Admin\AboutUsController::class, 'update'])->name('abouts.update');

            #Quản lý hình ảnh
            Route::prefix('galleries')->group(function () {
                Route::get('index', [Admin\GalleryController::class, 'index'])->name('galleries.index');
                Route::get('add', [Admin\GalleryController::class, 'add'])->name('galleries.add');
                Route::post('store', [Admin\GalleryController::class, 'store'])->name('galleries.store');
                Route::get('edit/{gallery}', [Admin\GalleryController::class, 'edit'])->name('galleries.edit');
                Route::post('edit/{gallery}', [Admin\GalleryController::class, 'update'])->name('galleries.update');
                Route::DELETE('destroy', [Admin\GalleryController::class, 'destroy'])->name('galleries.destroy');
            });
            #Quản lý banner
            Route::prefix('banner')->group(function () {
                Route::get('index', [Admin\MenuController::class, 'index'])->name('banners.index');
                Route::get('add', [Admin\MenuController::class, 'create'])->name('banners.add');
                Route::post('add', [Admin\MenuController::class, 'store'])->name('banners.store');
                Route::get('edit/{menu}', [Admin\MenuController::class, 'show'])->name('banners.edit');
                Route::post('update/{menu}', [Admin\MenuController::class, 'update'])->name('banners.update');
                Route::DELETE('destroy', [Admin\MenuController::class, 'destroy'])->name('banners.destroy');
            });
            #Quản lý Slider
            Route::prefix('sliders')->group(function () {
                Route::get('list', [Admin\SliderController::class, 'index'])->name('sliders.index');
                Route::get('add', [Admin\SliderController::class, 'create'])->name('sliders.add');
                Route::post('store', [Admin\SliderController::class, 'store'])->name('sliders.store');
                Route::get('edit/{slider}', [Admin\SliderController::class, 'show'])->name('sliders.edit');
                Route::post('update/{slider}', [Admin\SliderController::class, 'update'])->name('sliders.update');
                Route::DELETE('destroy', [Admin\SliderController::class, 'destroy'])->name('sliders.destroy');
            });
        }); 
        #Quản lý món ăn
        Route::prefix('products')->group(function () {
            Route::get('index', 'Admin\ProductController@index')->name('products.index');
            Route::post('add', 'Admin\ProductController@store')->name('products.add');
            Route::get('edit/{product}', 'Admin\ProductController@show')->name('products.index');
            Route::post('edit/{product}', 'Admin\ProductController@update')->name('products.index');
            Route::DELETE('destroy', 'Admin\ProductController@destroy')->name('products.index');
            #Quản lý danh mục
            Route::prefix('categories')->group(function () {
                Route::get('index', [Admin\ProductCategoryController::class, 'index'])->name('categories.index');;
                Route::get('add', [Admin\ProductCategoryController::class, 'create'])->name('categories.add');;
                Route::post('store', [Admin\ProductCategoryController::class, 'store'])->name('categories.store');;
                Route::get('edit/{productcategory}', [Admin\ProductCategoryController::class, 'show'])->name('categories.edit');;
                Route::post('update/{productcategory}', [Admin\ProductCategoryController::class, 'update'])->name('categories.update');;
                Route::DELETE('destroy', [Admin\ProductCategoryController::class, 'destroy'])->name('categories.destroy');;
            });
            #Quản lý bình luận
            Route::prefix('comments')->group(function () {
                Route::get('index', [Admin\ProductCommentController::class, 'listProductCmt'])->name('product_comments.index');
                Route::get('lists{productcomment}', [Admin\ProductCommentController::class, 'activeCMT'])->name('activeCMT');
                Route::get('list{productcomment}', [Admin\ProductCommentController::class, 'inactiveCmt'])->name('inactiveCMT');
            });
        }); 
        #Quản lý blog
        Route::prefix('blogs')->group(function () {
            #Quản lý bài viết
            Route::prefix('post')->middleware(['can:blog-list,can:blog-add,can:blog-edit,can:blog-delete'])->group(function () {
                Route::get('index', [Admin\BlogController::class, 'index'])->name('posts.index');
                Route::get('add', [Admin\BlogController::class, 'create'])->name('posts.add');
                Route::post('store', [Admin\BlogController::class, 'store'])->name('posts.store');
                Route::get('edit/{post}', [Admin\BlogController::class, 'show'])->name('posts.edit');
                Route::post('update/{post}', [Admin\BlogController::class, 'update'])->name('posts.update');
                Route::DELETE('destroy', [Admin\BlogController::class, 'destroy'])->name('posts.destroy');
            });
            #Quản lý danh mục bài viết
            Route::prefix('categories')->middleware(['can:blog-list,can:blog-add,can:blog-edit,can:blog-delete'])
                ->group(function () {
                    Route::get('index', [Admin\BlogCategoryController::class, 'index'])->name('post_categories.index');
                    Route::get('add', [Admin\BlogCategoryController::class, 'create'])->name('post_categories.add');
                    Route::post('store', [Admin\BlogCategoryController::class, 'store'])->name('post_categories.store');
                    Route::get('edit/{postcategory}', [Admin\BlogCategoryController::class, 'show'])->name('post_categories.edit');
                    Route::post('update/{postcategory}', [Admin\BlogCategoryController::class, 'update'])->name('post_categories.update');
                    Route::DELETE('destroy', [Admin\BlogCategoryController::class, 'destroy'])->name('post_categories.destroy');
                });
            #Quản lý bình luận bài viết
        }); 

        #Upload hình
        Route::post('upload/services', [Admin\UploadController::class, 'store']); 
        #Quản lý phí vận chuyển
        Route::prefix('feeships')->group(function () {
            Route::get('list', [Admin\FeeShipController::class, 'index'])->name('feeships.index');
            Route::get('add', [Admin\FeeShipController::class, 'create'])->name('feeships.add');
            Route::post('add_address', [Admin\FeeShipController::class, 'add_address'])->name('feeships.add_address');
            Route::post('add', [Admin\FeeShipController::class, 'store'])->name('feeships.store');
            Route::get('edit/{post}', [Admin\FeeShipController::class, 'show'])->name('feeships.posts');
            Route::post('edit/{post}', [Admin\FeeShipController::class, 'update'])->name('feeships.posts');
            Route::DELETE('destroy', [Admin\FeeShipController::class, 'destroy'])->name('feeships.posts');
        }); 
        #Quản lý hóa đơn
        Route::prefix('transactions')->middleware(['can:transaction'])->group(function () {
            Route::get('/', 'Admin\TransactionController@index')->name('transactions.index');
            Route::get('/detail/{transaction}', 'Admin\TransactionController@detail')->name('detail.index');
            Route::get('/active{transaction}', [Admin\TransactionController::class, 'active'])->name('transaction.active');
            Route::DELETE('/destroy', [Admin\TransactionController::class, 'destroy'])->name('transactions.destroy');
        });

        #Thêm tài khoản quản trị
        // Route::get('/add-admins', [User\UserController::class, 'getAdmin']);
        // Route::post('/add-admins', [Admin\UserController::class, 'postAddAdmin']);

        #Phân quyền
        Route::prefix('authorization')->group(function () {
            #Quản lý tài khoản 
            Route::prefix('members')->middleware(['can:user'])->group(function () {
                Route::get('list', 'Admin\UserController@index')->name('members');
                Route::get('/edit/{id}', 'Admin\UserController@show');
                Route::post('/edit/{id}', 'Admin\UserController@update');
                Route::DELETE('/destroy', [Admin\UserController::class, 'destroy']);
                Route::get('/active{user}', [Admin\UserController::class, 'active'])->name('user.active');
            });
            #Quản lý vai trò 
            Route::prefix('roles')->middleware(['can:role'])->group(function () {
                Route::get('/', 'Admin\RoleController@index')->name('roles');
                Route::post('/', 'Admin\RoleController@store')->name('roles.store');
                Route::get('/show', 'Admin\RoleController@show')->name('roles.show');
                Route::get('/edit/{id}', 'Admin\RoleController@edit')->name('roles.edit');
                Route::post('/edit/{id}', 'Admin\RoleController@update')->name('roles.update');
                Route::delete('/destroy/{id}', 'Admin\RoleController@destroy')->name('roles.destroy');
            });
            #Quản lý quyền 
            Route::prefix('permissions')->middleware(['can:permission', 'can:role-delete'])->group(function () {
                Route::get('/list', 'Admin\PermissionController@index')->name('permissions');
                Route::post('/list', 'Admin\PermissionController@store')->name('permission.store');
                Route::get('/function/show', 'Admin\PermissionController@show_function')->name('function.show');
                Route::post('/permissionCat', 'Admin\PermissionController@store_permissionCat')->name('permissionCat.store');
                Route::get('/permissionCat/show', 'Admin\PermissionController@show_permissionCat')->name('permissionCat.show');
                Route::get('/show', 'Admin\PermissionController@show')->name('permission.show');
                Route::get('/edit/{id}', 'Admin\PermissionController@edit')->name('permission.edit')->middleware('auth');
                Route::put('/edit/{id}', 'Admin\PermissionController@update')->name('permission.update');
                Route::delete('/destroy/{id}', 'Admin\PermissionController@destroy')->name('permission.destroy')->middleware('auth');
                Route::post('load_function', 'Admin\PermissionController@load_function')->name('permission.load_function');
            });
        });

    });
});

//-------------------------USER----------------------------
#index
Route::get('/', [User\HomeController::class, 'index'])->name('home');
Route::post('/load_more_latest_product', [User\HomeController::class, 'latest_product'])->name("home.latest-product");

#Menu
Route::prefix('thuc-don')->group(function () {
    Route::get('/', [User\ProductController::class, 'index'])->name('menus.index');
    Route::get('/{id}-{slug}', [User\ProductController::class, 'details']);
    Route::get('/add-to-cart/{id}', [User\ProductController::class, 'add_to_cart'])->name('menus.add_to_cart');
    #Comment product
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

        Route::get('/thay-doi-thong-tin/{user}', 'User\UserController@changeInfor');
        Route::post('/thay-doi-thong-tin/{user}', 'User\UserController@updateInfor');

        Route::get('/thay-doi-mat-khau/{user}', 'User\UserController@changePassword');
        Route::post('/thay-doi-mat-khau/{user}', 'User\UserController@updatePassword');

        Route::post('load_address', 'User\UserController@load_address');
        Route::post('calculate_ship', 'User\UserController@calculate_ship');
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
    Route::get('/{id}-{slug}', [User\BlogController::class, 'detail'])->name("blog.detail");
     
    //comment
    Route::post('/binh-luan/{id}', [User\BlogController::class, 'add_Comment'])->name("blog.comment");
    Route::post('/load_comment', [User\BlogController::class, 'load_comment'])->name("comment.load-more");
    Route::post('/binh-luan/sap-xep/moi-nhat', [User\BlogController::class, 'latest_comment'])->name("comment.latest");
    Route::post('/binh-luan/sap-xep/thich-nhat', [User\BlogController::class, 'popular_comment'])->name("comment.popular");
    Route::post('/binh-luan/thich/binh-luan', [User\BlogController::class, 'postCommentLike'])->name("comment.like");
    //reply
    Route::post('/tra-loi-binh-luan/{id}', [User\BlogController::class, 'add_Reply'])->name("blog.reply"); 
    Route::post('/load_reply', [User\BlogController::class, 'load_Reply'])->name("reply.load-more"); 
    //category
    Route::get('/danh-muc/{id}-{slug}', [User\BlogController::class, 'category'])->name("blog.category");
    //search
    Route::post('/tim-kiem-ajax', [User\BlogController::class, 'searchAjax'])->name("blog.searchAjax");
    Route::post('/tim-kiem', [User\BlogController::class, 'search'])->name("blog.search");
});

#Giới thiệu
Route::prefix('gioi-thieu')->group(function () {
    Route::get('/', [User\AboutUsController::class, 'index']);
});

#Đăng nhập-Ký-Xuất user
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
        #Login
        Route::get('/', 'User\AuthController@login')->name('login');
        Route::post('/', 'User\AuthController@loginHandle');
        Route::post('/ajax', 'User\AuthController@loginAjax')->name('login.ajax');;
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