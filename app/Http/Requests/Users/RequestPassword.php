<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
{
    public function rules()
    {
        return [
            'password_old' => 'required',
            'password' => 'required',
            'password_comfirm' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password_old.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password_comfirm.required' => 'Vui lòng nhập lại mật khẩu mới',
            'required|same'=> 'Mật khẩu xác thực không đúng'
        ];
    }
}
