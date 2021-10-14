<?php

namespace App\Http\Controllers\Api;

use App\models\ProductKategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_kategori = ProductKategori::query();
        if($request->has('name')) $product_kategori->where('name', $request->name);

        // Query berdasarkan urutan
        if($request->has('order_by') && $request->has('order_type')) {
            $product_kategori->orderBy($request->order_by,$request->order_type);
        }

        return response()->json([
         'data'   => $product_kategori->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
