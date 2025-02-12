@section('head')
    <link href="{{ asset('teamplate/css/auth.css') }}" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection
@extends('user.layout.main')
@section('content')
    <main>
        <div class="hero_single inner_pages background-image d-none d-md-block"
            data-background="url(teamplate/img/tintuc.jpg)">
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
                                    <span>Đăng ký</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>

        <div class="container-fluid inner col-md-6 mb-5">
            <form id="registerForm" class="pt-3 mt-md-0 pb-4" action="#" method="POST"
                onsubmit="return validateForm(event)">
                @csrf
                <div class="text-center mb-3">
                    <h3 class="title">Đăng ký tài khoản</h3>
                </div>
                <div class="form-group">
                    <label for="name" class="ml-3">Tên</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập Họ và Tên">
                </div>
                <div class="form-group">
                    <label for="email" class="ml-3">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Nhập Địa chỉ Email">
                </div>
                <div class="form-group">
                    <label for="phone" class="ml-3">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" id="phone"
                        placeholder="Nhập Số điện thoại liên hệ">
                </div>
                <div class="form-group">
                    <label for="password" class="ml-3">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Nhập Mật khẩu tối thiểu 6 kí tự">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="togglePassword('password')">
                                <span class="far fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="ml-3">Nhập lại Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password_confirm" id="confirmPassword"
                            placeholder="Nhập Mật khẩu vừa nhập">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="togglePassword('confirmPassword')">
                                <span class="far fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-inline ml-3">
                    <label class="custom-control overflow-checkbox">
                        <input type="checkbox" class="overflow-control-input" id="customCheckLogin">
                        <span class="overflow-control-indicator"></span>
                        <span class="ml-1">Đồng ý với
                            <a href="#"> điều khoản</a>
                        </span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary bt_auth btn-block mt-4">Tạo tài khoản</button>
            </form>

            <div class="pt-3 bordert">
                <div class="text-center">
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
        function validateForm(event) {
            event.preventDefault();

            let valid = true;

            let name = document.getElementById("name");
            let email = document.getElementById("email");
            let phone = document.getElementById("phone");
            let password = document.getElementById("password");
            let confirmPassword = document.getElementById("confirmPassword");
            let checkbox = document.getElementById("customCheckLogin");

            resetValidation(name);
            resetValidation(email);
            resetValidation(phone);
            resetValidation(password);
            resetValidation(confirmPassword);

            if (name.value.trim() === "") {
                showError(name);
                valid = false;
            }

            if (email.value.trim() === "" || !validateEmail(email.value)) {
                showError(email);
                valid = false;
            }

            if (phone.value.trim() === "") {
                showError(phone);
                valid = false;
            }

            if (password.value.length < 6) {
                showError(password);
                valid = false;
            }

            if (confirmPassword.value !== password.value) {
                showError(confirmPassword);
                valid = false;
            }

            if (!checkbox.checked) {
                checkbox.nextElementSibling.style.border = "2px solid #dc3545";
                valid = false;
            } else {
                checkbox.nextElementSibling.style.border = "2px solid #fbd652";
            }

            if (valid) {
                document.getElementById("registerForm").submit();
            }
        }

        function showError(input) {
            input.classList.add("is-invalid");
        }

        function resetValidation(input) {
            input.classList.remove("is-invalid");
        }

        function validateEmail(email) {
            let re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return re.test(email);
        }

        // Ẩn / Hiện mật khẩu với icon
        function togglePassword(fieldId) {
        let input = document.getElementById(fieldId);
        let button = input.nextElementSibling.querySelector("span");

        if (input.type === "password") {
            input.type = "text";
            button.classList.remove("fa-eye-slash");
            button.classList.add("fa-eye");
        } else {
            input.type = "password";
            button.classList.remove("fa-eye");
            button.classList.add("fa-eye-slash");
        }
    }
    </script>
@endsection
