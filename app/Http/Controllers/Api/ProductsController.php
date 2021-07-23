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
            'user_id'         => 'required|exists:users,id',
            'name'            => 'required|unique:products,name',
            'description'     => 'nullable',
            'price'           => 'required',
            'stok'            => 'required',
            'photo'           => 'nullable|file|max:2048'

        ]);


        $product = new Product();
        $product->fill($request->only([
            'user_id',
            'name',
            'description',
            'price',
            'stok',
            'photo'
        ]));

    //     Product::updateOrCreate([
    //     'name'          => $request->name,
    // ],[
    //     'user_id'       => $request->user_id,
    //     'description'   => $request->description,
    //     'price'         => $request->price,
    //     'stok'          => $request->stok,
    //     'photo'         => $request->photo,
    //     ]);

        
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
            'user_id'         => 'required|exists:users,id',
            'name'            => 'required|unique:products,name',
            'description'     => 'nullable',
            'price'           => 'required',
            'stok'            => 'required',
            'photo'           => 'nullable|file|max:2048'

        ]);

        $product = new Product();
        $product->fill($request->only([
            'user_id',
            'name',
            'description',
            'price',
            'stok',
            'photo'

        ]));

    //     Product::updateOrCreate([
    //     'user_id'       => $request->user_id,
    // ],[
    //     'name'          => $request->name,
    //     'description'   => $request->description,
    //     'price'         => $request->price,
    //     'stok'          => $request->stok,
    //     'photo'         => $request->photo,
    //     ]);

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
