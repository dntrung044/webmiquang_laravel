<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
 
    public function index()
    {
        return view('admin.permission.index', [
            'title' => 'Danh Sách Các Quyền',
            'permissions'    => Permission::where('parent_id', 0)->orderByDesc('id')->paginate(10),
            'permissioncats' => PermissionCategory::where('parent_id', '0')->get(),
        ]);
    }

    public function show_permissionCat()
    {
        return response()->json([
            'ListPermissionCats'=> PermissionCategory::orderByDesc('id')->get(),
        ]);
    }

    public function show_function()
    {
        return response()->json([
            'functions'=> PermissionCategory::where('parent_id', '0')->get(),
        ]);
    }

	public function store_permissionCat(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'description'=> 'required',
            'parent_id'=>'required',
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
            $permission_cat = new PermissionCategory;
            $permission_cat->name = $request->input('name');
            $permission_cat->description = $request->input('description');
            $permission_cat->parent_id = $request->input('parent_id');
            $permission_cat->save();

            return response()->json([
                'status'=>200,
                'message'=>'Thêm danh mục thành công.',
            ]);
        }
	}

	public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'functions'=>'required',
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
            $permission = new Permission;
            $permission->name = $request->input('name');
            $permission->description = $request->input('description');
            $permission->parent_id = 0;
            $permission->function = '';
            $permission->key_code =  $request->name . '_' . 'key';
            $permission->save();

            // //Tạo then con
            foreach($request->functions as $value) {
                Permission::create([
                    'name' => $request->description . '+' . $value,
                    'description' => $request->description,
                    'parent_id' =>  $permission->name,
                    'key_code' =>  $request->name . '_' . $value,
                    'function' =>  $value,
                ]);
            }

            return response()->json([
                'status'=>200,
                'message'=>'Thêm quyền thành công.',
                'data' => $permission
            ]);
        }
	}

    public function edit($id)
    {
        $permission = Permission::find($id);
        if($permission)
        {
            return response()->json([
                'status'=>200,
                'data'=> $permission,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Không tìm thấy quyền này.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description'=>'required',
            'key_code'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
        }
        else
        {
            $permission = Permission::find($id);
            if($permission)
            {
                $permission->description = $request->input('description');
                $permission->key_code = $request->input('key_code');
                $permission->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Đã cập nhật quyền thành công.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Không tìm thấy quyền.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        if($permission)
        {
            Permission::where('parent_id', $permission->name)->delete();
            $permission->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Quyền đã được xóa thành công.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Không tìm thấy quyền.'
            ]);
        }
    }

    public function load_function(Request $request)
    {
        $data = $request->all();
            $output ='';
            $data['action'] == "name" ;

            $select = PermissionCategory::where('parent_id', $data['parent_id'])->get();
            $output.='<label class="fancy-checkbox">';
            foreach ($select as $d){
                $output.='<input type="checkbox" class="functions" value="'.$d->name.'">
                    '.$d->name.'
                </label>';
            }

        echo  $output;
    }
}
