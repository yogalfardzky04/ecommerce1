<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        /**Mengambil data dari database */
        $carts = Cart::get();
        return view('admin.cart.index',[
            'carts' => $carts

        ]);
    }
}