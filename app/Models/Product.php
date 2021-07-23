<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /** Field yang boleh diisi sama user */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'stok',
        'photo'
    ];

    
    /**Jika ingin mengetahui product ada di carts mana saja */
    public function carts()
    {
    	// 1->M
    	return $this->hasMany(Cart::class,'product_id');

    }
    



}
