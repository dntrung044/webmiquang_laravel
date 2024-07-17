<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Role\RoleService;
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
            'title' => 'Danh Vai Trò Quản Lý',
            'roles' => $this->roleService->get(),
            'permissions' => $this->roleService->getPermission(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'permission_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            // $role = ProductCategory::create([
            //     'name' => (string)$request->input('name'),
            //     'active' => (string)$request->input('active')
            // ]);

            $role = new Role;
            $role->name = $request->input('name');
            $role->description = $request->input('description');
            $role->save();


            $permission_id = $request->input('permission_id');
            $role->permissions()->attach($permission_id);

            return response()->json([
                'status' => 200,
                'message' => 'Vai trò đã được tạo thành công',
                'data' => $role
            ]);
        }
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = $role->permissions;

        if ($role) {
            return response()->json([
                'status' => 200,
                'data' => $role,
                'permissions' => $permissions,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy vai trò này.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            $role = Role::find($id);
            if ($role) {
                $role->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]);

                $role->permissions()->sync($request->permission_id);

                return response()->json([
                    'status' => 200,
                    'message' => 'Cập nhật thông tin thành công'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Không tìm thấy vai trò.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->permissions()->detach();
            $role->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Vai trò đã được xóa thành công.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm mã vai trò.'
            ]);
        }
    }
}
