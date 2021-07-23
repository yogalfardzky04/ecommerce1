<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        /**Mengambil data dari database */
        $transactions = Transaction::get();
        return view('admin.transaction.index',[
            'transactions' => $transactions

        ]);
    }
}
