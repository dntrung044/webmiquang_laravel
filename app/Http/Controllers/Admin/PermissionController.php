<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index', [
            'title' => 'Danh Sách Các Quyền',
            'permissions'    => Permission::orderByDesc('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            $permission = new Permission;
            $permission->name = $request->input('name');
            $permission->description = $request->input('description');
            $permission->key_code = $request->name;
            $permission->save();
            return response()->json([
                'status' => 200,
                'message' => 'Thêm quyền thành công.',
                'data' => $permission
            ]);
        }
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            return response()->json([
                'status' => 200,
                'data' => $permission,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy quyền này.'
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
            $permission = Permission::find($id);
            if ($permission) {
                $permission->description = $request->input('description');
                $permission->name = $request->input('name');
                $permission->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Đã cập nhật quyền thành công.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Không tìm thấy quyền.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        if ($permission) {
            $permission->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Quyền đã được xóa thành công.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy quyền.'
            ]);
        }
    }
}
