<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess()
    {
        $this->defineGateCategory();
    }

    public function defineGateCategory()
    {
        #admin index
        Gate::define('admin-access', function ($user) {
            return $user->level === 1;
        });
        // Gate('web', 'server');
        #Quản lý thông tin
        Gate::define('about-edit', function ($user) {
            return $user->checkPermissionAccess('abouts');
        });
          #Quản lý Menu
        Gate::define('menu-edit', function ($user) {
            return $user->checkPermissionAccess('menus');
        });
        #Quản lý Blog
        Gate::define('blog-edit', function ($user) {
            return $user->checkPermissionAccess('blogs');
        });
        #Quản lý đơn hàng
        Gate::define('order-edit', function ($user) {
            return $user->checkPermissionAccess('orders');
        });
        #Quản lý tài khoản
        Gate::define('user-edit', function ($user) {
            return $user->checkPermissionAccess('users');
        });
        #Quản lý Vai trò tài khoản
        Gate::define('role-edit', function ($user) {
            return $user->checkPermissionAccess('roles');
        });
    }

}
