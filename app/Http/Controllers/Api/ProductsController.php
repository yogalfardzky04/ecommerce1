<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
    	$products = Product::query();
        if($request->has('name')) $products->where('name', $request->name);

        // Query berdasarkan urutan
        if($request->has('order_by') && $request->has('order_type')) {
            $products->orderBy($request->order_by,$request->order_type);
        }

        return response()->json([
         'data'   => $products->get()
        ]);
    }

    public function store(Request $request)
    {
    	$request->validate([
            'name'            => 'required|max:255',
            'price'           => 'required|max:30',
            'stok'            => 'required|max:10',
            'photo'           => 'required|file|max:2048'

        ]);

        $product = new Product();
        $product->fill($request->only([
            'name',
            'description',
            'price',
            'stok',
            'photo'

        ]));
        // Upload File NOTE: tambahkan di PUT juga
        $product->photo    = $request->file('photo')->store('public/photo');
        // End Upload File
        $product->save();

        return response()->json([
            'message' => "Berhasil menambah data",
            'data' => $product
        ]);
    }

    public function show($id)
    {
    	$product = Product::findOrFail($id);
        return response()->json([
            'data' => $product
        ]);
    }

    public function update($id, Request $request)
    {
    	$request->validate([
            'name'            => 'required|max:255',
            'price'           => 'required|max:30',
            'stok'            => 'required|max:10',
            'photo'           => 'required|file|max:2048'

        ]);

        $product = new Product();
        $product->fill($request->only([
            'name',
            'description',
            'price',
            'stok',
            'photo'

        ]));
        $product->photo    = $request->file('photo')->store('public/photo');
        $product->save();

        return response()->json([
            'message' => "Berhasil menngupdate data",
            'data' => $product
        ]);
    }

    public function destroy($id, Request $request)
    {
    	$product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'massage' => 'Berhasil menghapus data',
            'data' => $product
        ]);
    }
}
