@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@extends('User.layout.main')
@section('content')
    <main class="pattern_2" style="transform: none;">
        <div class="container margin_60_40" style="transform: none;">
            <div class="row justify-content-center" style="transform: none;">
                <div class="col-xl-6 col-lg-8">
                    <div class="box_booking_2 style_2">
                        <div class="head">
                            <div class="title">
                                <h3>Thông tin cá nhân</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <form action="" method="POST">
                            @csrf
                            <div class="main">
                                <div class="form-group">
                                    <label>Họ và Tên</label>
                                    <input class="form-control" name="name" value="{{ Auth::user()->name }}"
                                        placeholder="Nhập họ và tên cần sửa">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Địa chỉ Email</label>
                                            <input class="form-control" name="email" value="{{ Auth::user()->email }}"
                                                placeholder="Sửa địa chỉ Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                                placeholder="Sửa số điện thoại">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{-- <label>Địa chỉ:</label> --}}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Quận/Huyện</label>
                                                <select style="background: #ebebeb;" class="form-select choose district"
                                                    name="district" id="district">
                                                    @if (!empty(Auth::user()->district))
                                                        <option value="{{ Auth::user()->district }}">
                                                            {{ Auth::user()->district }}
                                                        </option>
                                                        @foreach ($districts as $d)
                                                        <option value="{{ $d->name }}">
                                                            {{ $d->name }}
                                                        </option>
                                                    @endforeach
                                                    @else
                                                        <option value="">Chọn quận/huyện</option>
                                                        @foreach ($districts as $d)
                                                            <option value="{{ $d->name }}">
                                                                {{ $d->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 ml-20">
                                            <div class="form-group">
                                                <label>Xã/Phường</label>
                                                <select style="background: #ebebeb;" class="form-select ward calculate_ship"
                                                    name="ward" id="ward">
                                                    @if (!empty(Auth::user()->ward))
                                                        <option value="{{ Auth::user()->ward }}">
                                                            {{ Auth::user()->ward }}
                                                        </option>
                                                    @else
                                                        <option value="">Chọn phường/xã</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Đường, số nhà:</label>
                                        <input class="form-control" name="street" value="{{ Auth::user()->street }}">
                                    </div>
                                </div>

                                @if (Auth::user()->fee == 0)
                                    <input type="hidden" id="fee"  name="fee" value="15000">
                                @else
                                    <input type="hidden" name="fee" id="fee" value="{{ Auth::user()->fee }}">
                                @endif

                                <button type="submit" class="btn_1 full-width mb_5">Chỉnh sửa</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- /container -->
    </main>
    @include('sweetalert::alert')

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var district_name = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'district') {
                    result = 'ward'
                }

                $.ajax({
                    url: '{{ url('/tai-khoan/load_address') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        district_name: district_name,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });


            $('.calculate_ship').on('change', function() {
                var district = $('.district').val();
                var ward = $('.ward').val();

                $.ajax({
                    url: '{{ url('/tai-khoan/calculate_ship') }}',
                    method: 'POST',
                    data: {
                        district: district,
                        ward: ward,
                    },
                    success: function(response) {
                        if (response.status == 400) {
                            $('#fee').html("");
                            $('#fee').val(response.nodata);
                        } else {
                            $('#fee').html("");
                            $('#fee').val(response.fee);
                        }
                    }
                });

            });
        });
    </script>
@endsection
