<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Blog\BlogService;
use App\Http\Services\Product\UserService;
use App\Http\Controllers\Controller;
use App\Http\Services\About\AboutService;
use App\Models\Product;

class HomeController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected $post;
    protected $about;

    public function __construct(
        SliderService $slider,
        MenuService $menu,
        UserService $product,
        BlogService $post,
        AboutService $about
    ) {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->post = $post;
        $this->about = $about;
    }

    public function index()
    {
        return view('User.index', [
            'title' => 'Trang chủ - Mì Quảng Bà Mua',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'posts' => $this->post->blognew(),
            'about' => $this->about->abouthome(),
            'product' => $this->product->minprice(),
            'productcat1' => $this->product->cat1Product(),
            'productcat2' => $this->product->cat2Product(),
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
                        '<i class="icon_star '. $age <= $i ? 'voted' : '' .'  "></i>';
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
