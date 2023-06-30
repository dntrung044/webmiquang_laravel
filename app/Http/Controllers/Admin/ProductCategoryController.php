<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\ProductCategoryRequest;
use App\Http\Services\ProductCategory\ProductCategoryService;
use App\Models\ProductCategory;
use Illuminate\Http\Request;



class ProductCategoryController extends Controller
{
    protected $productcategoryService;

    public function __construct(ProductCategoryService $productcategoryService)
    {
        $this->productcategoryService= $productcategoryService;
    }

    public function index()
    {
        return view('admin.productCategory.list', [
            'title' => 'Danh Sách Loại Món Ăn',
            'productcategories' => $this->productcategoryService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.productCategory.add', [
            'title' => 'Thêm Danh Mục Mới'
        ]);
    }

    public function store(ProductCategoryRequest $request)
    {
        $this->productcategoryService->create($request);

        return redirect('/admin/productcategories/list');
    }

    public function show(ProductCategory $productcategory)
    {
        return view('admin.productCategory.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $productcategory->name,
            'productcategory' => $productcategory
        ]);
    }

    public function update(ProductCategory $productcategory, ProductCategoryRequest $request)
    {
        $result = $this->productcategoryService->update($request, $productcategory);
        if ($result) {
            return redirect('/admin/productcategories/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->productcategoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
