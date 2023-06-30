@extends('User.layout.main')
@section('content')
<main class="pattern_2" style="transform: none;">

    <div class="container margin_60_40" style="transform: none;">
        <div class="row justify-content-center" style="transform: none;">
            <div class="col-xl-6 col-lg-8">
                <div class="box_booking_2 style_2">
                    <div class="head">
                        <div class="title">
                            <h3>Thay đổi mật khẩu</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <form action="" method="POST">
                        @csrf
                    <div class="main">

                        @include('User.layout.alert')
                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-base font-semibold text-gray-700">Mật khẩu hiện tại:</label>
                            </div>
                            <input name="password_old" style="background: none; color: black;" type="password" placeholder="*******"
                                class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200" />
                            {{-- @if ($errors->has('password'))
                                <span class="error-text">
                                    {{$errors->first('password_old')}}
                                </span>
                            @endif --}}
                            </div>

                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-base font-semibold text-gray-700">Mật khẩu mới:</label>
                            </div>
                            <input name="password" style="background: none; color: black;" type="password" placeholder="*******"
                                class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200" />
                                @if ($errors->has('password'))
                                    <span class="error-text">
                                        {{$errors->first('password')}}
                                    </span>
                                @endif
                        </div>
                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-base font-semibold text-gray-700">Nhập lại mật khẩu mới:</label>
                            </div>
                            <input name="password_comfirm" style="background: none; color: black;"  type="password" placeholder="*******"
                                class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200" />
                                @if ($errors->has('password_comfirm'))
                                    <span class="error-text">
                                        {{$errors->first('password')}}
                                    </span>
                                @endif
                        </div>

                        <button type="submit" class="btn_1 full-width mb_5">Thay đổi</button>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- /container -->
</main>
@include('sweetalert::alert')
@endsection
