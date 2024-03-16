<?php


namespace App\Http\Services\Role;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class RoleService
{
    public function insert($request)
    {
        try {
            DB::beginTransaction();
            $request->except('_token');
            $role = Role::create($request->all());
            $role->permissions()->attach($request->permission_id);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
            return false;
        }

        return true;

    }

    public function get()
    {
        return Role::orderByDesc('id')->get();
    }
    public function getPermission()
    {
        return Permission::orderByDesc('id')->get();
    }

    public function update($request, $role)
    {
        try {
            $role->fill($request->input());
            $role->save();
            Session::flash('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật bài viết Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }


    public function destroy($request)
    {
        $role = Role::where('id', $request->input('id'))->first();
        if ($role) {
            $path = str_replace('storage', 'public', $role->image);
            Storage::delete($path);
            $role->delete();
            return true;
        }

        return false;
    }
}
