<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.products.index', [
            'title' => 'Danh Sách Món Ăn',
            'products' => $this->productService->get(),
            'productcategories' => $this->productService->getCat()
        ]);
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return redirect('/admin/products/list');
    }

    public function show(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Chỉnh Sửa Món Ăn',
            'products' => $product,
            'productcategories' => $this->productService->getCat()
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/index');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công món ăn'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}
