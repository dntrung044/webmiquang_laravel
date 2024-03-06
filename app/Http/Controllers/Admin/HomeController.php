<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Transaction;
use App\Models\Post;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $order_count = Cart::count();
        $post_count = Post::count();
        $acc_count = User::count();
        $title = 'Trang chủ quản trị';
        $contactNew = Contact::orderByDesc('id')->paginate(5);
        $reservationNew = Reservation::orderByDesc('id')->paginate(5);
        $orderNew = Transaction::orderByDesc('id')->paginate(5);

        if (Gate::allows('admin-access', auth()->user())) {
            return view('admin.home', compact(
                'product_count',
                'order_count',
                'post_count',
                'acc_count',
                'title',
                'contactNew',
                'reservationNew',
                'orderNew'
            ));
        } else {
            abort(403);
        }
    }

    // Trạng thái liên hệ
    public function activeContact($contact)
    {
        $transaction = Contact::find($contact);

        $transaction->status = Contact::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success', 'Xử lý trạng thái liên hệ thành công');
    }

    // Trạng thái đặt bàn
    public function activeReservation($reservation)
    {
        $transaction = Reservation::find($reservation);

        $transaction->status = Reservation::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success', 'Xử lý trang thái đặt bàn thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
