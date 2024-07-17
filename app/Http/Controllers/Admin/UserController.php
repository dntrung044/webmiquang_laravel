<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Services\User\UserService;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userSevice;

    public function __construct(UserService $userSevice)
    {
        $this->userSevice = $userSevice;
    }

    public function index()
    {
        $roles = Role::all();
        // $rolesOfUser = $user->roles;
        return view('admin.user.list', [
            'title' => 'Danh Sách người dùng',
            'users' => $this->userSevice->get(),
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, $id)
    {
        $result = $this->userSevice->update($request, $id);

        if ($result) {
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhập người dùng thành công!',
                Session::flash('success', 'Cập nhật thành công')
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Không tìm thấy người dùng!',
                Session::flash('error', 'Cập nhật thành công')
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            User::where('id', $user)->delete();
            $user->delete();

            return response()->json([
                'status' => 200,
                Session::flash('success', 'Xóa người dùng thành công!')
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Không tìm thấy người dùng!',
                Session::flash('error', 'Cập nhật thành công')
            ]);
        }
    }

    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
