@extends('admin.layout.main')

@section('content')
    <!-- Body: Body -->
            <div class="w-100 p-3 p-md-5 card border-0" >
                <!-- Form -->
                <form class="row g-1 p-3 p-md-4" method="POST">
                    @csrf
                    <div class="col-12 text-center mb-1 mb-lg-5">
                        <h1 style="font-size: 1.8em; color: #484c7f; border: 12px">{{ $title }}</h1>
                        <span>Truy cập miễn phí vào bảng điều khiển của chúng tôi.</span>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Tên</label>
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Nhâp họ và tên">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Địa chỉ email </label>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Nhập địa chỉ Email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and Conditions</a>
                            </label>
                        </div>
                    </div> --}}
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase"> Thêm tài khoản</button>
                    </div>
                    {{-- <div class="col-12 text-center mt-4">
                        <span class="text-muted">Already have an account? <a href="auth-signin.html" title="Sign in" class="text-secondary">Sign in here</a></span>
                    </div> --}}
                </form>
                <!-- End Form -->
            </div>
        
   

@endsection

