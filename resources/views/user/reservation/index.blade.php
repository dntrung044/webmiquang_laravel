@extends('user.layout.main')
@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/bg_datban.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1>
                            <p>
                                Quý khách nên đặt chỗ trước 4 giờ để được phục vụ tốt nhất
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <div class="pattern_2">
            <div class="container margin_120_100 pb-0">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center d-none d-lg-block" data-cue="slideInUp">
                        <br><br><br><br><br>
                        <img src="teamplate/img/datban1.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-md-8" data-cue="slideInUp">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Đặt bàn</h2>
                            @foreach ($aboutus as $abu)
                                <p>hoặc gọi điện cho chúng tôi theo số {{ $abu->phone }}</p>
                            @endforeach
                        </div>
                        <div id="wizard_container">
                            <form action="" method="POST" id="frmtuvan">
                                @csrf
                                <input id="website" name="website" type="text" value="">
                                <div id="middle-wizard">
                                    <div class="step">
                                        <h3 class="main_question"><strong>1/3: </strong>Vui lòng chọn ngày đến</h3>
                                        <div class="form-group">
                                            <input type="hidden" name="date" id="datepicker_field" class="required">
                                        </div>
                                        <div id="DatePicker"></div>
                                    </div>
                                    <!-- /step 1-->
                                    <div class="step">
                                        <h3 class="main_question"><strong>2/3: </strong>Vui lòng chọn thời gian và sô người
                                            đến</h3>
                                        <div class="step_wrapper">
                                            <h4>Thời gian</h4>
                                            <div class="radio_select add_bottom_15">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="time_1" name="time" value="10.00"
                                                            class="required">
                                                        <label for="time_1">10.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_2" name="time" value="10.30"
                                                            class="required">
                                                        <label for="time_2">10.30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_3" name="time" value="11.00"
                                                            class="required">
                                                        <label for="time_3">11.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_4" name="time" value="11.30"
                                                            class="required">
                                                        <label for="time_4">11.30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_5" name="time" value="18.00"
                                                            class="required">
                                                        <label for="time_5">18.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_6" name="time" value="18.30"
                                                            class="required">
                                                        <label for="time_6">18.30</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_7" name="time" value="19.00"
                                                            class="required">
                                                        <label for="time_7">19.00</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="time_8" name="time" value="20.00"
                                                            class="required">
                                                        <label for="time_8">20.00</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="step_wrapper">
                                            <h4>Bao nhiêu người</h4>
                                            <div class="radio_select">
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="people_1" name="people" value="1"
                                                            class="required">
                                                        <label for="people_1">1</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_2" name="people" value="2"
                                                            class="required">
                                                        <label for="people_2">2</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_3" name="people"
                                                            value="3" class="required">
                                                        <label for="people_3">3</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="people_4" name="people"
                                                            value="4" class="required">
                                                        <label for="people_4">4</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /step 2-->
                                    <div class="submit step">
                                        <h3 class="main_question"><strong>3/3: </strong> Vui lòng điền thông tin chi tiết
                                            của bạn</h3>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                class="form-control required" placeholder="Họ và Tên">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" name="email"
                                                        value="{{ Auth::user()->email }}" class="form-control required"
                                                        placeholder="Email của bạn">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="phone"
                                                        value="{{ Auth::user()->phone }}" id="txtphone"
                                                        class="form-control required" placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="content" placeholder="Thông tin bổ sung thêm."></textarea>
                                        </div>
                                        <div class="form-group terms">
                                            <label class="container_check">Vui lòng chấp nhận <a href="#"
                                                    data-toggle="modal" data-target="#terms-txt">điều kiện của chúng
                                                    tôi</a>
                                                <input type="checkbox" name="terms" value="Yes" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="bottom-wizard">
                                    <button type="button" name="backward" class="backward">Trước đó</button>
                                    <button type="button" name="forward" class="forward">Tiếp theo</button>
                                    <button type="submit" class="submit" id="gui">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="teamplate/js/wizard/wizard_scripts.min.js"></script>
    <script src="teamplate/js/wizard/wizard_func.js"></script>
@endsection
