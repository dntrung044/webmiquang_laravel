<?php $__env->startSection('head'); ?>
    <!--Font-Awesome cdn -->
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Tailwind -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/tintuc.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1><?php echo e($title); ?></h1> <br>
                            <ul>
                                <li style="display: inline-block;
                                position: relative;
                                padding: 0 16px 0 23px;"><a href="/" title="">Trang chủ</a>
                                </li>/

                                <li style="display: inline-block;
                                position: relative;
                                padding: 0 16px 0 23px;"><span>Đăng ký</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <section class="bg-blueGray-500 pattern_2">
            <div class="w-full lg:w-6/12 px-4 mx-auto pt-6">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-yellow-300 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-lg font-bold">
                                Đăng ký với
                            </h6>
                        </div>
                        <div class="btn-wrapper text-center">
                            <a href="<?php echo e(route('login.google')); ?>"
                                class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                                type="button">
                                <img alt="..." class="w-5 mr-1"
                                    src="/teamplate/img/Google__G__Logo.svg">
                                    Google
                                </a>
                            <a href="<?php echo e(route('login.facebook')); ?>"
                                class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150">
                                <img alt="..." class="w-5 mr-1"
                                    src="/teamplate/img/icons8-facebook.svg">
                                    Facebok
                            </a>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                    </div>

                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div class="text-white-400 text-center mb-3 font-bold">
                            <p class="text-lg">Hoặc đăng ký bằng thông tin đăng nhập</p>
                        </div>

                        <form action="#" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2"
                                    htmlfor="grid-password">
                                    Tên
                                </label>
                                <input type="text" name="name" required="required" value="<?php echo e(old('name')); ?>"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Họ và Tên của bạn.">
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">
                                    Email
                                </label>
                                <input type="email" name="email" required="required" value="<?php echo e(old('email')); ?>"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Địa chỉ Email">
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">
                                    Số điện thoại
                                </label>
                                <input type="number" name="phone" required="required" value="<?php echo e(old('phone')); ?>"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Số điện thoại liên hệ.">
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">
                                    Mật khẩu
                                </label>
                                <input type="password" name="password" required="required" id="password" value="<?php echo e(old('password')); ?>"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Mật khẩu tối thiểu 6 kí tự.">
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">
                                   Nhập lại Mật khẩu
                                </label>
                                <input type="password" name="password_confirm" required="required" id="confirm_password" value="<?php echo e(old('confirm_password')); ?>" oninput="check(this)"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Mật khẩu vừa nhập.">
                            </div>

                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input id="customCheckLogin" type="checkbox" required="required"
                                        class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                    <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        Đồng ý với
                                        <a href="javascript:void(0)" class="text-yellow-800">
                                            Chính sách bảo mật
                                        </a>
                                    </span>
                                </label>
                            </div>

                            <div class="text-center mt-6">
                                <button
                                    class="bg-yellow-500 text-white active:bg-yellow-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit">
                                    Tạo tài khoản
                                </button>
                            </div>
                        </form>
                        <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <p class="flex flex-col items-center justify-center mt-10 text-center">
                            <span class="text-blueGray-800 font-bold">Bạn đã có tài khoản?</span> <br>
                            <a href="/dang-ky"
                            class=" px-3 py-2 text-lg font-semibold text-yellow-500 transition-colors duration-300 bg-white rounded-md shadow hover:bg-white-600 focus:outline-none focus:ring-white-200 focus:ring-4">
                            Quay lại đăng nhập!
                        </a>
                        </p>
                    </div>
                </div>
            </div>

        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Mật khẩu không khớp");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/user/auth/register.blade.php ENDPATH**/ ?>