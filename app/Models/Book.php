<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',
        'gambar' 
    ];

    // relasi ke category (banyak book milik 1 category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}