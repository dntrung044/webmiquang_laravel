<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserControllers extends Controller
{

    // use AuthenticatesUsers;

    protected $userSevice;
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(UserService $userSevice)
    {
        $this->userSevice = $userSevice;

        $this->middleware('guest')->except('logout');
    }

    //List user
    public function index()
    {
        return view('admin.user.list', [
            'title' => 'Danh Sách người dùng',
            'users' => $this->userSevice->get()
        ]);
    }


    //delete user
    public function destroy(Request $request)
    {
        $result = $this->userSevice->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa người dùng thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    // Đăng xuất
    public function LogOut() {
        Auth::logout();
        return redirect()->route('login');
    }

}
