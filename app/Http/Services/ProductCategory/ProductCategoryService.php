<?php


namespace App\Http\Services\ProductCategory;


use App\Models\ProductCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductCategoryService
{
    public function show()
    {
        return ProductCategory::select('name', 'id')->orderbyDesc('id')->get();
    }

    public function getAll()
    {
        return ProductCategory::orderbyDesc('id')->paginate(5);
    }

    public function create($request)
    {
        try {
            ProductCategory::create([
                'name' => (string)$request->input('name'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $productcategory): bool
    {
        $productcategory->name = (string)$request->input('name');
        $productcategory->active = (string)$request->input('active');
        $productcategory->save();

        Session::flash('success', 'Cập nhật thành công Danh mục'); 
        return true; 
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $categorypost = ProductCategory::where('id', $id)->first();
        if ($categorypost) {
            return ProductCategory::where('id', $id)->delete();
        }

        return false;
    }
}
