<?php


namespace App\Http\Services\Product;


use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductService
{
    // List đồ uống
    public function showlist()
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->paginate(12);
    }
    public function showRating()
    {
        $id = ProductComment::select('id');
        return ProductComment::whereIn('product_id', $id)->get();
    }
    // Chi tiết đồ uống
    public function showdetail($id)
    {
        return Product::where('id', $id)
                    ->where('active', 1)
                    ->with('productCategory')
                    ->firstOrFail();
    }
    // List Đồ uống liên quan
    public function relatedProduct($id)
    {
        $product = Product::where('id', $id)
                    ->where('active', 1)
                    ->with('productCategory')
                    ->firstOrFail();
        return Product::where('cat_id', $product->cat_id)->limit(4)->whereNotIn('id', [$id])->get();
    }

    public function minprice() {
        return Product::min('price_sale');
    }
    // menu cat
    public function cat1Product() {
        $product = 7; //29
        return Product::where('cat_id', $product)->limit(4)->get();
    }
    public function cat2Product() {
        // $product = Product::where('id', $id)
        // ->where('active', 1)
        // ->with('productCategory')
        // ->firstOrFail();
        $product = 5;
        return Product::where('cat_id', $product)->limit(4)->get();
    }

    public function insertComment($request, $id)
    {
        try {
            $request->except('_token');
            ProductComment::create([
                'product_id' => $id,
                'user_id' => Auth::id(),
                'content' => $request->input('content'),
                'rating' => $request->input('rating'),
                'active' => 1,
            ]);
            $product = Product::find($id);
            $product->total_number +=  $request->rating;
            $product->total_rating +=  1;
            $product->save();

            Session::flash('success', 'Thêm bình luận mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm bình luận Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function cat1() {
        // $product = Product::where('id', $id)
        // ->where('active', 1)
        // ->with('productCategory')
        // ->firstOrFail();
        $product = 5;
        return Product::where('cat_id', $product)->limit(4)->get();
    }

    // tận nơi
    public function cat2() {
        $product = 7; //29
        return Product::where('cat_id', $product)->limit(4)->get();
    }
    public function cat3() {
        $product = 8; //29
        return Product::where('cat_id', $product)->limit(4)->get();
    }
}
