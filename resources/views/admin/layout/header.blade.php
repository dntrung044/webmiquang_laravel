<div class="header">
    <nav class="navbar py-4">
        <div class="container-xxl">
            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                <div class="d-flex">
                </div>

                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm ">Chào <span
                                class="font-weight-bold">{{ Auth::user()->name }}</span></p>
                        <small>
                            @if (Auth::user()->roles->isNotEmpty())
                                {{ Auth::user()->roles->pluck('name')->implode(', ') }}
                            @else
                                Không có vai trò
                            @endif
                        </small>
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail"
                            src="{{ !empty(Auth::user()->avatar) ? Auth::user()->avatar : '/teamplate/admin/assets/images/profile_av.png' }}"
                            alt="profile">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle"
                                        src="{{ !empty(Auth::user()->avatar) ? Auth::user()->avatar : '/teamplate/admin/assets/images/profile_av.png' }}"
                                        alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold"></span></p>
                                        <small class="">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>

                                <div>
                                    Phân quyền hệ thống
                                    <hr class="dropdown-divider border-dark">
                                </div>
                            </div>
                            <div class="list-group m-2 ">
                                @can('role-edit')
                                    <a href="{{ route('members') }}"
                                        class="list-group-item list-group-item-action border-0 ">
                                        <i class="icofont-ui-user-group fs-6 me-3"></i> Tài khoản người dùng
                                    </a>
                                    <a href="{{ route('role') }}" class="list-group-item list-group-item-action border-0 ">
                                        <i class="icofont-id fs-5 me-3"></i> Quản lý vai trò
                                    </a>

                                    <a href="{{ route('permissions') }}"
                                        class="list-group-item list-group-item-action border-0 ">
                                        <i class="icofont-ui-settings fs-5 me-3"></i> Quyền xử lý
                                    </a>
                                @endcan

                                <hr class="dropdown-divider border-dark">
                                <button type="button"
                                    class="list-group-item list-group-item-action border-0 btn_logout">
                                    <i class="icofont-logout fs-6 me-3 "></i> Đăng xuất
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>
            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                {{-- <form method="GET" action="/admin/search">
                    <div class="input-group flex-nowrap input-group-lg">
                        <button type="button" class="input-group-text">
                            <i class="fa fa-search"></i>
                        </button>

                        <input type="search" name="tukhoa" class="form-control" placeholder="Bạn cần quản lý mục nào?">

                        <button type="button" class="input-group-text add-member-top">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </form> --}}
            </div>
        </div>
    </nav>
</div>
