<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

session_start();

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        //price
        $price = $quantity = $quantity_total = $subtotal = $total = $total_cart = 0;
        $productsInCart = $this->cartService->getProduct();

        $cartS = Session::get('carts');
        foreach ($productsInCart as $key => $product) {
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $quantity = $cartS[$product->id];
            $quantity_total += $quantity;
            $subtotal = $price * $quantity;
            $total_cart += $subtotal;
        }
        // shipping cost
        $feeship = 30000;
        if ($quantity <= 3) {
            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee : $feeship;
        } elseif ($quantity <= 7) {
            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 5000 : $feeship + 5000;
        } elseif ($quantity > 10) {
            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 10000 : $feeship + 10000;
        }
        $total_feeship_after = $total_cart + $feeship; //Tổng tiền giỏ hàng + phí vận chuyển

        //coupon
        $coupon = Session::get('coupon'); //Session coupon data
        $condition = $total_coupon = $number = $total_coupon_after = $total_coupon_after = 0;

        $hasCoupon = !empty($coupon);
        if ($hasCoupon) {
            foreach ($coupon as $key => $cou) {
                $condition = $cou['condition'];
                $number = $cou['number'];
                //condition = 1: %;
                if ($condition == 1) {
                    $total_coupon = ((int) $total_cart * (int) $number) / 100;
                }
                //condition = 2: -many;
                elseif ($condition == 2) {
                    $total_coupon = ((int) $total_cart - (int) $number);
                }
            }
            $total_coupon_after = (int) $total_feeship_after - (int) $total_coupon;
        }

        // Total payment
        $total_payment = 0;
        if ($hasCoupon) {
            $total_payment = $total_coupon_after;
        } else {
            $total_payment = $total_feeship_after;
        }

        return view('user.carts.index', [
            'title' => 'Giỏ Hàng - Mì Quảng Bà Mua',
            'productsInCart' => $productsInCart,
            'carts' => $cartS,
            'price' => $price,
            'quantity' => $quantity,
            'quantity_total' => $quantity_total,
            'subtotal' => $subtotal,
            'feeship' => $feeship,
            'condition' => $condition,
            'total_coupon' => $total_coupon,
            'number' => $number,
            'total_coupon_after' => $total_coupon_after,
            'plus_shipping_fee' => $total_feeship_after,
            'total_cart' => $total_cart,
            'total_payment' => $total_payment,
        ]);
    }

    public function add(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/gio-hang');
    }

    public function add_to_cart(Request $request)
    {
        // add To Cart
        $result = $this->cartService->addToCart($request);
        if ($result === false) {
            return redirect()->back();
        }

        $productsInCart = $this->cartService->getProduct();
        $carts = Session::get('carts');
        //price
        $price = $quantity = $quantity_total = $subtotal = $total = $total_cart = 0;
        foreach ($productsInCart as $key => $product) {
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $quantity = $carts[$product->id];
            $quantity_total += $quantity;
            $subtotal = $price * $quantity;
            $total_cart += $subtotal;
        }
        //render view
       $cart_compoment = view('user.products.compoments.cart', compact('productsInCart', 'carts', 'price', 'quantity', 'subtotal','total_cart', 'quantity_total' ))->render();

        return response()->json([
              'cart_compoment' => $cart_compoment,
              'message' => 'Đã thêm món ăn vào giỏ hàng!',
              'code' => 200,
        ], 200);
    }

    public function destroy_cart(Request $request)
    {
        $productId = $request->id;
        $carts = session()->get('carts');

        if (isset($carts[$productId])) {
            unset($carts[$productId]);
            session()->put('carts', $carts);
            session()->save();

            $productsInCart = $this->cartService->getProduct();
            $carts = Session::get('carts');
            //price
            $price = $quantity = $quantity_total = $subtotal = $total = $total_cart = 0;
            foreach ($productsInCart as $key => $product) {
                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                $quantity = $carts[$product->id];
                $quantity_total += $quantity;
                $subtotal = $price * $quantity;
                $total_cart += $subtotal;
            }
            //render view
            $cart_compoment = view('user.products.compoments.cart', compact('productsInCart', 'carts', 'price', 'quantity', 'subtotal','total_cart', 'quantity_total' ))->render();

            return response()->json([
                'cart_compoment' => $cart_compoment,
                'code' => 200,
                'success' => 'Đã xoá món ăn thành công!',
            ]);
        }

        return response()->json(['errors' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
    }
    public function showcartAjax()
    {
        $products = $this->cartService->getProduct();

        return view('user.carts.showcartAjax', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }

    public function cart_increase(Request $request)
    {
        $id = $request->product_id;
        $carts = Session::get('carts');
        if (isset($carts[$id])) {
            $carts[$id] += 1;
        }
        Session::put('carts', $carts);
         $cart_compoment = $this->cart_compoment();
         $payment_compoment = $this->payment_compoment();

        return response()->json([
            'cart_compoment' => $cart_compoment,
            'payment_compoment' => $payment_compoment,
            'code' =>  200,
            'success' => 'Tăng số món thành công!',
        ], 200);
    }

    public function cart_decrease(Request $request)
    {
        $id = $request->product_id;
        $carts = Session::get('carts');
        if (isset($carts[$id])) {
            $carts[$id] -= 1;
        }
        Session::put('carts', $carts);
         //update new data
         $cart_compoment = $this->cart_compoment();
         $payment_compoment = $this->payment_compoment();

        return response()->json([
            'cart_compoment' => $cart_compoment,
            'payment_compoment' => $payment_compoment,
            'code' => 200,
            'success' => 'Giảm số món thành công!',
        ], 200);
    }

    public function updatecart(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/gio-hang');
    }
    public function destroy(Request $request)
    {
        $productId = $request->id;
        $carts = session()->get('carts');

        if (isset($carts[$productId])) {
            unset($carts[$productId]);
            session()->put('carts', $carts);
            session()->save();

            //update new data
            $cart_compoment = $this->cart_compoment();
            $payment_compoment = $this->payment_compoment();

            return response()->json([
                'cart_compoment' => $cart_compoment,
                'payment_compoment' => $payment_compoment,
                'code' => 200,
                'success' => 'Đã xoá món ăn thành công!',
            ]);
        }

        return response()->json(['errors' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }

    public function check_coupon(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        $validator = Validator::make($request->all(), [
            'coupon_input' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $coupon_input = $request->coupon_input;
            $coupon = Coupon::where('code', $coupon_input)
                ->where('status', 1)
                ->where('date_end', '>=', $today)
                ->first();

            if ($coupon) {
                $count_coupon = $coupon->count();
                if ($count_coupon > 0) {
                    $coupon_session = Session::get('coupon');
                    if ($coupon_session == true) {
                        $is_available = 0;
                        if ($is_available == 0) {
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

                    //update new data
                    $cart_compoment = $this->cart_compoment();
                    $payment_compoment = $this->payment_compoment();

                    return response()->json([
                        'cart_compoment' => $cart_compoment,
                        'payment_compoment' => $payment_compoment,
                        'success' => 'Áp dụng mã giảm giá thành công!',
                        'code' => 200,
                    ], 200);
                }
            } else {
                return response()->json(['errors' => 'Mã giảm giá không đúng hoặc đã hết hạn!', 'Xin  vui lòng nhập mã khác']);
            }
        }
    }

    public function payment_compoment()
    {
        $carts = Session::get('carts');
        $productsInCart = $this->cartService->getProduct();
        $cartS = Session::get('carts');
        $price = $quantity = $quantity_total = $subtotal = $total = $total_cart = 0;

        foreach ($productsInCart as $key => $product) {
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $quantity = $cartS[$product->id];

            $quantity_total += $quantity;

            $subtotal = $price * $quantity;

            $total_cart += $subtotal;
        }

        $feeship = 30000;
        if ($quantity <= 3) {
            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee : $feeship;
        } elseif ($quantity <= 7) {
            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 5000 : $feeship + 5000;
        } elseif ($quantity > 10) {
            $feeship = !empty(Auth::user()->fee) ? Auth::user()->fee + 10000 : $feeship + 10000;
        }
        $total_feeship_after = $total_cart + $feeship;

        $coupon = Session::get('coupon');
        $condition = $total_coupon = $number = $total_coupon_after = $total_coupon_after = 0;
        $hasCoupon = !empty($coupon);

        if ($hasCoupon) {
            foreach ($coupon as $key => $cou) {
                $condition = $cou['condition'];
                $number = $cou['number'];
                if ($condition == 1) {
                    $total_coupon = ((int) $total_cart * (int) $number) / 100;
                } elseif ($condition == 2) {
                    $total_coupon = ((int) $total_cart - (int) $number);
                }
            }
            $total_coupon_after = (int) $total_feeship_after - (int) $total_coupon;
        }

        $total_payment = $hasCoupon ? $total_coupon_after : $total_feeship_after;

        $payment_compoment = view('user.carts.compoments.payment_compoment', compact(
            'productsInCart',
            'cartS',
            'price',
            'quantity',
            'quantity_total',
            'subtotal',
            'feeship',
            'condition',
            'total_coupon',
            'number',
            'total_coupon_after',
            'total_feeship_after',
            'total_cart',
            'total_payment'
        ))->render();

        return $payment_compoment;
    }

    public function cart_compoment()
    {
        $carts = Session::get('carts');
        $productsInCart = $this->cartService->getProduct();
        $cart_compoment = view('user.carts.compoments.cart_compoment', compact('productsInCart', 'carts'))->render();

        return $cart_compoment;
    }

}
