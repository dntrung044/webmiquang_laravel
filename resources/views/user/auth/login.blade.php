@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('teamplate/css/auth.css') }}" rel="stylesheet">
    <style>
        .form-inline label {
            padding-left: 10px;
            margin: 0;
            cursor: pointer
        }

        .panel {
            min-height: 380px;
            box-shadow: 20px 20px 80px rgb(218, 218, 218);
            border-radius: 12px
        }
    </style>
@endsection
@extends('user.layout.main')
@section('content')
    <main>
        <div class="hero_single inner_pages background-image d-none d-md-block"
            data-background="url(teamplate/img/Reservation.jpg)">
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
                                    <span>Đăng nhập</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->
        <div class="container-fluid inner col-md-6 my-3 bg-white">
            <div class="text-center mb-3">
                <h3 class="pt-3 font-weight-bold">Đăng nhập tài khoản</h3>
            </div>
            <div class="panel-body p-3">
                <form action="/dang-nhap" method="POST" onsubmit="return validateLogin(event)">
                    @csrf
                    <div class="form-group py-2">
                        <div class="input_field">
                            <span class="far fa-user p-2"></span>
                            <input name="email" class="no_border" type="text" placeholder="Nhập Email" id="email" value="admin@gmail.com">
                        </div>
                        <small class="text-danger d-none" id="emailError">Vui lòng nhập email hợp lệ.</small>
                    </div>
                    <div class="form-group py-1 pb-2">
                        <div class="input_field">
                            <span class="fas fa-lock px-2"></span>
                            <input type="password" class="no_border" placeholder="Nhập mật khẩu" name="password" id="password" value="123456">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)">
                                <span class="far fa-eye-slash"></span>
                            </button>
                        </div>
                        <small class="text-danger d-none" id="passwordError">Vui lòng nhập mật khẩu (tối thiểu 6 ký tự).</small>
                    </div>
                    <div class="form-inline w-100 d-flex justify-content-between">
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" name="remember" id="remember">
                            <span class="overflow-control-indicator"></span>
                            <span class="text-muted ml-3">Nhớ mật khẩu</span>
                        </label>
                        <a href="{{ route('forgotPassword') }}" id="forgot" class="font-weight-bold ml-auto">
                            Quên mật khẩu?
                        </a>
                    </div>
                    <button type="submit" class="btn btn-primary bt_auth btn-block mt-3">Đăng nhập</button>
                </form>

                <div class="text-center pt-4 text-muted">Bạn không có tài khoản?
                    <a href="{{ route('register') }}">Hãy tạo tài khoản!</a>
                </div>

            </div>

            <div class="mx-3 my-2 py-2 bordert">
                <div class="text-center py-3">
                    <a href="{{ route('login.google') }}" class="px-2">
                        <img class="icon_social" src="teamplate/img/Google__G__Logo.svg" style="width: 32px; height: 32px;"
                            alt="">
                    </a>
                    <a href="{{ route('login.facebook') }}" class="px-2">
                        <img class="icon_social" src="teamplate/img/icons8-facebook.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
<script>
    function validateLogin(event) {
        event.preventDefault(); // Ngăn chặn submit mặc định
        let valid = true;

        let email = document.getElementById("email");
        let password = document.getElementById("password");
        let emailError = document.getElementById("emailError");
        let passwordError = document.getElementById("passwordError");

        // Reset trạng thái lỗi
        email.classList.remove("is-invalid");
        password.classList.remove("is-invalid");
        emailError.classList.add("d-none");
        passwordError.classList.add("d-none");

        // Kiểm tra email hợp lệ
        if (email.value.trim() === "" || !validateEmail(email.value)) {
            email.classList.add("is-invalid");
            emailError.classList.remove("d-none");
            valid = false;
        }

        // Kiểm tra mật khẩu
        if (password.value.length < 6) {
            password.classList.add("is-invalid");
            passwordError.classList.remove("d-none");
            valid = false;
        }

        if (valid) {
            event.target.submit(); // Nếu hợp lệ thì gửi form
        }
    }

    function validateEmail(email) {
        let re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }

    function togglePassword(fieldId, button) {
        let input = document.getElementById(fieldId);
        let icon = button.querySelector("span");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        }
    }
</script>
@endsection