<?php

namespace App\Http\Controllers\User;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{


    public function index()
    { 
        return view('user.contact.index', [ 'title' => 'Liên hệ - Mì Quảng Bà Mua',]);
    }

    public function postContact(Request $request) 
    {
        $data = $request->except('_token');
        $data ['created_at'] = $data['updated_at'] = Carbon::now();
        Contact::insert($data);

        $this->sendEmail($request);
        
        return redirect('lien-he/thanh-cong')->with('noti', 'done');
    }

    private function sendEmail(Request $request)
    {
        Mail::send('user.mail.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
        ], function($mail) use($request) {
            $mail->to('trungdao10a1@gmail.com', $request->name);
            $mail->from($request->email);
            $mail->subject('Khách hàng liên hệ');
        });
    }


}
