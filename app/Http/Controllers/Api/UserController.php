<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $requset){
        // dd($requset->all());die();
        $user = User::where('email', $requset->email)->first();

        if($user){

            $user->update([
                'fcm' => $requset->fcm
            ]);

            if(password_verify($requset->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Chào mừng '.$user->name,
                    'user' => $user
                ]);
            }
            return $this->error('Mật khẩu không chính xác');
        }
        return $this->error('Email chưa đăng ký');
    }

    public function register(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = User::create(array_merge($requset->all(), [
            'password' => bcrypt($requset->password)
        ]));

        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Chào mừng bạn đăng ký thành công',
                'user' => $user
            ]);
        }

        return $this->error('Đăng ký thất bại');

    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
