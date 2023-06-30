<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;  

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
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
        $title = 'Thực đơn - Mì Quảng Bà Mua'; 
        $products = Product::where('active', 1)->paginate(8); 
        $categories = ProductCategory::where('active', 1)->get();
        $productsInCart = $this->getProduct();
        // dd($productsInCart);
        $carts = Session::get('carts'); 

        return view('User.products.list', compact('products', 'categories', 'title', 'productsInCart', 'carts'));
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

    public function add_to_cart($id)
    {       
        $carts = Session::get('carts'); 

        if (isset($carts[$id])) {
            $carts[$id] += 1;
        } else {
            $carts[$id] = 1;
        }  

        Session::put('carts', $carts);
        
        // echo "<pre>";
        // print_r(session::get('carts'));  
        $carts = Session::get('carts'); 
        $productsInCart = $this->getProduct();
        $cart_compoment = view('user.products.compoments.cart', compact('productsInCart', 'carts'))->render();
        
        return response()->json([
            'cart_compoment' => $cart_compoment,
            'message' => 'Đã thêm món ăn vào giỏ hàng!',
            'code' => 200,
        ], 200);
    } 
     
}