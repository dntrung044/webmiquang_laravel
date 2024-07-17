<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index(Request $requset)
    {
        $orrder = Reservation::create(array_merge($requset->all()));

        if ($orrder) {
            return response()->json([
                'success' => 1,
                'message' => 'Đặt bàn thành công',
                'orrder' => $orrder
            ]);
        }

        return $this->error('Đặt bàn thất bại');
    }

    public function error($pasan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
