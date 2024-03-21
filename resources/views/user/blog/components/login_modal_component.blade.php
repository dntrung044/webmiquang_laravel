<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="padding-top: 4.5em;display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="border-bottom-0">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="icon-cross"></span>
                    </button>
                </div>
                @include('admin.alert')
                <div class="text-center">
                    <h4>Đăng nhập</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <div class="flex flex-col space-y-5">
                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-base font-semibold text-gray-700">Nhập địa chỉ
                                    email</label>
                            </div>
                            <input id="email" type="email" autofocus="" placeholder="Email"
                                class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="text-base font-semibold text-gray-700">Nhập mật
                                    khẩu</label>
                                <a href="{{ route('forgotPassword') }}"
                                    class="text-sm text-blue-600 hover:underline focus:text-blue-800">Quên
                                    mật khẩu?</a>
                            </div>
                            <input id="password" type="password" placeholder="Mật khẩu"
                                class="px-4 py-2 transition duration-300 border border-yellow-400 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-yellow-200">
                        </div>
                        <small id="login-error" class="help-blog"></small>

                        <button type="button" data-url="{{ route('login.ajax') }}"
                            class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-yellow-500 rounded-md shadow hover:bg-yellow-600 focus:outline-none focus:ring-yellow-200 focus:ring-4 btn-login">
                            Đăng nhập
                        </button>

                        <div class="flex flex-col space-y-5">
                            <span class="flex items-center justify-center space-x-2">
                                <span class="h-px bg-gray-400 w-14"></span>
                                <span class="font-normal text-gray-500">Hoặc đăng nhập bằng</span>
                                <span class="h-px bg-gray-400 w-14"></span>
                            </span>
                            <div class="flex flex-col space-y-4">
                                <a href="{{ route('login.google') }}"
                                    class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-gray-800 rounded-md group hover:bg-gray-800 focus:outline-none">
                                    <span>
                                        <img src="/teamplate/img/Google__G__Logo.svg" alt="">
                                    </span>
                                    <span class="text-sm font-medium text-gray-800 group-hover:text-white">Google</span>
                                </a>
                                <a href="{{ route('login.facebook') }}"
                                    class="flex items-center justify-center px-4 py-2 space-x-2 transition-colors duration-300 border border-blue-500 rounded-md group hover:bg-blue-500 focus:outline-none">
                                    <span>
                                        <img src="/teamplate/img/icons8-facebook.svg" style="width: 30px"
                                            alt="">
                                    </span>
                                    <span
                                        class="text-sm font-medium text-blue-500 group-hover:text-white">Facebook</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
