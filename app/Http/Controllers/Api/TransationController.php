<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransationController extends Controller {

    public function store(Request $request) {
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_type' => 'required',
            'method' => 'required',
            'total_price' => 'required',
            'total_item' => 'required',

        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        DB::beginTransaction();
        $transaction = Transaction::create(($request->all()));

        $product =  $request->products;
        foreach ($product as $p) {
            $dataCart = [
                'transaction_id' => $transaction->id,
                'product_id' => $p['id'],
                'total_item' => $p['total_item'],
                'total_price' => $p['total_price']
            ];
            $carts = Cart::create($dataCart);
        }

        if (!empty($transaction) && !empty($carts)) {
            DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Đặt món ăn thành công',
                'transaction' => collect($transaction)
            ]);
        } else {
            DB::rollback();
            return $this->error('Đặt món ăn không thành công');
        }
    }


    public function history($id) {
        $transactions = Transaction::with(['user'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach ($transactions as $transaction) {
            $carts = $transaction->carts;
            foreach ($carts as $cart) {
                $cart->product;
            }
        }

        if (!empty($transaction && $cart)) {
            return response()->json([
                'success' => 1,
                'message' => 'Giao dịch thành công',
                'transactions' => collect($transactions)
            ]);
        } else {
            $this->error('Giao dịch không thành công');
        }
    }

    public function cancelled($id){
        $transaction = Transaction::with(['carts.product', 'user'])->where('id', $id)->first();
        if ($transaction){
            // update data

            $transaction->update([
                'status' => "CANCELLED"
            ]);

            // $transaction->status = Transaction::STATUS_DONE;
            // $transaction->save();

            return response()->json([
                'success' => 1,
                'message' => 'Succeed',
                'transaction' => $transaction
            ]);
        } else {
            return $this->error('Failed to load transaction');
        }
    }

    public function error($pasan) {
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }
}
