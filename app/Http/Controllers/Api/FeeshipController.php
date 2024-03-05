<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Feeship;
use App\Models\Ward;
use Illuminate\Http\Request;

class FeeshipController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $feeships = Feeship::get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách phí ship thành công',
            'feeships' => $feeships
        ]);
    }

    public function getDistrict(){
        $districts = District::get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách quận/huyện thành công',
            'districts' => $districts
        ]);
    }

    public function getWard(){
        $wards = Ward::get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách xã/phường thành công',
            'wards' => $wards
        ]);
    }

    public function getWardbyDistrict($district_id){
        $wards = Ward::where('district_id', $district_id)->get();

        if ($wards){
            return response()->json([
                'success' => 1,
                'message' => 'Succeed',
                'wards' => $wards
            ]);
        } else {
            return $this->error('Failed to load ward by district');
        }
    }

}
