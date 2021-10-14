<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index(Request $request)
    {
        $carts = Cart::query();
        if($request->has('name')) $carts->where('name', $request->name);

        // Query berdasarkan urutan
        if($request->has('order_by') && $request->has('order_type')) {
            $carts->orderBy($request->order_by,$request->order_type);
        }

        return response()->json([
         'data'   => $carts->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'      => 'required|exists:products,id',
            'quantity'        => 'required',
            'description'     => 'nullable'
        ]);

        // $cart = new Cart();
        // $cart->fill($request->only([
        //     'user_id',
        //     'product_id',
        //     'quantity',
        //     'description'

        // ]));
        // $cart->status = "Pending";
        // $cart->save();

        Cart::updateOrCreate([
        'user_id'       => auth()->user()->id,
        'product_id'    => $request->product_id
    ],[
        'description'   => $request->description,
        'quantity'      => $request->quantity,
        ]);

        if($request->is('api/*')) {
        return response()->json([
            'message' => "Berhasil menambah data",
        ]);
    } else {
        return redirect()->back();
    }

    }

    public function destroy($id, Request $request)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return response()->json([
            'massage' => 'Berhasil menghapus data',
            'data' => $cart
        ]);
    }
}
