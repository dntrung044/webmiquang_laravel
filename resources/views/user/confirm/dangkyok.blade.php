
@extends('user.layout/main')
@section('content')
<main>
    <div class="pattern_2">
    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <br> <br> <br>
                <div class="box_booking_2">
                    <div class="head">
                        <div class="title">
                            <h3>{{ $title }}</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <div id="confirm">
                            <div class="icon icon--order-success svg add_bottom_15">
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                        <g fill="none" stroke="#8EC343" stroke-width="2">
                                            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                        </g>
                                    </svg>
                                </center>
                            </div>
                            <h4>Để kích hoạt tài khoản, vui lòng nhấp vào liên kết kích hoạt đã được gửi đến email của bạn.</h4>
                            <p>Nếu email không xuất hiện trong "<em style="font-weight: bold; font-style: normal; color: black">Hộp thư đến</em>", hãy kiểm tra ở mục "<em style="font-weight: bold; font-style: normal; color: black">Thư rác</em>" của bạn.</p>
                           @include('user.layout.alert')
                            <center>
                                <p style="background-color: #1a82e2; border-radius: 6px; padding: 12px; width: 40%;">
                                    <a href="{{ route('register.sendEmailVerify', ['email'=>session()->get('email')]) }}" style="color: white; text-decoration: none;">
                                        Gửi lại thư xác thực
                                    </a>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- /box_booking -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /pattern_2 -->
</div>

</main>
<!-- /main -->
@endsection
