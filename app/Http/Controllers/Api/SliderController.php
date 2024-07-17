<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('active', 1)->orderBy('sort_by')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách slider thành công',
            'slider' => $sliders
        ]);
    }
}
