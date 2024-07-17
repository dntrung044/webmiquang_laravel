@extends('user.layout.main')

@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/bg_datban.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame white"></div>
        </div>
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
                            <input class="form-control" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="phone" placeholder="Số điện thoại">
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
                    <iframe class="map_contact" src="{{ $about->map }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </main>
@endsection
