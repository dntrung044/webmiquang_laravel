@extends('user.layout.main')

@section('content')
<main>
    <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/bg_datban.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>{{$title}}</h1> 
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="frame white"></div>
    </div>
    <!-- /hero_single -->
    {{-- <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                @foreach ($aboutus as $about)
                    
                
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_tag_alt"></i>
                        <h2>Đặt bàn</h2> 
                        <a href="#0">+{{$about->phone}}</a> - <a href="#0">{{$about->email}}</a>
                        <small>- <a href="/dat-ban">Hoặc sử dụng biểu mẫu trực tuyến</a> -</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_pin_alt"></i>
                        <h2>Địa chỉ</h2>
                        <div style="text-align: inherit">{!!$about->address!!}</div>
                        <small>- <a href="https://goo.gl/maps/BfTgFK7VbA89HxPy7">Nhận chỉ đường</a> -</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_clock_alt"></i>
                        <h2>Giờ mở cửa</h2>
                        <div>{{$about->openH}}</div>
                        <small>- Mở cửa -</small>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div> --}}
    <!-- /bg_gray -->

    <div class="container margin_60_40">
        <h5 class="mb_5">Gửi thông tin liên hệ</h5>
        <div class="row">
            <div class="col-lg-4 col-md-6 add_bottom_25">
                <div id="message-contact"></div>
                <form method="post" action="">
                   @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Họ và Tên" name="name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email"  name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text"  name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="height: 150px;" name="content" placeholder="Nội dung liên hệ"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="Gửi">
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-6 add_bottom_25">
                <iframe class="map_contact" src="{{$about->map}}" allowfullscreen></iframe>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
</main>
<!-- /main -->

@endsection

@section('script')
<script src="teamplate/js/wizard/wizard_scripts.min.js"></script>
<script src="teamplate/js/wizard/wizard_func.js"></script>
@endsection

