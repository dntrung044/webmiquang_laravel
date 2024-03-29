<?php

namespace App\Http\Controllers\User;

use App\Http\Services\Product\UserService;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class ProductController1 extends Controller
{
    protected $productService;

    public function __construct(UserService $productService)
    {
        $this->productService = $productService;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                        ->where('active', 1)
                        ->whereIn('id', $productId)
                        ->get();
    }
    // Danh sách sp
    public function index(Request $request)
    {
        $categories = ProductCategory::where('active', 1)->get();
        $products = Product::where('active', 1)->paginate(8);
        $title = 'Thực đơn - Mì Quảng Bà Mua';
        $cartproducts = $this->getProduct();
        $carts = Session::get('carts');

        return view('User.products.list', compact('products', 'categories', 'title', 'cartproducts', 'carts'));
    }

    // Danh sách danh mục sp
    public function category($categoryName, Request $request)
    {
        $categories = ProductCategory::all();

        $categories = ProductCategory::where('active', 1)->get();


        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery();

        return view('User.products.list', compact('products', 'categories'));
    }

    // Chi tiết sp
    public function details($id = '', $slug = '')
    {
        $product = $this->productService->showdetail($id);
        // $productsMore = $this->productService->more($id);
        $cmts = $this->productService->showRating();
        $productcmt = ProductComment::where('product_id', '=', $id)->get();

        return view('User.products.details', [
            'title' => $product->name,
            'product' => $product,
            // 'products' => $productsMore,
            'repproduct' => $this->productService->relatedProduct($id),
            'cmts' => $cmts,
            'productcmt' => $productcmt
        ]);
    }
    //Gửi Bình luận
    public function postComment(Request $request, $id)
    {
       $result = $this->productService->insertComment($request, $id);
       if ($result) {
            return redirect()->route('menus.index');
            alert('Đánh giá thành công','Quản trị sẽ phê duyệt bình luận của bạn trong thời gian sớm nhất!', 'success');
       } else {
            return redirect()->back()->with('success', 'Đăng bình luận sản phẩm thành công!');
       }
    }

    public function add_to_cart(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'product_id' => 'required',
        ], [
            'product_id.required' => 'Món ăn này không tồn tại'
        ]);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        } else {
            $qty = +1;
            $product_id = $request->product_id;

            $carts = Session::get('carts');
            if (is_null($carts)) {
                Session::put('carts', [
                    $product_id => $qty
                ]);
            }

            $exists = Arr::exists($carts, $product_id);
            if ($exists) {
                $carts[$product_id] = $carts[$product_id] + $qty;
                Session::put('carts', $carts);
            }
            $carts[$product_id] = $qty;
            Session::put('carts', $carts);

            $cartproducts = $this->getProduct();

            $cart_component = view('user.products.compoments.cart', compact('cartproducts', 'carts'))->render();

            return response()->json([
                'success' => 'Thêm món ăn thành công!',
                'carts' => $carts,
                'cart_component' => $cart_component,
                'code' => 200
            ]);
        }

        return response()->json(['error' => $validation->errors()->first()]);
    }
}
