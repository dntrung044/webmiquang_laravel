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
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Quận/Huyện</label>
                                                <select class="form-select choose district" data-url="{{ route('account.load_address') }}"
                                                name="district" id="district">
                                                    @if (!empty(Auth::user()->district))
                                                        <option value="{{ Auth::user()->district }}">
                                                            {{ Auth::user()->district }}
                                                        </option>
                                                        @foreach ($districts as $d)
                                                            <option value="{{ $d->id }}">
                                                                {{ $d->name }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option value="">Chọn quận/huyện</option>

                                                        @foreach ($districts as $d)
                                                            <option value="{{ $d->id }}">
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
                                                <select class="form-select ward" name="ward" id="ward">
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
                                        <input type="text" class="form-control" name="street" value="{{ Auth::user()->street }}">
                                    </div>
                                </div>

                                @if (Auth::user()->fee == 0)
                                    <input type="hidden" id="fee" name="fee" value="15000">
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
            $('.choose').on('change', function() {
                var id = $(this).attr('id');
                var district_id = $(this).val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                var result = '';
                var url = $(this).data('url');

                if (id == 'district') {
                    result = 'ward'
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: _token,
                        action: id,
                        district_id: district_id,
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#' + result).html(data
                        .html); // Đặt HTML vào phần tử <select>
                    }
                });
            });

            $('.ward ').on('change', function() {
                var districtSelect = $('.district');
                var feeshipInput = $('input[name="fee"]');
                var selectedDistrict = districtSelect.val();
                updateFeeship(selectedDistrict, feeshipInput);
            });

            function updateFeeship(selectedDistrict, feeshipInput) {
                switch (selectedDistrict) {
                    case '2':
                        feeshipInput.val(25000);
                        break;
                    case '2':
                        feeshipInput.val(15000);
                        break;
                    case '3':
                        feeshipInput.val(10000);
                        break;
                    case '4':
                        feeshipInput.val(20000);
                        break;
                    case '5':
                        feeshipInput.val(30000);
                        break;
                    case '6':
                        feeshipInput.val(28000);
                        break;
                    case '7':
                        feeshipInput.val(45000);
                        break;
                    default:
                        feeshipInput.val('40000');
                        break;
                }
            }
        });
    </script>
@endsection
