<?php


namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{
    public function getCat()
    {
        return ProductCategory::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {

            $product = new Product;

            $product->name =htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8');
            $product->description =htmlspecialchars($request->description, ENT_QUOTES, 'UTF-8');
            $product->content =htmlspecialchars($request->content, ENT_QUOTES, 'UTF-8');
            $product->cat_id =htmlspecialchars($request->cat_id, ENT_QUOTES, 'UTF-8');
            $product->price =htmlspecialchars($request->price, ENT_QUOTES, 'UTF-8');
            $product->price_sale =htmlspecialchars($request->price_sale, ENT_QUOTES, 'UTF-8');
            $product->active =htmlspecialchars($request->active, ENT_QUOTES, 'UTF-8');
            $product->thumb =htmlspecialchars($request->thumb, ENT_QUOTES, 'UTF-8');
            $product->save();

            // $request->except('_token');
            // Product::create($request->all());

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            // Session::flash('error', $err->getMessage());

            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Product::with('productcategory')
            ->orderByDesc('id')->paginate(8);
    }


    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            // \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
