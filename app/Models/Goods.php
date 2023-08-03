<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'nama_barang',
        'harga',
        'stok',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
