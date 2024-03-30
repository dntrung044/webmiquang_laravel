<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

session_start();

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
            alert('Thêm món vào giỏ hàng bị lỗi!!!', 'error');
        }

        // if ($add_1 == 1) {
        //     alert()->html('Đã thêm vào giỏ hàng'," Tiếp mua chọn món hoặc tới <a href='/gio-hang'>giỏ hàng</a> để tiến hành thanh toán.",'success');
        //     return redirect()->back();
        // }
        // if ($add_1 != 1) {
        //     return redirect('/gio-hang');
        // }
             return redirect('/gio-hang');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('user.carts.index', [
            'title' => 'Giỏ Hàng - Mì Quảng Bà Mua',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function showcartAjax()
    {
        $products = $this->cartService->getProduct();

        return view('user.carts.showcartAjax', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }


    public function updatecart(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/gio-hang');
    }

    public function destroy($id = 0)
    {
        $this->cartService->remove($id);

        return redirect()->back();
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }

    public function check_coupon(Request $request)
    {
       $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
       $data =$request->all();
       $coupon = Coupon::where('code', $data['coupon'])->where('status', 1)->where('date_end', '>=', $today)->first();
       if($coupon) {
            $count_coupon = $coupon->count();
            if($count_coupon>0) {
                $count_session = Session::get('coupon');
                if($count_session==true ){
                    $is_available = 0;
                    if($is_available==0) {
                        $cou[] = array(
                            'code' => $coupon->code,
                            'condition' => $coupon->condition,
                            'number' => $coupon->number,
                        );

                        Session::put('coupon', $cou);
                    }

                } else {
                    $cou[] = array(
                        'code' => $coupon->code,
                        'condition' => $coupon->condition,
                        'number' => $coupon->number,
                    );

                    Session::put('coupon', $cou);
                }

                Session::save();
                alert()->success('Áp dụng mã giảm giá thành công!', 'Xin chúng mừng.');
                return redirect()->back();
            }

        } else {
            alert()->error('Mã giảm giá không đúng hoặc đã hết hạn!', 'Xin  vui lòng nhập mã khác :(');
            return redirect()->back();
        }
    }
}
