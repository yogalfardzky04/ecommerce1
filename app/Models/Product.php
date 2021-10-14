<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /** Field yang boleh diisi sama user */
    protected $fillable = [
        'kategori_id',
        'user_id',
        'name',
        'description',
        'price',
        'stok',
        'status',
        'photo'
    ];

    protected $appends =[
        'photo_url',
        'price_format'
    ];

    // protected $casts=[
    //     'photo'=>"array"
    // ];

    // public function getPhotoUrlAttribute()
    // {
    //     // dd($this->photo);
    //     $photos=($this->photo);
    //     return url(Storage::url($photos[0]));
    // }
    
    public function getPhotoUrlAttribute()
    {
        return url(Storage::url($this->photo));
    }

    public function getPriceFormatAttribute()
    {
        return number_format($this->price);
    }

    
    /**Jika ingin mengetahui product ada di carts mana saja */
    public function carts()
    {
    	// 1->M
    	return $this->hasMany(Cart::class,'product_id');

    }
    
    public function kategori()
    {
        return $this->belongsTo(ProductKategori::class,'kategori_id');
    }



}
