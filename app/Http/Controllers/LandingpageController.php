<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductKategori;
use App\Models\Cart;

class LandingpageController extends Controller
{
    public function index()
    {
        $product_kategori = ProductKategori::where('status',1)->get();
        return view('obaju.index', [
        'product_kategori' => $product_kategori

        ]);
    }

    public function product(Request $request)
    {
        $products = Product::query();
        $products->where('status','Aktif');

        if($request->has('kategori_id')){
            $products->where('kategori_id',$request->kategori_id);
        }

        $product_kategori = ProductKategori::where('status',1);

        return view('obaju.product', [
            'products' => $products->get(),
            'product_kategori' => $product_kategori->get()
        ]);
    }

    public function productDetail ($id)
    {
        $products = Product::findOrFail($id);
        $product_kategori = ProductKategori::where('status',1);

        return view('obaju.product-detail',[
            'products' => $products,
            'product_kategori' => $product_kategori->get()
        ]);
    }

    public function cart(Request $request)
    {

        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('obaju.cart',[
            'carts' => $carts
        ]);

    }

    public function cartDestroy($id, Request $request)
    {
        $carts = Cart::findOrFail($id);
        $carts->delete();

        return redirect(route('obaju.cart'));
    }

    public function cari(Request $request)
	{
            $name = $request->name;
            $products = Product::where('name','like',"%".$name."%")->paginate(10);
            $product_kategori = ProductKategori::where('status',1)->get();
            return view('obaju.product', [
                'product_kategori' => $product_kategori,
                'products' => $products
            ]);
    }


    public function tambahBarang(Request $request)
    {
        $carts = Cart::where('id',$request->id)->first();
        $carts->quantity = $request->quantity;
        $carts->save();

        return response()->json([
            'status'=>'1'
        ]);


    }
}