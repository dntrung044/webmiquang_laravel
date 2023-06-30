<?php


namespace App\Http\Services\About;

use App\Models\Aboutus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class AboutService
{

    public function display()
    {
        return Aboutus::select('id', 'description', 'address', 'email', 'phone', 'openH', 'thumb', 'map')->get();
    }

    public function update($request, $abouts)
    {
        try {
            $abouts->fill($request->input());
            $abouts->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }


    // End Admin

    // User
    //Giới thiệu trang chủ
    public function abouthome()
    {
        return Aboutus::select('thumb', 'linkYT', 'description')->firstOrFail();
    }
    // Home
    public function showBlognew()
    {
        return Aboutus::OrderBy('id', 'desc')->limit('3')->get();
    }


}
