<?php

namespace App\Http\Controllers\User;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{

    public function index()
    {
        $aboutus = Aboutus::all(); 
        $title = 'Đặt Bàn - Mì Quuảng Bà Mua';
        return view('user.reservation.index', compact('aboutus', 'title'));
    }
     
     public function postReservation(Request $request) 
     {
         
        $data = $request->except('_token', 'website');
        $data ['created_at'] = $data['updated_at'] = Carbon::now();
        Reservation::insert($data);

        $this->sendEmail($request);

         return redirect('dat-ban/thanh-cong')->with('noti', 'done');
     }

     private function sendEmail(Request $request)
     {
        Mail::send('user.mail.reservation', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
            'people' => $request->people,
            'time' => $request->time,
            'date' => $request->date,

        ], function($mail) use($request) {
            $mail->to('trungdao10a1@gmail.com', $request->name);
            $mail->from($request->email);
            $mail->subject('Khách hàng yêu cầu đặt bàn');
        });
     }
}
