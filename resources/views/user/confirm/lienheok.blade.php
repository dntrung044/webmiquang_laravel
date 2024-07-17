@extends('user.layout/main')
@section('content')
    <main>
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_booking_2">
                        <div class="head">
                            <div class="title">
                                <h3>Mì Quảng Bà Mua</h3>
                                470 Trần Đại Nghĩa, Khu Đô Thị Đại Học, Quận Ngũ Hành Sơn, Tp Đà Nẵng. <br> - <a
                                    href="https://www.google.com/maps/place/Vietnam+-+Korea+University+of+Information+and+Communication+Technology./@15.9750157,108.2510487,17z/data=!3m1!4b1!4m5!3m4!1s0x3142108997dc971f:0x1295cb3d313469c9!8m2!3d15.9750106!4d108.2532374"
                                    target="blank">Nhận chỉ đường</a>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div id="confirm">
                                <div class="icon icon--order-success svg add_bottom_15">
                                    <center>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                                <circle cx="36" cy="36" r="35"
                                                    style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;">
                                                </circle>
                                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                                    style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                            </g>
                                        </svg>
                                    </center>

                                </div>
                                <h3>{{ $noti }}!</h3>
                                <p>Quay lại -<a href="/">Trang chủ</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
