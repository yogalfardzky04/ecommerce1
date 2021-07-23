<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function index()
    {
        /**Mengambil data dari database */
        $transaction_details = TransactionDetail::get();
        return view('admin.transaction_detail.index',[
            'transaction_detail' => $transaction_details

        ]);
    }
}
