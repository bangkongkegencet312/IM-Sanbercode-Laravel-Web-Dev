<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 1. Nama tabel (Opsional jika nama tabelnya 'categories')
    protected $table = 'categories';

    // 2. Kolom yang boleh diisi
    protected $fillable = ['name', 'description'];

    // 3. Relasi ke Product (Satu kategori punya banyak produk)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}