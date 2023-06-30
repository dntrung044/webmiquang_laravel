<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Services\User\UserService;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    protected $userSevice;

    public function __construct(UserService $userSevice)
    {
        $this->userSevice = $userSevice;

        // $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('admin.user.list', [
            'title' => 'Danh Sách người dùng',
            'users' => $this->userSevice->get()
        ]);
    }


    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $roles = Role::All();
        $rolesOfUser = $user->roles;

        return view('admin.user.edit', [
            'title' => 'Chỉnh Sửa người dùng',
            'users' => $user,
            'roles' => $roles,
            'rolesOfUser' => $rolesOfUser,
        ]);
    }


    public function update(Request $request, $id)
    {
        $result = $this->userSevice->update($request, $id);

        if ($result) {
            return redirect()->route('members')->with('success', 'Cập nhập thành công!');
        }

        return redirect()->back()->with('error', 'Cập nhập không thành công!');

    }

    public function destroy(Request $request)
    {
        $result = $this->userSevice->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa người dùng thành công'
            ]);
        }

        return response()->json(['error' => true
        ]);
    }

    // Đăng xuất
    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
