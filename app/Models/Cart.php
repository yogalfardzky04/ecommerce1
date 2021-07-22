<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];


/** Digunakan untuk memberi tahu ada field di cart yang bergantung pada product */
    public function product()
    {
    	return $this->belongsTo(Product::class,'product_id');
    }
}
