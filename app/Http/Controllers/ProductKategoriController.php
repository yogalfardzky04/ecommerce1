<?php

namespace App\Http\Controllers;

use App\models\ProductKategori;
use Illuminate\Http\Request;

class ProductKategoriController extends Controller
{
	public function index()
	{
    $product_kategori = ProductKategori::get();
        return view('admin.product_kategori.index',[
            'product_kategori' => $product_kategori

        ]);
    }

    public function create()
    {

        return view('admin.product_kategori.create', [


        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'status'           => 'boolean',
            'icon'             => 'required|file'
        ]);

        $product_kategori = new ProductKategori;
        $product_kategori->fill($request->only([
            'name',
            'status',
            'icon'
        ]));

        $product_kategori->icon   = $request->file('icon')->store('public/photo');
        $product_kategori->save();
        return redirect(route('product_kategori.index'));
    }

    public function edit($id)
    {
        $product_kategori = ProductKategori::findOrFail($id);
        return view('admin.product_kategori.edit', [
            'product_kategori' => $product_kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'status'           => 'boolean',
            'icon'             => 'required|file'
        ]);

        $product_kategori = ProductKategori::find($id);
        $product_kategori->fill($request->only([
            'name',
            'status',
            'icon'
        ]));

        if($request->has('icon') && $request->file('icon')) {
            // Hapus fie foto sebelumnya
            // if($product_kategori->icon) unlink(storage_path('app/'.$product_kategori->icon));

            $product_kategori->icon = $request->file('icon')->store('public/photo');
        }
        $product_kategori->save();
        return redirect(route('product_kategori.index'));

    }
}
