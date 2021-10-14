<?php

namespace App\Http\Controllers;

use App\Models\ProductKategori;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**Mengambil data dari database */
        $products = Product::get();
        return view('admin.product.index',[
            'products' => $products

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_kategori = ProductKategori::where('status',1)->get();
        return view('admin.product.create', [
        'product_kategori' => $product_kategori

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id'      => 'required',
            'name'             => 'required|string|max:255',
            'description'      => 'required|string|max:255',
            'stok'             => 'required|numeric',
            'price'            => 'required|numeric',
            'status'           => 'required|string',
            'photo'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'photo.*'          => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $product = new Product;
        $product->fill($request->only([
            'kategori_id',
            'name',
            'description',
            'stok',
            'price',
            'status'
        ]));

        // $photos = [];
        // if($request->has('photo')) {
        //     foreach($request->file('photo') as $image)
        //     {
        //      $name = $image->getClientOriginalName();
        //      $image->move(storage_path().'/app/public/photo/', $name.".".$image->getClientOriginalExtension());
        //      array_push($photos, 'photo/'. $name);
        //     }

        // } untuk multiple upload image

        if($request->hasFile('photo')) {

            $image       = $request->file('photo');
            $filename    = $image->getClientOriginalName();
        
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(800, 700);
            $filepath = storage_path('app/public/photo/' .$filename);
            $image_resize->save($filepath);
            $product->photo = 'public/photo/' .$filename;
        
        }
        
        $product->user_id = auth()->user()->id;
        // $product->photo   = $request->file('photo')->store('public/photo');
        // $product->photo = $photos;
        $product->save();
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_kategori = ProductKategori::get();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', [
            'product' => $product,
            'product_kategori' => $product_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id'      => 'required',
            'name'             => 'required|string|max:255',
            'description'      => 'required|string|max:255',
            'stok'             => 'required|numeric',
            'price'            => 'required|numeric',
            'status'           => 'required|string',
            'photo'            => 'nullable|file'
        ]);

        $product = Product::find($id);
        $product->fill($request->only([
            'kategori_id',
            'name',
            'description',
            'stok',
            'status',
            'price',
        ]));

        if($request->has('photo') && $request->file('photo')) {
            // Hapus fie foto sebelumnya
            if($product->photo) unlink(storage_path('app/'.$product->photo));

            $product->photo = $request->file('photo')->store('public/photo');
        }
        $product->save();
        return redirect(route('product.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    	$product = Product::findOrFail($id);
        $product->delete();

        return redirect (route('product.index'));
    }
}
