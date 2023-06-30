<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Role\RoleService;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    protected $roleService;


    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return view('admin.role.index', [
            'title' => 'Danh Vai Trò Viết Mới Nhất',
            'roles' => $this->roleService->get(),
            'permissions' => $this->roleService->getPermission(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'permission_id'=>'required',
            'description'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                // 'errors'=>$validator->messages()
                'errors'=>$validator->errors()
            ]);
        }
        else
        {
        $this->roleService->insert($request);
        return redirect()->route('roles')->with('success', 'Them vai tro thanh cong');
        }
    }

    public function show($role)
    {
        $permissionsParent = Permission::where('parent_id', 0)->get();
        $role = Role::find($role);
        $permission = $role->permissions;
        return response()->json([
            'permissionsParent'=>$permissionsParent,
            'role'=>$role,
            'permission'=>$permission,
            'message'=>'Lấy thông tin thành công!'
        ],200);
        // $role = Role::find($id);
        // return response()->json(['data'=>$role,'name'=>'trung'],200); // 200 là mã lỗi
    }

    public function edit($id)
    {
        $permissions = Permission::where('parent_id', '0')->get();
        $role = Role::where('id', $id)->firstOrFail();
        $pemissionsChecked = $role->permissions;
        $title = 'Chỉnh sửa vai trò';
        return view('admin.role.edit', compact('permissions', 'role', 'pemissionsChecked', 'title'));
    }

    public function update(Request $request, $id)
    {

        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles')->with('success', 'Cập nhật thông tin thành công.');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if($role)
        {
            $role->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Vai trò đã được xóa thành công.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Không tìm mã vai trò.'
            ]);
        }
    }
}
