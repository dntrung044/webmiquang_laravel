<?php


namespace App\Http\Services\Counpon;

use App\Models\Coupon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CouponService
{
    public function get()
    {
        return Coupon::get();
    }
    public function insert($request)
    {
        try {
            $request->except('_token');
            Coupon::create($request->all());
            Session::flash('success', 'Thêm mã giảm giá mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm mã giảm giá Lỗi');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $coupon)
    {
        try {
            $coupon->fill($request->input());
            $coupon->save();
            Session::flash('success', 'Cập nhật mã giảm giá thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật mã giảm giá Lỗi');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $coupon = Coupon::where('id', $request->input('id'))->first();
        if ($coupon) {
            $coupon->delete();
            return true;
        }
        return false;
    }
}
