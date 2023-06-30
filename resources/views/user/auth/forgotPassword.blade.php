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
                                <li
                                    style="display: inline-block;
                                        position: relative;
                                        padding: 0 16px 0 23px;">
                                    <a href="/" title="">Trang chủ</a>
                                </li>/
                                <li
                                    style="display: inline-block;
                                        position: relative;
                                        padding: 0 16px 0 23px;">
                                    <span>Đăng nhập</span></li>
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
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/oWTW-jNGl9I/600x800')">
                </div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="px-8 mb-4 text-center">
                        <h3 class="pt-4 mb-2 text-2xl">Quên Mật khẩu?</h3>
                        <p class="mb-4 text-sm text-gray-700">
                            Chúng tôi hiểu điều đó, mọi thứ xảy ra. Chỉ cần nhập địa chỉ email của bạn bên dưới và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn!
                        </p>
                        @include('user.layout.alert')
                    </div>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email" name="email" value="{{ old('email') }}"
                                type="email" placeholder="Nhập địa chỉ Email..."/>
                        </div>
                        <div class="mb-6 text-center">
                            <button class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
                                type="submit" >
                               Đặt lại mật khẩu
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="/dang-ky">
                                Tạo một tài khoản!
                            </a>
                        </div>
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="/dang-nhap"  >
                                Bạn đã có tài khoản? Đăng nhập!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
