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
        Gate::define('about-list', function ($user) {
            return $user->checkPermissionAccess('about_list');
        });
        Gate::define('about-edit', function ($user) {
            return $user->checkPermissionAccess('about_edit');
        });

        #Quản lý Blog
        Gate::define('blog-list', function ($user) {
            return $user->checkPermissionAccess('blog_list');
        });
        Gate::define('blog-add', function ($user) {
            return $user->checkPermissionAccess('blog_add');
        });
        Gate::define('blog-edit', function ($user) {
            return $user->checkPermissionAccess('blog_edit');
        });
        Gate::define('blog-delete', function ($user) {
            return $user->checkPermissionAccess('blog_delete');
        });


        #Quản lý tài khoản
        Gate::define('users-edit', function ($user) {
            return $user->checkPermissionAccess('user_edit');
        });
        #Quản lý Vai trò tài khoản
        Gate::define('roles-edit', function ($user) {
            return $user->checkPermissionAccess('role_edit');// nay trong database
        });

    }

}
