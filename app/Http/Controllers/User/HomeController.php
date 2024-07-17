<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{

    public function index()
    {
        $slider = Slider::where('active', 1)->orderBy('sort_by')->get();
        $menu = Menu::select('name', 'link', 'thumb', 'description')->orderbyDesc('id')->get();
        $posts = Post::where('active', 1)->OrderBy('id', 'desc')->limit('3')->get();
        $abouthome = Aboutus::select('thumb', 'linkYT', 'description')->firstOrFail();
        $minprice = Product::min('price_sale');
        $cat1Product = Product::where('cat_id', 7)->limit(4)->get();
        $cat2Product = Product::where('cat_id', 5)->limit(4)->get();
        return view('User.index', [
            'title' => 'Trang chủ - Mì Quảng Bà Mua',
            'sliders' => $slider,
            'menus' => $menu,
            'posts' => $posts,
            'about' => $abouthome,
            'product' => $minprice,
            'productcat1' => $cat1Product,
            'productcat2' => $cat2Product,
        ]);
    }

    public function latest_product(Request $request)
    {
        $data = $request->all();
        $product_number = 4;
        if ($data['id'] > 0) {
            $list_product = Product::where('id', '<', $data['id'])->orderby('id', 'DESC')->take($product_number)->get();
        } else {
            $list_product = Product::orderby('id', 'DESC')->take($product_number)->get();
        }
        // '.url('thuc-don/'. $product->id. '-' .Str::slug($product->name, '-') ).'
        $output_latest_product = '';
        if (!$list_product->isEmpty()) {
            foreach ($list_product as $key => $product) {
                $age = 0;
                $star_vote = 0;
                $output_icon_star = '';
                if ($product->total_rating) {
                    $age = round($product->total_number / $product->total_rating, 2);
                    for ($i = 0; $i < 5; $i++) {
                        $output_icon_star .=
                            '<i class="icon_star ' . $age <= $i ? 'voted' : '' . '  "></i>';
                    }
                }
                $last_id = $product->id;
                $output_latest_product .=
                    '<div class="col-6 col-md-4 col-xl-3"">
                        <div class="grid_item">
                            <figure>
                                <a href="">
                                    <img class="img-fluid lazy" src="' . $product->thumb . '"
                                        data-src="' . $product->thumb . '" alt="loihinh">
                                    <div class="add_cart" style="right: 0;">
                                        <span class="btn_1">
                                            Thêm vô giỏ hàng
                                        </span>
                                    </div>
                                </a>
                            </figure>

                            <a href="">
                                <h3>' . $product->name . '</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">' . number_format($product->price, 0, '', '.') . 'đ</span>
                                <span class="old_price">' . number_format($product->price_sale, 0, '', '.') . 'đ</span>
                            </div>
                        </div>
                    </div> ';
            }
            $output_latest_product .= '
            <div class="col" id="col_load_more">
                <p class="text-center" style="margin: 0;" id ="load_more">
                    <button class="btn_1 outline" data-id="' . $last_id . '" id="load_more_button">
                        Xem thêm
                    </button>
                </p>
            <div>';
        } else {
            $output_latest_product .= '
            <div id ="load_more">
                Đây là món ăn cuối cùng trong thực đơn!!!
            </div>';
        }

        echo $output_latest_product;
    }
}
