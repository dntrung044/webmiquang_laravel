<?php

namespace App\Http\Controllers\User;

use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Product;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Feeship;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $products = $this->cartService->getProduct();
        $district = District::orderby('id', 'ASC')->get();
        return view('user.checkout.index', [
            'title' => 'Thanh toán - Mì Quảng Bà Mua',
            'products' => $products,
            'districts' => $district,
            'carts' => Session::get('carts')
        ]);
    }

    public function load_address(Request $request)
    {
        $data = $request->all();
        $output = '';
        $data['action'] == "district";

        $select = Ward::where('id', $data['district_id'])->get();
        $output .= '<option>---Chọn xã/phường---</option>';
        foreach ($select as $key => $d) {
            $output .= '<option value="' . $d->ward_id . '">' . $d->name . '</option>';
        }

        echo  $output;
    }
    public function calculate_ship(Request $request)
    {
        $data = $request->all();
        if ($data['district']) {
            $feeship = Feeship::where('id', $data['district'])->where('ward_id', $data['ward'])->get();

            foreach ($feeship as $key => $fee) {
                Session::put('fee', $fee->feeship);
                Session::save();
            }
        }
    }

    public function addOrder(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    protected function infoProductCart($carts, $transaction_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'transaction_id' => $transaction_id,
                'product_id' => $product->id,
                'total_item'   => $carts[$product->id],
                'total_price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }

        return Cart::insert($data);
    }


    public function addOrders(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'total_price' => 'required',
            'total_item' => 'required',
            'time' => 'required',
            'day' => 'required',
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $carts = Session::get('carts');
        //01 Them don hang
        $transaction = Transaction::create($request->all());

        //trừ đi MGG
        //   $cou = Session::get('coupon');
        //   $code =$cou['code'];
        //   $coupon = Coupon::where('code', $code)->first();
        //   $coupon->amount = $coupon->amount -1;
        //   $coupon->save();

        //02 them chi tiet don hang
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        foreach ($products as $product) {
            $data = [
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'total_item'   => $carts[$product->id],
                'total_price' => $product->price_sale != 0 ? $product->price_sale : $product->price,
                'feeship' => $request->feeship,
                'coupon' => $request->coupon,
            ];
            Cart::insert($data);
        }

        if ($request->payment_type == 'later_payment') {
            //03 gui mall
            $this->sendEmail($transaction);

            //04 Xoa gio hang
            // Cart::destroy();
            $carts = Session::get('carts');
            $feeships = Session::get('fee');
            $coupons = Session::get('coupon');
            unset($carts);
            Session::put('carts');
            unset($feeships);
            Session::put('fee');
            unset($coupons);
            Session::put('coupon');

            //05 tra ve kq
            return redirect('thanh-toan/thanh-cong')->with('noti', 'done');
        }

        if ($request->payment_type == 'online_payment') {
            //01. Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $transaction->id,
                'vnp_OrderInfo' => 'Mo ta don hang..',
                'vnp_Amount' => $request->total_price,
            ]);
            //02. Chuyển hướng tới URL lấy được
            return redirect()->to($data_url);
        } else {
            return "online payment";
        }
    }

    public function vnPayCheck(Request $request)
    {
        //01 Lấy data từ url (do VNP gửi về qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // Mã phản hồi kết quả thanh toán. 00= thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // ticket_id
        $vnp_Amount = $request->get('vnp_Acount'); // Số tiền thanh toán

        //02 Kiểm tra kêt quả giao dịch trả về VNPAY
        if ($vnp_ResponseCode != null) {
            // Nếu thành công :
            if ($vnp_ResponseCode == 00) {

                //03 gui mall
                $transaction = Transaction::find($vnp_TxnRef);
                $this->sendEmail($transaction, $vnp_Amount);

                //04 Xoa gio hang, mã giảm giá
                // Cart::destroy();
                Cart::destroy($transaction);
                $carts = Session::get('carts');
                $coupons = Session::get('coupon');
                unset($carts);
                Session::put('carts');
                unset($coupons);
                Session::put('coupon');

                return redirect('thanh-toan/thanh-cong')->with('noti', 'done');
            } else {
                //Xóa đơn hàng đã thêm vào database, và trả về thông báo lỗi
                Transaction::find($vnp_TxnRef)->delete();
                return 'ERROR: Thanh toán lỗi hoặc đã hủy!!';
            }
        }
    }

    // gửi mail thanh toán thành công
    private function sendEmail($transaction)
    {
        $email_to = Auth::user()->email;

        Mail::send(
            'user.mail.bill',
            compact('transaction'),
            function ($message) use ($email_to) {
                $message->from('trungdao10a1@gmail.com', 'Bà Mua');
                $message->to($email_to, $email_to);
                $message->subject('Thông báo đặt hàng');
            }
        );
    }

    //Done form
    public function thanhtoanthanhcong()
    {
        $title = session('notificution');
        $title = 'Thanh toán thành công';
        return view('user.confirm.thanhtoanok', compact('title'));
    }

    public function datbanthanhcong()
    {
        $title = session('notificution');
        $title = 'Đặt bàn thành công';
        return view('user.confirm.thanhtoanok', compact('title'));
    }

    public function lienhethanhcong()
    {
        $title = session('notificution');
        $title = 'Liên hệ thành công';
        return view('user.confirm.thanhtoanok', compact('title'));
    }
}
