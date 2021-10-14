<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ProductKategori extends Model
{
    use HasFactory;

    protected $table = "product_kategori";

    protected $fillable = [
        'name',
        'status',
        'icon'
    ];


    protected $casts = [
        'status' => 'boolean',
    ];

    protected $appends =[
        'photo_url'
    ];

    public function getPhotoUrlAttribute()
    {
        return url(Storage::url($this->icon));
    }

    
}
