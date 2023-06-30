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
        // Gate('web', 'server');
        #Quản lý thông tin nhà hàng
        Gate::define('about-list', function ($user) {
            return $user->checkPermissionAccess('about');
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
        Gate::define('user', function ($user) {
            return $user->checkPermissionAccess('user');
        });
        #Quản lý Vai trò tài khoản
        Gate::define('role', function ($user) {
            return $user->checkPermissionAccess('role');
        }); 
        #Quản lý quyền
        Gate::define('permission', function ($user) {
            return $user->checkPermissionAccess('permission');
        }); 
        #Quản lý đơn hàng
         Gate::define('transaction', function ($user) {
            return $user->checkPermissionAccess('transaction');
        }); 
    }

}
