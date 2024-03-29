@section('head')
    <!--Font-Awesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <!-- Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.4/tailwind.min.css">
@endsection

@extends('user.layout.main')

@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/Reservation.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1> <br>
                            <ul>
                                <li style="display: inline-block;
                                        position: relative;
                                        padding: 0 16px 0 23px;"><a href="/" title="">Trang chủ</a>
                                </li>/
                                <li style="display: inline-block;
                                        position: relative;
                                        padding: 0 16px 0 23px;"><span>Đăng nhập</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->
            <div class="flex items-center min-h-screen p-4 bg-gray-100 lg:justify-center pattern_2">
                <div
                    class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
                    <div
                        class="p-4 py-6 text-white bg-yellow-500 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly">
                        <div>
                            <h2 class="my-3 text-4xl text-gray-900 font-bold tracking-wider text-center">MÌ QUẢNG <BR>BÀ MUA
                            </h2>

                            <p class="mt-6 font-normal text-center text-gray-800 md:mt-0">
                                Đến với Đà Nẵng, Mì Quảng Bà Mua được nhiều du khách rất thích ghé quán để thưởng thức những món ăn nỗi tiếng như mì quảng ếch, mỳ quảng gà, bánh tráng cuốn thịt heo...
                            </p>
                        </div>

                        <p class="flex flex-col items-center text-gray-500 justify-center mt-10 text-center">
                            <span class="text-gray-700">Bạn chưa có tài khoản?</span> <br>
                            <a href="/dang-ky"
                                class=" px-3 py-2 text-lg font-semibold text-yellow-500 transition-colors duration-300 bg-white rounded-md shadow hover:bg-white-600 focus:outline-none focus:ring-white-200 focus:ring-4">
                                Đăng ký ngay!
                            </a>
                        </p>
                    </div>
                    <div class="p-5 bg-white md:flex-1">
                        <h3 class="text-2xl font-semibold text-gray-900">Đăng nhập tài khoản</h3>
                        <p class="my-2 font-semibold text-gray-800">Để được trải nghiệm những chức năng của người dùng!</p>

                        <form class="flex flex-col space-y-5" action="/dang-nhap" method="POST">
                            @csrf
                            <div class="flex flex-col space-y-1">
                                <label class="text-base font-semibold text-gray-700">Email</label>
                                <input name="email"  value=" {{ old('email') }}" type="email" style="background: rgb(182, 180, 180);" autofocus placeholder="Nhập địa chỉ Email"
                                    class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200" />
                            </div>
                            <div class="flex flex-col space-y-1">
                                <div class="flex items-center justify-between">
                                    <label class="text-base font-semibold text-gray-700">Mật khẩu</label>
                                    <a href="{{ route('forgotPassword') }}" class="text-sm text-blue-600 hover:underline focus:text-blue-800">Quên mật khẩu?</a>
                                </div>
                                <input name="password" type="password" placeholder="Nhập mật khẩu" style="background: rgb(182, 180, 180);"
                                    class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200" />
                            </div>

                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input name="remember" id="remember" type="checkbox"
                                        class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                    <span for="remember" class="ml-2 text-sm font-semibold text-blueGray-600">
                                        Ghi nhớ mật khẩu
                                    </span>
                                </label>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-yellow-500 rounded-md shadow hover:bg-yellow-600 focus:outline-none focus:ring-yellow-200 focus:ring-4">
                                    Đăng nhập<p></p>
                                </button>
                            </div>
                            @include('admin.alert')
                            <div class="flex flex-col space-y-5">
                                <span class="flex items-center justify-center space-x-2">
                                    <span class="h-px bg-gray-400 w-14"></span>
                                    <span class="font-normal text-gray-500">Hoặc đăng nhập bằng</span>
                                    <span class="h-px bg-gray-400 w-14"></span>
                                </span>
                                <div class="flex flex-col space-y-4">
                                    <a href="{{ route('login.google') }}"
                                        class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-gray-800 rounded-md group hover:bg-gray-800 focus:outline-none">
                                        <span>
                                            <img src="/teamplate/img/Google__G__Logo.svg" alt="">
                                        </span>
                                        <span class="text-sm font-medium text-gray-800 group-hover:text-white">Google</span>
                                    </a>
                                    <a href="{{ route('login.facebook') }}"
                                        class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-blue-500 rounded-md group hover:bg-blue-500 focus:outline-none">
                                        <span>
                                            <img src="/teamplate/img/icons8-facebook.svg" style="width: 30px" alt="">
                                        </span>
                                        <span
                                            class="text-sm font-medium text-blue-500 group-hover:text-white">Facebook</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
@endsection
