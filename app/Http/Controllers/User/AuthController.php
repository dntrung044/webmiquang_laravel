<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // protected $redirectTo = RouteServiceProvider::HOME;

    // public function __construct() {
    //     $this->middleware('guest')->except('logout');
    // }

    //Register
    public function register() {
        return view('user.auth.register',[
            'title' => 'Đăng ký tài khoản - Mì Quảng Bà Mua',
        ]);
    }

    public function registerHandle(Request $request)
     {
        $this->validate($request, [
            'name'=>'required|min:3|max:200',
            'email' => 'required|max:200|email:filter|unique:users,email',
            'phone' => 'required',
            'password'=>'required|min:6|max:200'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->active = 0;
        $user->level = 0;
        $user->remember_token = strtoupper(Str::random(15));
        $user->save();
        if ($user->id) {
            Mail::send('user.mail.confirmRegistration', compact('user'),
            function ($message) use ($user) {
                $message->from('Trung@fake.com', 'Trung Admin');
                $message->to($user->email, $user->name);
                $message->subject('Xác nhận tài khoản - Website Nhà Hàng Mì Quảng');
            });
            return redirect()->route('register.success')
            // ->with('message', 'Bạn đã đăng ký thành công. Vui lòng xác thực Email để được kích hoạt.')
            ->with('email', $user->email);
        }

        return redirect()->back()->with('error', 'Đăng ký tài khoản thất bại.');
    }

    public function registerVerify(User $id, $token)
    {
        if ($id->remember_token === $token) {
            $id->active = 1;
            $id->remember_token = null;
            $id->save();

            return redirect()->route('login')->with('success', 'Bạn đã xác thực tài khoản thành công!');
        } else {
           return redirect()->route('login')->with('error', 'Mã xác nhận không hợp lệ hoặc đã cũ!!');
        }
    }

    public function sendEmailVerify($email = '') {
        if ($email != null) {
            $user = User::where('email', $email)->first();
            Mail::send('user.mail.confirmRegistration', compact('user'),
                function ($message) use ($user) {
                    $message->from('Trung@fake.com', 'Trung Admin');
                    $message->to($user->email, $user->name);
                    $message->subject('Xác nhận tài khoản - Website Nhà Hàng Mì Quảng');
                }
            );

            return redirect()->back()
            ->with('email', $email)
            ->with('title', 'Đã gửi lại thư kích hoạt tài khoản.');
        }
        return redirect()->route('register');

    }

    public function registrationSuccess() {
        $title = session('notificution');
        $title = 'Đăng ký thành công';
        if(session()->get('email')) {
            return view('user.confirm.dangkyok', compact('title'));
        }

        return redirect()->route('login');
    }
    //Forgot password
    public function forgotPassword() {
        return view('user.auth.forgotPassword',[
            'title' => 'Quên mật khẩu - Mì Quảng Bà Mua',
        ]);
    }
    public function forgotPasswordHandle(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter|exists:users',
        ], [
            'email.required' => 'Vui lòng nhập Email',
            'email.exists' => 'Email không tồn tại',
        ]);

        $token = strtoupper(Str::random(15));
        $user = User::where('email', $request->email)->first();
        $user->update([
            'remember_token'=>$token,
        ]);

        Mail::send('user.mail.forgotPassword', compact('user'),
            function ($message) use ($user) {
                $message->subject('Khôi phục mật khẩu - Web Nhà Hàng Mì Quảng');
                $message->from('Trung@fake.com', 'Trung');
                $message->to($user->email, $user->name);
            }
        );
        return redirect()->back()->with('success', 'Vui lòng check mail để thay đổi mật khẩu!');
    }

     //Change password
    public function changePassword(User $id, $token)
    {
        if ($id->remember_token === $token) {
            return view('user.auth.changePassword',[
                'title' => 'Thay đổi mật khẩu - Mì Quảng Bà Mua',
            ]);
        }
        return abort(404);
    }
    public function changetPasswordHandle(User $id, $token, Request $request) {
        $this->validate($request, [
            'password' => 'required',
            'confirm_password'=>'required|same:password'
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp',
        ]);

        $password = bcrypt($request->password);
        if ($id->remember_token === $token) {
            $id->update([
                'remember_token' => null,
                'password' => $password,
            ]);
            redirect()->route('login')->with('success', 'Bạn đã thay đổi mật khẩu tài khoản thành công!');
        }
    }

    // Login
    public function login() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('user.auth.login',[
            'title' => 'Đăng nhập - Mì Quảng Bà Mua',
        ]);
    }
    public function loginHandle(Request $request) {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ], $request->input('remember'))) {
            if (Auth::user()->level==1) {
                return redirect('admin')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->intended('/')->with('success', 'Đăng nhập với vài trò thành công');
            }
        } elseif(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 0
        ])) {
            Auth::logout();
            return redirect()->back()->with('error', 'Tài khoản của bạn chưa được kích hoạt hoặc đã bị khóa.');
        }

        Session::flash('error', 'Email hoặc mật khẩu không hợp lệ!');
        return redirect()->back();
    }

    public function loginAjaxHandle(Request $request) {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email:filter|exists:users',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        }
        else {
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'active' => 1
            ])) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Chào mừng '. Auth::user()->name,
                    'user' => Auth::user()
                ]);
            } elseif(Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'active' => 0
            ])) {
                Auth::logout();
                return response()->json([
                    'error' => 0,
                    'message' => 'Tài khoản của bạn đã bạn khóa hoặc chưa kích hoạt'
                ]);
            }
        }

        return response()->json(['error' => $validation->errors()->first()]);

    }

    // Login with
    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->intended('/');
    }
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);


        if (Auth::user()->level==1) {
            return redirect('admin')->with('success', 'Đăng nhập thành công với quản trị');
        } else {
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công');
        }

        // Return home after login
        // return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->facebook_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Đăng xuất thành công!');
    }
}
