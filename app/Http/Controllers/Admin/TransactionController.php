<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\About\AboutService;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;

ini_set('max_execution_time', 300);

class TransactionController extends Controller
{
    protected $cart;
    protected $about;
    public function __construct(CartService $cart, AboutService $about)
    {
        $this->cart = $cart;
        $this->about = $about;
    }

    public function index()
    {
        return view('admin.transactions.list', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'transactions' => $this->cart->getTransaction()
        ]);
    }

    public function detail(Transaction $transaction)
    {
        $carts = $this->cart->getProductForCart($transaction);
        $abouts = $this->about->get();
        // $pdf = PDF::loadView('admin.transactions.pdf', [
        //     'title' => 'Chi Tiết Đơn Hàng: ' . $transaction->name,
        //     'transaction' => $transaction,
        //     'carts' => $carts,
        //     'abouts' => $abouts, 
        // ]);
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadView('invoices.credit_note', compact('credit_notes'));
        // $pdf->save(public_path($path));
        // $pdf_name = Str::slug($transaction->name). '-' .time(). '.pdf';
        // $pdf_path = public_path('storage/pdf/' .$pdf_name);
        // $pdf->save($pdf_path);

        // if(request('pdf', false)) {
        //     return $pdf->stream();
        // }elseif(request('download', false)) {
        //     return $pdf->download($pdf_name);
        // } elseif(request('sentmail', false)) {
        //     Mail::send('user.mail.bill', compact('transaction'),
        //     function ($message) use ($transaction, $pdf_path) {
        //         $message->subject('Đặt đồ uống');
        //         $message->to($transaction->email, $transaction->name);
        //         $message->from($transaction->email);
        //         if(file_exists($pdf_path)) {
        //             $message->attach($pdf_path);
        //         }
        //     });

        //     if(file_exists($pdf_path)) {
        //         unlink($pdf_path);
        //     }
        // }

        return view('admin.transactions.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $transaction->name,
            'transaction' => $transaction,
            'carts' => $carts,
            'abouts' => $abouts,
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->cart->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Hóa Đơn Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
    // Trạng thái đơn hàng
    public function active($transaction)
    {
        $transaction = Transaction::find($transaction);
        $transaction->status = Transaction::STATUS_DELIVERING;
        $transaction->save();

        return redirect()->back()->with('success', 'Xử lý đơn hàng thành công!');
    }
    public function cancel($transaction)
    {
        $transaction = Transaction::find($transaction);
        $transaction->status = Transaction::STATUS_CANCELLED;
        $transaction->save();

        return redirect()->back()->with('success', ' Hủy đơn hàng thành công!');
    }

    // Gửi mail hóa đơn
    public function postReservation(Request $request)
    {
        Mail::send('user.mail.reservation', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
            'people' => $request->people,
            'time' => $request->time,
            'datepicker_field' => $request->datepicker_field,

        ], function ($mail) use ($request) {
        });
        return redirect()->back();
    }

    private function sendEmail($transaction)
    {
        $email_to = $transaction->email;

        Mail::send(
            'user.checkout.email',
            compact('transaction'),
            function ($message) use ($transaction) {
                $message->to('trungdao10a1@gmail.com', 'Nö Diary of');
                $message->from($transaction->email);
                $message->subject('Đặt đồ uống');
            }
        );
    }
}
