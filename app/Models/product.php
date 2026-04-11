<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'products';

    // Kolom yang boleh diisi melalui form (Mass Assignment)
    protected $fillable = [
        'name', 
        'image', 
        'description', 
        'price', 
        'stock', 
        'category_id'
    ];

    // Relasi Kebalikan: Satu produk dimiliki oleh satu kategori
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}