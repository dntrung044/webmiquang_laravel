<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Counpon\CouponService;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponService;


    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    public function index()
    {
        return view('admin.coupon.list', [
            'title' => 'Danh Sách Mã Giảm Giá',
            'coupons' => $this->couponService->get()
        ]);
    }

    public function create()
    {
        return view('admin.coupon.add', [
            'title' => 'Thêm mã giảm giá mới',
        ]);
    }

    public function store(Request $request)
    {
        $this->couponService->insert($request);
        return redirect()->route('coupons.index');
    }

    public function show(Coupon $coupon)
    {
        return view('admin.coupon.edit', [
            'title' => 'Chỉnh Sửa mã giảm giá',
            'coupons' => $coupon,
        ]);
    }

    public function update(Request $request, Coupon $coupon)
    {
        $result = $this->couponService->update($request, $coupon);
        if ($result) {
            return redirect()->route('coupons.index');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->couponService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công mã giảm giá'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
