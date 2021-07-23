<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $Transactions = Transaction::query();
        if($request->has('name')) $transactions->where('name', $request->name);

        // Query berdasarkan urutan
        if($request->has('order_by') && $request->has('order_type')) {
            $transactions->orderBy($request->order_by,$request->order_type);
        }

        return response()->json([
         'data'   => $transactions->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'         => 'required|exists:users,id',
            'payment_method'  => 'required|max:30'

        ]);

        $user_id = $request->user_id;

        $transaction = new Transaction();
        $transaction->fill($request->only([
            'user_id',
            'payment_method'

        ]));
        // End Upload File
        $transaction->invoice_no = "INV".date('YmdHis');
        $transaction->status     = "Pending";
        $transaction->save();

        /** Ambil semua Cart user yang statusnya Pending*/

        $carts = Cart::where('user_id',$user_id)
        ->where('status','Pending')
        ->get();

        foreach($carts as $cart){
            $tr_detail                          = new TransactionDetail();
            $tr_detail->transaction_id          = $transaction->id;
            $tr_detail->cart_id                 = $cart->id;
            $tr_detail->product_id              = $cart->product_id;
            $tr_detail->quantity                = $cart->quantity;
            $tr_detail->price                   = $cart->product->price;
            $tr_detail->description             = $cart->description;
            $tr_detail->save();

            $cart->status = "Success";
            $cart->save();
        }

        return [

            'message' => "Berhasil membuat transaksi"
        ];
    }

    public function show($id)
    {
        $transaction_detail = TransactionDetail::findOrFail($id);
        return response()->json([
            'data' => $transaction_detail
        ]);
    }
}
